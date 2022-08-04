<?php
include "config.php";
if(isset($_POST['delete_data'])){
    $id=$_POST['deleteid'];
    $qry="DELETE FROM product WHERE pid='$id'";
    $qrychk=mysqli_query($conn,$qry);
    if($qrychk){
    echo "<script>alert('data deleted')</script>";
    header("location:product.php");
    }
    else{
    echo "<script>alert('data not deleted')</script>";
    }
}
?>