<?php
include "config.php";
$qry = "SELECT * FROM user";
$nerr = $emailerr = $perr = $cerr = $serr = $derr = $merr = $aerr = $ierr = $aerr = "";
if (isset($_POST['submit'])) {
    if (!mysqli_query($conn, $qry)) {
        $craeteTable = "CREATE TABLE USER(
                id int(4) auto_increment primary key,
                fullName varchar(60),
                email varchar(40),
                pwd text,
                state varchar(40),
                dob date,
                mobile bigint,
                image text,
                address varchar(255)
            )";
    }
    $alpha = '/^[A-Za-z]$/';
    $number = '/^[0-9]{10}$/';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $state = $_POST['state'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $target_dir = "../img/";
    $imgpath = $target_dir . basename($_FILES['file']['name']);
    $moveimg = move_uploaded_file($_FILES['file']['tmp_name'], $imgpath);
    $filesize = $_FILES['file']['size'];

    if (empty($name) && empty($email) && empty($pass) && empty($cpass)) {
        $nerr = "this field required";
    } elseif (empty($email)) {
        $emailerr = "email required";
    } elseif (!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/", $email)) {
        $emailerr = "invalid email ";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nerr = "only alpha and white space allow";
    } elseif (empty($pass)) {
        $perr = "password required";
    } elseif (!strlen($pass) == 8 || !$alpha || !$number) {
        $perr = "only 8 digit require";
    } elseif (empty($cpass)) {
        $cerr = "must be same as password";
    } elseif ($pass !== $cpass) {
        $cerr = "must be same as password";
    } elseif (empty($mobile)) {
        $merr = "mobile no is required";
    } elseif (!preg_match($number, $mobile)) {
        $merr = "must be 10 digit";
    } elseif (empty($state)) {
        $serr = "state is required";
    } elseif (empty($dob)) {
        $derr = "date is required";
    } elseif (empty($address)) {
        $aerr = "address is required";
    } elseif (empty($filesize)) {
        $ierr = "image is required";
    } elseif ($filesize > 1000000) {
        $ierr = "image must be less than 1mb";
    } else {

        $insert = "INSERT INTO USER( `fullName`, `email`, `pwd`, `state`, `dob`, `mobile`, `image`, `address`) VALUES('$name','$email','$pass',' $state','$dob','$mobile','$imgpath','$address')";
        $insertchk = mysqli_query($conn, $insert);
        if ($insertchk) {
            header("location:User.php");
        } else {
            mysqli_error($conn);
        }
    }
}

?>
<html>
<link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">

<style>
    <?php
        include "../css/signup.css";
    ?>
</style>

<body>
    <?php include "nav.php" ?>
    <section class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <h2 style="font-size: 48px; background-color:#f8e7e0;color:#416163;" class="text-center" id="banner">Sign Up</h2>
                <form class="form-container" method="POST" enctype="multipart/form-data">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-sm-5 col-xs-6 mt-4">
                            <div class="form-group">
                                <label>Name :</label>
                                <input type="text" class="form-control" placeholder="UserName" name="name" value="<?php if (isset($_POST['name'])) {
                                                                                                                        echo  $_POST['name'];
                                                                                                                    } ?>">
                            </div>
                            <span>*<?php echo $nerr; ?></span>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-6">
                            <div class="form-group">
                                <label>Email :</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php if (isset($_POST['email'])) {
                                                                                                                        echo $email = $_POST['email'];
                                                                                                                    } ?>">
                            </div>
                            <span>* <?php echo $emailerr . $nerr; ?></span>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-6">
                            <div class="form-group">
                                <label>Password :</label>
                                <input type="password" class="form-control" placeholder="Password" name="pass" value="<?php if (isset($_POST['pass'])) {
                                                                                                                            echo $pass = $_POST['pass'];
                                                                                                                        } ?>">
                            </div>
                            <span>*<?php echo $perr . $nerr; ?></span>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-6">
                            <div class="form-group">
                                <label>Confirm Password :</label>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="cpass" value="<?php if (isset($_POST['cpass'])) {
                                                                                                                                    echo $cpass = $_POST['cpass'];
                                                                                                                                } ?>">
                            </div>
                            <span>*<?php echo $cerr . $nerr; ?></span>
                        </div>


                        <div class="col-md-4 col-sm-5 col-xs-6">
                            <div class="form-group">
                                <label>DOB:</label>
                                <input type="date" class="form-control" placeholder="UserName" name="dob" value="<?php if (isset($_POST['dob'])) {
                                                                                                                        echo $dob = $_POST['dob'];
                                                                                                                    } ?>">
                            </div>
                            <span>*<?php echo $derr; ?></span>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-6 text-left">
                            <div class="form-group">
                                <label>State:</label>
                                <div> <select name="state" style="width:70%">
                                        <option disabled>select anyone..</option>
                                        <option value="surat" <?php if (isset($_POST['state'])) {
                                                                    if ($_POST['state'] == 'surat') {
                                                                ?> selected <?php }
                                                                    } ?>>Surat</option>
                                        <option value="vadodara" <?php if (isset($_POST['state'])) {
                                                                        if ($_POST['state'] == 'vadodara') {
                                                                    ?>selected<?php }
                                                                        } ?>>vadodara</option>
                                        <option value="Ahmedabad" <?php if (isset($_POST['state'])) {
                                                                        if ($_POST['state'] == 'ahmedabad') {
                                                                    ?>selected<?php }
                                                                        } ?>>Ahmedabad</option>
                                    </select>
                                </div>
                            </div>
                            <span>*<?php echo $serr; ?></span>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-6">
                            <div class="form-group">
                                <label>Photo:</label>
                                <input type="file" class="form-control" name="file" value="<?php if (isset($_FILES['file']['name'])) {
                                                                                                echo $imgpath = $_FILES['file']['name'];
                                                                                            } ?>">
                            </div>
                            <span>*<?php echo $ierr; ?></span>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-6">
                            <div class="form-group">
                                <label>Mobile No:</label>
                                <input type="text" class="form-control" placeholder="Mobile No" name="mobile" value="<?php if (isset($_POST['mobile'])) {
                                                                                                                            echo $mobile = $_POST['mobile'];
                                                                                                                        } ?>">
                            </div>
                            <span>*<?php echo $merr; ?></span>
                        </div>
                        <div class="col-md-8 col-sm-5 col-xs-6 justify-content-end">
                            <div class="form-group">
                                <label>Address:</label>
                                <textarea type="text" class="form-control" placeholder="Address..." name="address"><?php if (isset($_POST['address'])) {
                                                                                                                        echo  $_POST['address'];
                                                                                                                    } ?></textarea>
                            </div>
                            <span>*<?php echo $aerr; ?></span>
                        </div>
                        <div class="col-md-12 col-sm-5 col-xs-6">
                            <div class="form-group text-right">
                                <input type="submit" class="btn btn-lg  mt-3" id="btn1" value="Sign Up" name="submit">
                                <a href="signUp.php" class="btn btn-lg mt-3 btn-danger" id="btn2">Cancel</a>
                            </div>
                        </div>
                </form>
            </div>

    </section>

</body>

</html>