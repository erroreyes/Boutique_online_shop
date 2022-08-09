<?php
include "config.php";
$qry = "SELECT * FROM product";
$qrychk = mysqli_query($conn, $qry);
$nameerr = $nerr = $perr = "";

if (!$qrychk) {
    $craetetbl = "CREATE TABLE product(
            pid int(4) auto_increment primary key,
            pname varchar(70),
            price bigint,
            pimage longblob
        )";
    mysqli_query($conn, $craetetbl);
}
if (isset($_POST['add'])) {
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $target_dir = "../img/";
    $imgpath = $target_dir . basename($_FILES['img']['name']);
    $moveimg = move_uploaded_file($_FILES['img']['tmp_name'], $imgpath);
    // echo $moveimg;
    if (empty($pname)) {
        $nerr = "this field required";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $pname)) {
        $nameerr = "only alpha and white space allow";
    } elseif (!preg_match("/^[0-9]*$/", $price)) {
        $perr = "must be numeric value";
    } else {
        $insert = "INSERT INTO `product` (`pname`,`price`,`pimage`) values ('$pname','$price','$imgpath')";
        $insertchk = mysqli_query($conn, $insert);
        if ($insertchk) {
            header("location:product.php");
        } else {
            mysqli_error($conn);
        }
    }
}


?>
<html>

<head>
    <link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../links/fontawesome/css/all.min.css">
</head>

<body>
    <?php include "sidebar.php" ?>
    <div class="container-fluid">
    <div class="row justify-content-end">
            <div class="col-10 mt-4">
                <!-- Button trigger modal -->
                <!-- <a href="add_product.php" type="button" class="btn btn-primary" >
                    Add Product
                </a> -->

                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_name" class="col text-left">Product Name :</label>
                        <input type="text" placeholder="Name" name="pname" class="form-control">
                    </div>
                    <span>*<?php echo $nerr;
                            echo $nameerr; ?></span>

                    <div class="form-group">
                        <label for="product_price" class="col text-left">Price :</label>
                        <input type="text" placeholder="Price" name="price" class="form-control">
                    </div>
                    <span>*<?php echo $nerr;
                            echo $perr; ?></span>

                    <div class="form-group">
                        <label for="product_img" class="col text-left">Image :</label>
                        <input type="file" name="img" class="form-control">
                    </div>
                    <span>*<?php echo $nerr; ?></span>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add">Add</button>
                </form>
            </div>

        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>