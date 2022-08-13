<?php
session_start();
include "config.php";
if (!isset($_COOKIE['email'])) {
    header("loation:home.php");
}
if (!isset($_SESSION['email'])) {
    // $_SESSION['email'] = $_COOKIE['email'];
    header("location:User.php");
}
$uid = $_SESSION['email'];
$qry = "SELECT * FROM user where email='$uid'";
$qrychk = mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($qrychk);
$idd = $name = $email = $pass = $gender = $dob = $state = $mob = $img = "";
if ($row > 0) {

    $idd = $row['id'];
    $name = $row['fullName'];
    $email = $row['email'];
    $gender = $row['gender'];
    $dob = $row['dob'];
    $state = $row['state'];
    $mob = $row['mobile'];
    $img = $row['image'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link rel="stylesheet" href="../links/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../links/bootstrap/js/bootstrap.min.js">
    <style>
        #wrapper {
            position: fixed;
            height: 100%;
        }

        .list-group a {
            color: #fff;
            text-decoration: none;
            border: none;
            font-size: large;
            padding: 2%;
            margin: 5%;
        }

        .list-group a:hover {
            color: #f8e7e0;
        }

        span:hover {
            background-color: #fff;

        }

        h6 {
            border-bottom: 1px solid white;
        }

        tr td:first-child {
            background-color: #416163;
            color: #fff;
            padding: 3%;
        }

        tr .second-part {
            background-color: #93c4c7;
            color: black;
        }

        img {
            object-fit: cover;
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2" id="wrapper" style="background-color: #416163;">
                <h6 class="p-3  mb-4 text-center  text-white" style="margin:-15px;font-size:18px">
                    <p style="font-size:20px;" class="p-1"><img src="<?php echo $img; ?>" class="rounded-circle" width="100px"> </p>
                       <?php echo $uid; ?></h6>
               
                    <div class="list-group list-group-flush my-3">
                        <a href="home.php" class="list-group-item bg-transparent second-text fw-bold text-center  ">HOME</a>
                        <a href="about.php" class="list-group-item bg-transparent second-text fw-bold text-center  ">ABOUT</a>
                        <a href="contact.php" class="list-group-item bg-transparent second-text fw-bold text-center  ">CONTACT</a>
                        <a href="user_logout.php" class="list-group-item text-center  bg-transparent second-text fw-bold">LOGOUT</a>

                    </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="row justify-content-end">
            <div class="col-10 text-right mr-5 align-self-center">
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-end ">
            <div class="col-10" style="padding: 0 15%;">
                <table class="table table-stripped  text-center border border-1  mt-5">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td class="second-part"><?php echo $idd; ?></td>
                        </tr>
                        <tr>
                            <td>FULL NAME</td>
                            <td class="second-part"><?php echo $name; ?></td>
                        </tr>

                        <tr>
                            <td>DOB</td>
                            <td class="second-part"><?php echo $dob; ?></td>
                        </tr>
                        <tr>
                            <td>STATE</td>
                            <td class="second-part"><?php echo $state; ?></td>
                        </tr>
                        <tr>
                            <td>GENDER</td>
                            <td class="second-part"><?php echo $gender; ?></td>
                        </tr>
                        <tr>
                            <td>MOBILE NO.</td>
                            <td class="second-part"><?php echo $mob; ?></td>
                        </tr>

                        <tr>
                            <td>EMAIL</td>
                            <td class="second-part"><?php echo $email; ?></td>
                        </tr>

                        <tr>
                            <td>IMAGE</td>
                            <td class="second-part"><img src="<?php echo $img; ?>" width="100px"></td>
                        </tr>
                        <!-- <tr>
                            <td>OPERATIONS</td>
                            <td class="second-part"><a class="text-warning" href="user_update.php?id=<?php echo $idd; ?>">Edit</a></td>
                        </tr> -->


                    </tbody>

                </table>
            </div>
        </div>
    </div>
</body>

</html>