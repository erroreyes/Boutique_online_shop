<?php
session_start();
include "config.php";

$qry = "SELECT * FROM order";
$nerr  = $serr = $merr = $aerr = $gerr = $derr="";
if (isset($_POST['submit'])) {
    if (!mysqli_query($conn, $qry)) {
        $craeteTable = "CREATE TABLE order(
                ord_id int(4) auto_increment primary key,
                fullName varchar(60),
                gender varchar(20),
                state varchar(40),
                ord_date date,
                mobile bigint,
                address  text
            )";
            mysqli_query($conn,$craeteTable);
    }
    $alpha = '/^[A-Za-z]$/';
    $number = '/^[0-9]{10}$/';
    $name = $_POST['name'];
    $state = $_POST['state'];
    $date=$_POST['date'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    if (empty($name) ) {
        $nerr = "this field required";
    } elseif (empty($mobile)) {
        $merr = "mobile no is required";
    } elseif (!preg_match($number, $mobile)) {
        $merr = "must be 10 digit";
    } elseif (empty($state)) {
        $serr = "state is required";
    }elseif (empty($date)) {
        $derr = "state is required";
    } elseif (empty($gender)) {
        $gerr = "address is required";
    } elseif (empty($address)) {
        $aerr = "image is required";
    } else {

        $insert = "INSERT INTO order( `fullName`,`gender`,`state`,`ord_date`, `mobile`, `address`) VALUES('$name','$gender',' $state','$date','$mobile','$address')";
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

<body class="bg-light">
    <?php include "nav.php" ?>
    <div class="p-5">  </div>
    <section class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <h2 style="font-size: 48px; background-color:#f8e7e0;color:#416163;" class="text-center" id="banner">Order Form</h2>
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
                                <label>Date:</label>
                                <input type="date" class="form-control" placeholder="Date" name="dob" value="<?php if (isset($_POST['date'])) {
                                                                                                                        echo $dob = $_POST['date'];
                                                                                                                    } ?>">
                            </div>
                            <span>*<?php echo $derr; ?></span>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-6 text-left align-self-center">
                            <div class="form-group text-white">
                                <label>Gender :</label>
                                <input type="radio" name="gender" value="male" <?php if (isset($_POST['gender'])) {
                                                                                    if ($_POST['gender'] == 'male')
                                                                                        echo  'checked';
                                                                                } ?>> Male
                                <input type="radio" name="gender" value="female" <?php if (isset($_POST['gender'])) {
                                                                                        if ($_POST['gender'] == 'female')
                                                                                            echo 'checked';
                                                                                    } ?>> Female
                            </div>
                            <span>*<?php echo $gerr; ?></span>
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
                                <label>State:</label>
                                <div> <select name="state" style="width:70%" class="form-control">
                                        <option value="select state" selected disabled>select state</option>
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
                        <div class="col-lg-12 col-md-12 col-sm-5 col-xs-6">

                            <div class="form-group">
                                <label>Address :</label>
                                <div > 
                                    <textarea class="form-control" name="address"  cols="90" rows="2"></textarea>
                                </div>
                            </div>
                            <span>*<?php echo $serr; ?></span>
                        </div>
                        <div class="col-md-12 col-sm-5 col-xs-6">
                            <div class="form-group text-right">
                                <input type="submit" class="btn btn-lg  mt-3" id="btn1" value="Confirm" name="submit">
                                <a href="signUp.php" class="btn btn-lg mt-3 btn-danger" id="btn2">Cancel</a>
                            </div>
                        </div>
                </form>
            </div>

    </section>

</body>

</html>