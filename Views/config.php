<?php
    $conn=mysqli_connect("localhost","root","");
    if ($conn) {
        if (!mysqli_select_db($conn,"boutique")) {
            $createDb = "CREATE DATABASE boutique";
                if (mysqli_query($conn,$createDb)) {
                    mysqli_select_db($conn,"boutique");
                }
        }
    }
    else{
        echo mysqli_connect_error();
    }
?>