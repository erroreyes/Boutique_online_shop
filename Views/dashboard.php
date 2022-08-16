<?php
session_start();
include "config.php";
if (!$_SESSION['admin']) {
    $_SESSION['admin'] = $_COOKIE['admin'];
}

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
        <div class="row justify-content-center" >

            <div class="col-3 p-5" style="margin-left:-15%;">
                <a href="user_data.php" style="text-decoration:none;">
                    <h4 class="text-dark  p-4  text-center " style="border-radius:10px;background-color:lightpink;"> User
                <hr> (50)</h3>
                </a>
            </div>
            <div class="col-3 p-5" style="margin-left:-3%;">
                <a href="product.php" style="text-decoration:none;">
                    <h4 class="text-dark p-4  text-center " style="border-radius:10px;background-color:lightpink;">Product <hr>(100)
                </h3>
                </a>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>