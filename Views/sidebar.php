<html>

<head>
    <link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">
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
        span:hover{
            background-color: #fff;

        }
        h2{
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2" id="wrapper" style="background-color: #416163;">
                <h2 class="p-3 bg-white mb-4 text-center" style="margin:-15px;">
                    <a href="#"><img src="../img/logo1.png" width="200px"></a>
                </h2>
                <div class="list-group list-group-flush my-3">
                    <a href="dashboard.php" class="list-group-item text-center  bg-transparent second-text fw-bold">DASHBOARD</a>
                    <a href="home.php" class="list-group-item bg-transparent second-text fw-bold text-center  ">HOME</a>
                    <a href="user_data.php" class="list-group-item  text-center bg-transparent second-text fw-bold">USER</a>
                    <a href="product.php" class="list-group-item  text-center bg-transparent second-text fw-bold">PRODUCT</a>
                    <a href="user_order.php" class="list-group-item text-center  bg-transparent second-text fw-bold">USER ORDER</a>
                    <a href="admin_logout.php" class="list-group-item text-center  bg-transparent second-text fw-bold">LOGOUT</a>

                </div>
            </div>
        </div>
    </div>
</body>

</html>