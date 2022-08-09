<?php
include "config.php";
$qry = "SELECT * FROM product";
$qrychk = mysqli_query($conn, $qry);
// $nameerr = $nerr = $perr = "";

// if (!$qrychk) {
//     $craetetbl = "CREATE TABLE product(
//             pid int(4) auto_increment primary key,
//             pname varchar(70),
//             price bigint,
//             pimage longblob
//         )";
//     mysqli_query($conn, $craetetbl);
// }
// if (isset($_POST['add'])) {
//     $pname = $_POST['pname'];
//     $price = $_POST['price'];
//     $target_dir = "../img";
//     $imgpath = $target_dir . basename($_FILES['img']['name']);
//     $moveimg = move_uploaded_file($_FILES['img']['name'], $imgpath);
//     if (empty($pname)) {
//         $nerr = "this field required";
//     } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $pname)) {
//         $nameerr = "only alpha and white space allow";
//     } elseif (!preg_match("/^[0-9]*$/", $price)) {
//         $perr = "must be numeric value";
//     } else {
//         $insert = "INSERT INTO `product` (`pname`,`price`,`pimage`) values ('$pname','$price','$imgpath')";
//         $insertchk = mysqli_query($conn, $insert);
//         if ($insertchk) {
//             echo "<script>alert('data inserted')</script>";
//             // header("location:product.php");
//         } else {
//             mysqli_error($conn);
//         }
//     }
// }


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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="crud.php">
                        <input type="hidden" name="update_id" id="update_id">
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

                        <!-- <div class="modal-footer"> -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                        <!-- </div> -->
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- *******************************************    EDIT END                **************************************************** -->
    <!-- ************************************************************* -->
    <!---------------  DELETE MODAL ------------ -->
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="crud.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="deleteid" id="deleteid">
                        <div>
                            <h4 class="text-info">ARE YOY SURE TO DELETE THIS DATA</h4>
                        </div>
                        <div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary" name="delete_data">Yes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- ***************************************        DELETE END           *********************************************** -->

    <?php include "sidebar.php" ?>
    <div class="container-fluid">
        <div class="row justify-content-end text-right mt-5 mr-5">
            <div class="col-12">
                <!-- Button trigger modal -->
                <a href="add_product.php" type="button" class="btn btn-primary" >
                    Add Product
                </a>
                

                <!-- Modal -->
                <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
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
                </div> -->
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-10 mt-4">
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
                            <td><img src="<?php echo $row['pimage']; ?>" alt="" width="100px" height="100"></td>
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