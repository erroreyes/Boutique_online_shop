<?php
session_start();
include "config.php";
if (!$_SESSION['admin']) {
    $_SESSION['admin'] = $_COOKIE['admin'];
}
$qry = "SELECT * FROM user";
$qrychk = mysqli_query($conn, $qry);

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
        <div class="modal-dialog modal-dialog-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="crud.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="user_updateid" id="user_updateid">
                        <div class="form-group">
                            <label>Name :</label>
                            <input type="text" class="form-control" placeholder="UserName" name="name" id='name'>
                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" id='email'>
                        </div>
                        <div class="form-group">
                            <label>State:</label>
                            <input type="text" class="form-control" placeholder="state" name="state" id='state'>
                        </div>

                        <div class="form-group">
                            <label>DOB:</label>
                            <input type="date" class="form-control" placeholder="UserName" name="dob" id='dob'>
                        </div>
                        <div class="form-group">
                            <label>Mobile No:</label>
                            <input type="text" class="form-control" placeholder="Mobile No" name="mobile" id='mobile'>
                        </div>
                        <div class="form-group">
                            <label>Photo:</label>
                            <input type="file" class="form-control" name="file" id='file'>
                        </div>
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="user_update">Update</button>
                        </div>
                </div>
                </form>
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
                    <input type="text" id="user_deleteid" name="user_deleteid">
                    <div class="bg-light">
                        <p class="text-dark  text-center p-5" style="font-size:27px;">Are you sure to delete this data ?</p>
                    </div>
                    <div class="text-right mr-5">
                        <button type="button" class="btn btn-danger w-25 mr-1" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn w-25 text-white" name="user_delete" style="background-color:#416163 ;">Yes</button>
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
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-10 text-left " style="padding-top:2%;margin-right:-3.2%;">
                <p style="font-size:35px;color:#416163;">User Details</p>
            </div>
            <div class="col-10" style="padding: 0 4%;">
                <table class="table table-stripped bg-light text-center">
                    <tr style="background-color:#416163;color:#fff">
                        <th>ID</th>
                        <th>NAME</th>
                        <th>Email</th>
                        <th>STATE</th>
                        <th>DOB</th>
                        <th>MOBILE NO</th>
                        <th>GENDER</th>
                        <th>IMAGE</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($qrychk)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['fullName']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['state']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo $row['mobile']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><img src="<?php echo $row['image']; ?>" alt="" width="50px"></td>
                            <td style="color:green;" class="edit"><i class="fas fa-pen"></i></td>
                            <td class="text-danger delete"><i class="fas fa-trash"></i></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    </div>
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
                $('#user_updateid').val(data[0]);
                $('#name').val(data[1]);
                $('#email').val(data[2]);
                $('#state').val(data[3]);
                $('#dob').val(data[4]);
                $('#mobile').val(data[5]);
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
                $('#user_deleteid').val(data[0]);
            });
        });
    </script>
</body>

</html>