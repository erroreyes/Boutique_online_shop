<?php
session_start();
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        if (isset($_POST["add_to_cart"])) {
            if (isset($_SESSION['cart'])) {
                
            }
            else {
                echo "jsdbfjsbf";
                $_SESSION['cart'][0]=array('proname'=>$_POST['proname'],'price'=>$_POST['price'],'quantity'=>1);
                print_r($_SESSION['cart']);
            }
        }
    }
?>