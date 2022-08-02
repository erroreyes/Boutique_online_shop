<?php
session_start();
if (isset($_POST['remove_item'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        print_r($key);
        // if ($value['proname'] == $_POST['proname']) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo "<script>alert('item removed');
            window.location.href='cart.php';</script>";
        // }
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
    <!-- <link rel="stylesheet" href="../css/shop.css"> -->
    <!-- <link rel="stylesheet" href="../links/css/all.css"> -->
    <link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../links/bootstrap/js/bootstrap.min.js">
</head>

<body>
    <!-- logo and navigation -->
    <?php
    include "nav.php";
    ?>
    <div class="container">
        <table class="table">
            <form method="POST">
                <tr>
                    <th>srno</th>
                    <th>product name</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>Total</th>
                </tr>

                <tr>
                    <?php
                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $total = $total + $value['price'];
                            echo "<tr>
                        <td name='proname'>$value[proname]</td>
                        <td>$value[price]</td>
                        <td><input type='number' class='text-center' value='$value[quantity]' min='1' max='10'></td>
                        <td><button class='btn btn-danger' name='remove_item'>REMOVE</button></td>
                        <td>$total</td>
                    </tr>";
                        }
                    }
                    ?>

                </tr>
            </form>
        </table>
    </div>
</body>

</html>