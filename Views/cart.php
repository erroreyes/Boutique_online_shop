<?php
include "config.php";
session_start();
$err="";
if (isset($_POST['purchase'])) {
    $ord_insert = "INSERT INTO `order_payment` ( `fullName`, `phoneNo`, `Address`, `payment_Mode`) VALUES ('$_POST[fullname]', '$_POST[phoneno]', '$_POST[address]', '$_POST[paymentmode]')";
    if (mysqli_query($conn, $ord_insert)) {
        $ord_id=mysqli_insert_id($conn);
        $ord_insert2= "INSERT INTO `user_order`(`ord_Id`, `pro_name`, `price`, `quantity`) VALUES (?,?,?,?)";
        $stmt=mysqli_prepare($conn,$ord_insert2);
        if($stmt){
            mysqli_stmt_bind_param($stmt,'isii',$ord_Id,$pro_name,$price,$quantity);
            foreach($_SESSION['cart'] as $key => $value){
                $pro_name=$value['proname'];
                $price=$value['price'];
                $quantity=$value['quantity'];
                mysqli_stmt_execute($stmt);
            }
            unset($_SESSION['cart']);
            echo "<script>alert('order placed');</script>";
        }else{
            echo "<script>alert('sql query prepare error');</script>";
        }
    } else {
        echo "<script>alert('error');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">
    <style>
        .up {
            margin-top: 6%;
        }
    </style>
</head>

<body>
    <?php
    include "nav.php";
    ?>
    <div class="container up">
        <p style="font-size:40px;background-color:salmon;" class="text-white text-center">My Cart</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <table class="table text-center">
                    <form method="POST">
                        <tr class="bg-light border border-1 " style="font-weight:bolder;font-size:17px;">
                            <th>product name</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th class="text-center" colspan="2">
                                Sub Total
                            </th>
                            <th>Delete</th>


                        </tr>

                        <tr>
                            <?php
                            // remove

                            if (isset($_POST['remove'])) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    if ($value['proname'] === $_POST['item']) {
                                        unset($_SESSION['cart'][$key]);
                                        $_SESSION['cart'] = array_values($_SESSION['cart']);
                                        header("location:cart.php");
                                    }
                                }
                            }

                            // update
                            if (isset($_POST['update'])) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    if ($value['proname'] === $_POST['item']) {
                                        $_SESSION['cart'][$key] = array('proname' => $proname, 'price' => $pro_price, 'quantity' => $pro_quantity);
                                        print_r($_SESSION['cart']);
                                        header("location:cart.php");
                                    }
                                }
                            }

                            $subtotal = 0;
                            $total = 0;

                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) {

                                    $subtotal = $value['price'] * $value['quantity'];
                                    $total += $subtotal;
                                    echo "
                            <tr>
                            <form method='POST'>
                                    <td> <input type='hidden' name='name' value='$value[proname]'>$value[proname]</td>
                                    <td> <input type='hidden' class='price' name='price' value='$value[price]'>$value[price]</td>
                                    <td> <input type='text'   name='quantity' value='$value[quantity]' min='1' max='10'></td>
                                   
                                    <td><input type='hidden' name='item' value='$value[proname]'></td>
                                    <td class='text-left subtotal' id='t'>$subtotal</td>
                                    <td><button  class='btn btn-outline-danger' name='remove'>Delete</button></td>
                                </form>
                                </tr>
                                ";
                                }
                            }
                            ?>
                        </tr>
                    </form>
                </table>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-3">
                <div class="bg-light p-3 border border-1">
                    <h3>Total :</h3>
                    <hr>
                    <h5 class="text-right" style="font-size:25px;"><?php echo $total; ?></h5>
                    <form action="" class="p-3" method="POST">
                        <div class="form-group">
                            <label>Full Name :</label>
                            <input type="text" class="form-control" placeholder="Name" name="fullname">
                        </div>
                        <div class="form-group">
                        <label>Phone No :</label>
                            <input type="text" class="form-control" placeholder="Name" name="phoneno">
                        </div>
                        <div class="form-group">
                        <label>Address :</label>
                            <input type="text" class="form-control" placeholder="Name" name="address">
                        </div>
                        <div class="form-group">
                        <input type="radio" checked value="cash on delivery" name="paymentmode"> Cash On Delivery
                        </div>
                        <button class="btn btn-md w-100 mt-4 text-white" style="background-color:salmon ;" name="purchase" type="submit">Make Purchase</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <p><?php echo $err; ?></p>
    <script>
        function update() {

        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
</body>


</html>