<?php
session_start();
if (isset($_SESSION['email'])) {
    
if (isset($_POST["adding_cart"])) {
    $proname = $_POST['proname'];
    $pro_price = $_POST['price'];
    $pro_quantity = $_POST['quantity'];
    $check_pro = array_column($_SESSION['cart'], 'proname');
    if (in_array($proname, $check_pro)) {
        echo "<script>alert('product already added');
                window.location.href='home.php';</script>";
    } else {
     
    $_SESSION['cart'][] = array('proname' => $proname, 'price' => $pro_price, 'quantity' => $pro_quantity);
    print_r($_SESSION['cart']);
     header("location:home.php");
    }
}

}
if (isset($_POST['Mod_Quantity'])) {
    foreach($_SESSION['cart'] as $key => $value){
        if ($value['proname']==$_POST['name']) {
            $_SESSION['cart'][$key]['quantity']=$_POST['Mod_Quantity'];
            echo "<script>
                window.location.href='cart.php';
                </script>";
        }
    }
}
else
{
    header("location:User.php");
}
 

// buy product
// if (isset($_POST["buy"])) {
//     header("location:ord_form.php");
// }