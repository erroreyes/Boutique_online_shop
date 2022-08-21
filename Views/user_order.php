<?php
session_start();
include "config.php";
if (!$_SESSION['admin']) {
    $_SESSION['admin'] = $_COOKIE['admin'];
}
$qry = "SELECT * FROM order_payment";
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
                <p style="font-size:35px;color:#416163;">Order Detail</p>
            </div>
            <div class="col-10" style="padding: 0 4%;">
                <table class="table table-stripped bg-light text-center border border-1">
                    <tr style="background-color:#416163;color:#fff">
                        <th>NAME</th>
                        <th>PHONE NO</th>
                        <th>ADDRESS</th>
                        <th colspan="3"></th>

                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($qrychk)) {
                    ?>
                        <tr>
                            <td><?php echo $row['fullName']; ?></td>
                            <td><?php echo $row['phoneNo']; ?></td>
                            <td><?php echo $row['Address']; ?></td>
                            <th style="background-color:pink;color:#000">PRODUCT NAME</th>
                            <th style="background-color:pink;color:#000">PRODUCT PRICE</th>
                            <th style="background-color:pink;color:#000">QUANTITY</th>
                        <tr>
                            <?php
                            $qry2 = "SELECT * FROM user_order where ord_Id='$row[ord_Id]'";
                            $qrychk2 = mysqli_query($conn, $qry2);
                            while ($row2 = mysqli_fetch_assoc($qrychk2)) {
                            ?>
                                <td colspan="3"></td>
                                <td><?php echo $row2['pro_name']; ?></td>
                                <td><?php echo $row2['price']; ?></td>
                                <td><?php echo $row2['quantity']; ?></td>
                        </tr>
                <?php
                                echo mysqli_error($conn);
                            }
                        }
                ?>
                </tr>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>