<?php
include "config.php";
// #################################################   delete product
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
// #################################################   update product

    if(isset($_POST['updatedata']))
    {   
        $pid = $_POST['update_id'];
        
        $pname = $_POST['pname'];
        $price = $_POST['price'];
        $img = $_POST['img'];

        $query = "UPDATE product SET pname='$pname', price='$price', pimage='$img' WHERE pid='$pid'  ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:product.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>