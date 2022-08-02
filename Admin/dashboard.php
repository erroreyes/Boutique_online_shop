<?php
include "config.php";
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
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-10 mt-4">
                <table class="table table-stripped bg-light text-center">
                    <tr style="background-color:#416163;color:#fff">
                        <th>ID</th>
                        <th>NAME</th>
                        <th>Email</th>
                        <th>STATE</th>
                        <th>DOB</th>
                        <th>MOBILE NO</th>
                        <th>ADDRESS</th>
                        <th>IMAGE</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <th>View</th>
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
                            <td><?php echo $row['address']; ?></td>
                            <td><img src="<?php echo $row['image']; ?>" alt="" width="100px"></td>
                            <td style="color:green;"><i class="fas fa-pen"></i></td>
                            <td class="text-danger"><i class="fas fa-trash"></i></td>
                            <td style="color:blue;"><i class="fas fa-eye"></i></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>