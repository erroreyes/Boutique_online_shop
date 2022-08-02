<?php
include "config.php";
$qry = "SELECT * FROM adminTbl";
$chk = mysqli_query($conn, $qry);

if (!$chk) {
    $craetetbl = "CREATE TABLE adminTbl(
        adminid varchar(44),
        password text
    )";
    if (!mysqli_query($conn, $craetetbl)) {
        mysqli_error($conn);
    }
    
}
$err = $perr = $emty = "";
$admindata = mysqli_fetch_assoc($chk);
if (isset($_POST['submit'])) {
    $adminid = $_POST['adminid'];
    $adminpss = $_POST['adminpass'];

    if (empty($adminid) && empty($adminpass)) {
        $emty = "Required";
    } elseif ($admindata['adminid'] != $adminid) {
        $err = "invalid username";
    } elseif ($admindata['password'] != $adminpss) {
        $perr = "invalid password";
    } else{
         header("location:dashboard.php");
    }
}
?>


<html>
<link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../links/fontawesome-free-5.15.4-web/css/all.min.css">

<style>
    label {
        font-size: 17.5px;
    }

    .input-group input {
        height: 50px;

    }

    .input-group i {
        font-size: 24px;
    }

    .form-container {
        /* border: 1px solid #fff; */
        padding: 5% 8% 5% 8%;
        /* box-shadow: -1px 4px 27px 8px whitesmoke; */
        border-radius: 0px 0px 20px 20px;
        background-color: #416163;
    }

    #btn {
        border-radius: 20px;
        color: #416163;
        font-size: 26px;
        background-color: #f8e7e0;
    }

    section {
        color: #fff;
    }

    .banner {
        margin-bottom: -20px;
        height: 25%;
        padding: 10px;
        border-radius: 20px;
    }

    .input-group {
        margin: 10px;
    }
</style>

<body class="bg">
    <?php include "nav.php" ?>
    <div class="p-5"></div>
    <section class="container">
        <div class="row justify-content-center">
            <div class=" col-lg-7 col-md-10 col-sm-10 col-xs-12">
                <h1 style="font-size: 50px; background-color:#f8e7e0;color:#416163;margin-top:0;" class="text-center banner">Admin</h1>
                <form class="form-container" method="POST">
                    <div class="row">
                        <div class="input-group">

                            <div class="input-group-text" id="btninputemail" style="background-color:#f8e7e0;width:50px;"><i class="fas fa-user"></i></div>
                            <input type="email" class="form-control" placeholder="UserName" name="adminid" aria-describedby="btninputemail">
                        </div>
                        <span style="color:#f8e7e0 ;"><?php echo $emty ; echo $err; ?></span>
                        <div class="input-group">
                            <div class="input-group-text" id="btninputpass" style="background-color:#f8e7e0 ; width:50px;"><i class="fas fa-lock"></i></div>
                            <input type="password" class="form-control" placeholder="Password" name="adminpass" aria-describedby="btninputpass">
                        </div>
                        <span style="color:#f8e7e0 ;"><?php echo  $emty; echo $perr; ?></span>
                        <div class="col-12 mt-3">
                            <label><a href="" class="text-white" style="text-decoration: none;"> Forget Password ? </a></label>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm w-100 mt-3" id="btn" name="submit">Sign In</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> -->

</html>