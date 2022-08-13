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
                            <td style="color:green;"><i class="fas fa-pen"></i></td>
                            <td class="text-danger"><i class="fas fa-trash"></i></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>