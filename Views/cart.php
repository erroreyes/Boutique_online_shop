<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../links/bootstrap/js/bootstrap.min.js">
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
                    <th>DELETE</th>
                    <th class="text-center" colspan="4">
                        <h5>Sub Total</h5>
                    </th>
                

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
                    $total = 0;
                    $ptotal=0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $total = $value['price'] * $value['quantity'];
                            $ptotal +=$total;
                            echo "
                            <tr>
                            <form method='POST'>
                                    <td> <input type='hidden' name='name' value='$value[proname]'>$value[proname]</td>
                                    <td> <input type='hidden' name='name' value='$value[price]'>$value[price]</td>
                                    <td> <input type='' name='name' value='$value[quantity]'></td>
                                    <td><button class='btn btn-danger' name='remove'>REMOVE</button></td>
                                    <td><input type='hidden' name='item' value='$value[proname]'></td>
                                    <td class='text-left'>$total</td>
                                </form>
                                </tr>
                                ";
                        }
                    }
                    ?>
                </tr>
                <tr class="alert-info">
                    <td colspan="4" class="text-center fw-bold"><h4>Total Amount</h4></td>
                    <td colspan="2"><?php echo $ptotal; ?></td>
                </tr>

            </form>
        </table>
    </div>
</body>

</html>