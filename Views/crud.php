<?php
include "config.php";
// #################################################   delete product
if (isset($_POST['delete_data'])) {
    $id = $_POST['deleteid'];
    $qry = "DELETE FROM product WHERE pid='$id'";
    $qrychk = mysqli_query($conn, $qry);
    if ($qrychk) {
        header("location:product.php");
    } else {
        echo "<script>alert('data not deleted')</script>";
    }
}
// #################################################   update product

if (isset($_POST['updatedata'])) {
    $pid = $_POST['update_id'];
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $target_dir = "../img/";
    $imgpath = $target_dir . basename($_FILES['img']['name']);

    $query = "UPDATE product SET pname='$pname', price='$price', pimage='$imgpath' WHERE pid='$pid' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $moveimg = move_uploaded_file($_FILES['img']['name'], $imgpath);
        header("Location:product.php");
    } else {
        echo mysqli_error($conn);

    }
}
// #################################################   delete user
if (isset($_POST['user_delete'])) {
    $uid = $_POST['user_deleteid'];
    $qry = "DELETE FROM user WHERE id='$uid'";
    $qrychk = mysqli_query($conn, $qry);
    if ($qrychk) {
        header("location:user_data.php");
    } else {
        echo "<script>alert('data not deleted')</script>";
    }
}
// #################################################   update user

if (isset($_POST['user_update'])) {
    $uid = $_POST['user_updateid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    // $gender=$_POST['gender'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $state = $_POST['state'];
    $target_dir = "../img/";
    $imgpath = $target_dir . basename($_FILES['file']['name']);

    $query = "UPDATE user SET  fullName='$name',email='$email',state='$state', dob='$dob', mobile='$mobile', image='$imgpath' where id='$uid' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $moveimg = move_uploaded_file($_FILES['file']['name'], $imgpath);
        header("Location:user_data.php");

    } else {
        echo mysqli_error($conn);

    }
}
