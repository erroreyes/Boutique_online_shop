<?php
session_start();
include "config.php";
if (!$_SESSION['admin']) {
    $_SESSION['admin'] = $_COOKIE['admin'];
}
$qry = "SELECT * FROM product";
$qrychk = mysqli_query($conn, $qry);
// $nameerr = $nerr = $perr = "";

if (!$qrychk) {
    $craetetbl = "CREATE TABLE product(
            pid int(4) auto_increment primary key,
            pname varchar(70),
            price bigint,
            pimage text
        )";
    mysqli_query($conn, $craetetbl);
}
if (isset($_POST['add'])) {
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $target_dir = "../img/";
    $imgpath = $target_dir . basename($_FILES['img']['name']);
    $moveimg = move_uploaded_file($_FILES['img']['name'], $imgpath);
    // if (empty($pname)) {
    //     $nerr = "this field required";
    // } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $pname)) {
    //     $nameerr = "only alpha and white space allow";
    // } elseif (!preg_match("/^[0-9]*$/", $price)) {
    //     $perr = "must be numeric value";
    // } else {
    $insert = "INSERT INTO `product` (`pname`,`price`,`pimage`) values ('$pname','$price','$imgpath')";
    $insertchk = mysqli_query($conn, $insert);
    if ($insertchk) {
        header("location:product.php");
    } else {
        mysqli_error($conn);
    }
    // }
}
// update


?>
<html>

<head>
    <link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../links/fontawesome/css/all.min.css">
</head>

<body>
    <!-- ************************************************************* -->
    <!---------------  EDIT MODAL ------------ -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                </div>
                <div class="modal-body">
                    <form action="crud.php" method="POST" enctype="multipart/form-data" >
                        <input type="hidden" name="update_id" id="updateid">
                        
                        <div class="form-group">
                            <label for="product_name" class="col text-left">Product Name :</label>
                            <input type="text" placeholder="Name" name="pname" id="pname" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="product_price" class="col text-left">Price :</label>
                            <input type="text" placeholder="Price" name="price" id="price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="product_img" class="col text-left">Image :</label>
                            <input type="file" name="img" id="image" class="form-control">
                        </div>
                       
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="updatedata">Update</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- *******************************************    EDIT END                **************************************************** -->
    <!-- ************************************************************* -->
    <!---------------  DELETE MODAL ------------ -->
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- <div class="modal-body"> -->
                <form action="crud.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden">
                    <div class="bg-light">
                        <p class="text-dark  text-center p-5" style="font-size:27px;">Are you sure to delete id =<input type="text" name="deleteid" id="deleteid" class="border-0 text-center bg-light text-dark" style="width:5%;font-size:27px;"> ?</p>
                    </div>
                    <div class="text-right mr-5">
                        <button type="button" class="btn btn-danger w-25 mr-1" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn w-25 text-white" name="delete_data" style="background-color:#416163 ;">Yes</button>
                    </div>
                </form>
                <!-- </div> -->

            </div>
        </div>
    </div>
    <!-- ***************************************        DELETE END           *********************************************** -->

    <?php include "sidebar.php" ?>
    <div class="container-fluid bg-light p-1">
        <div class="row justify-content-end">
            
            <div class="col-10 text-right mr-5 align-self-center">

                <p style="font-size:20px;"><i class="fas fa-user"></i> <?php echo $_SESSION['admin']; ?></p>
            </div>
        </div>
    </div>



    <!-- add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="product_name" class="col text-left">Product Name :</label>
                            <input type="text" placeholder="Name" name="pname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="product_price" class="col text-left">Price :</label>
                            <input type="text" placeholder="Price" name="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="product_img" class="col text-left">Image :</label>
                            <input type="file" name="img" class="form-control">
                        </div>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="add">Add</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row justify-content-end">
            <div class="col-5 text-left" style="padding-top:2%;margin-right:2.2%;">
                <p style="font-size:35px;color:#416163;">Product Details</p>
            </div>
            <div class="col-4 text-right align-self-center mr-5">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info w-50" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Product
                </button>
            </div>
            <div class="col-10" style="padding: 0 4%;">
                <table class="table table-stripped bg-light text-center ">
                    <tr style="background-color:#416163;color:#fff">
                        <th>ID</th>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>IMAGE</th>
                        <th>UPDATE</th>
                        <th>DELETE</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($qrychk)) {
                    ?>
                        <tr>
                            <td><?php echo $row['pid']; ?></td>
                            <td><?php echo $row['pname']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><img src="<?php echo $row['pimage']; ?>" alt="" width="100px"></td>
                            <td style="color:green;" class="edit"><i class="fas fa-pen"></i></td>
                            <td class="text-danger delete"><i class="fas fa-trash"></i></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('.edit').on('click', function() {
            $('#editmodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#updateid').val(data[0]);
            $('#pname').val(data[1]);
            $('#price').val(data[2]);
            $('#image').val(data[3]);
        });


    });
</script>
<script>
    $(document).ready(function() {
        $('.delete').on('click', function() {
            $('#deletemodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#deleteid').val(data[0]);
        });
    });
</script>

</html>