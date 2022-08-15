<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">

</head>

<body>
    <?php
    include "nav.php";
    ?>
    <div class="container p-5 mt-5">
        <table class="table text-center">
            <form method="POST">
                <tr class=" alert-info" style="font-weight:bolder;">
                    <th>product name</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th class="text-center" colspan="4">
                        <h5>Sub Total</h5>
                    </th>
                    <th>DELETE</th>


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
                                    <td><button  class='btn btn-outline-success' name='update'>Update</button></td>x
                                </form>
                                </tr>
                                ";
                        }
                    }
                    ?>

                </tr>
                <!-- <td id="t"></td> -->
                <tr class="alert-info">
                    <td colspan="4" class="text-center fw-bold">
                        <h4>Total Amount</h4>
                    </td>
                    <td colspan="2" class="total"><?php echo $total; ?></td>
                </tr>

            </form>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
</body>


</html>