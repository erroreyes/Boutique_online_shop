<?php
session_start();
include "config.php";
$qry = "SELECT * FROM product";
$qrychk = mysqli_query($conn, $qry);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>boutique</title>
    <link rel="stylesheet" href="../links/css/all.min.css">
    <link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../links/bootstrap/js/bootstrap.min.js">
    <!-- <link rel="stylesheet" href="x/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/regular.min.css" integrity="sha512-EbT6icebNlvxlD4ECiLvPOVBD0uQdt4pHRg8Gpkfirdu9W8l2rtRZO8rThjqeIK08ubcFeiFKHbek7y+lEbWIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <style>
        <?php include "../css/home.css" ?>.bgimg {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3));
            background-image: url("../img/sea.jpg");
            background-attachment: fixed;
            width: 100%;
            height: 800px;
            background-size: cover;
            object-fit: cover;
        }

        .card {
            position: relative;
            overflow: hidden;
        }

        .card-img {
            object-fit: cover;
            width: 255px;
            height: 255px;
        }

        .card .label {
            position: absolute;
            font-size: 12px;
            color: #fff;
            background-color: #416163;
            font-weight: 500;
            display: inline-block;
            text-transform: uppercase;
            padding: 1% 4%;
            left: 10px;
            top: 10px;
        }

        .product_item_text {
            text-align: center;
        }

        .product_item_text h6 a {
            font-size: 20px;
            color: #000;
        }

        .card .btn {
            background-color: #416163;
            color: #fff;
        }

        .card .btn:hover {
            background-color: #1f2d2e;
            color: #fff;
        }

        .product_item_text .rating {
            line-height: 18px;
            margin-bottom: 10px;
        }

        .product_item_text .rating i {
            color: #e3c01c;
            margin-right: -4px;
            font-size: 15px;
        }

        .product_price {
            font-weight: 600;
        }
    </style>
</head>

<body class="bg-light">
    <?php
    include "nav.php";
    ?>
    <div class="bgimg">
        <div class="container headtext">
            <h1>Our <br> Collection</h1>
            <hr class="bg-white w-25" style="height:2px;margin-right:20%;">
        </div>
    </div>
    <!-- welcome to stor -->
    <div class="shop">
        <div class="wlcmstore">
            <h1>Welcome to Store</h1>
            <hr>
            <!-- <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisicing elit asperiores similique velit ullam.<br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. </p> -->
            <div class="row2">
                <div class="col3">
                    <i class="fas fa-phone-volume"></i>
                </div>
                <div class="col3">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <div class="col3">
                    <i class="fas fa-shuttle-van"></i>
                </div>
            </div>
            <div class="row3">
                <!-- row3  -->
                <div class="col5">

                    <p><big>24 X 7 FREE SUPPORT</big><br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="col5">

                    <p><big>MONEY BACK GUARANTEE</big> <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="col5">

                    <p><big>FREE WORLDWIDE SHIPPING </big> <br><br> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>

        <!-- new arrivals  -->
        <div class="newarrival">
            <h1>New Arrivals</h1>
            <hr><br>
            <p>Always the latest and most special products</p>
            <div class="row2">
                <!-- row1 -->
                <div class="col3">
                    <img src="../img/i5.jpg">
                </div>
                <div class="col3">
                    <img src="../img/i3.jpg">
                </div>
                <div class="col3">
                    <img src="../img/i11.jpg">
                </div>
            </div>
            <div class="row3">
                <div class="col4">
                    <p>Leather Shop Bag <br><br> from $39.00</p>

                </div>

                <div class="col4">
                    <p>Leather Shop Bag <br><br> from $49.00</p>
                </div>
                <div class="col4">
                    <p>Leather Shop Bag <br><br> from $50.00</p>
                </div>
            </div>
        </div>
        <!-- -------------------   SHOPING PART --------------- -->

        <div class="bestselling">
            <div class="container text-center">
                <h1>Best sellers</h1>
                <hr class="mb-3">

                <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p> -->
                <div class="row">

                    <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block m-auto">
                        <form action="insert_cart.php" method="POST">
                            <div class="card border-0">
                                <img src="../img/w3.webp" class="card-img img-fluid">
                                <div class="label new">New</div>
                                <a href="order.html" style="text-decoration: none; color: #416163;">
                                    <div class="card-body">
                                        <div class="product_item_text">
                                            <h6><a href="#">Blazer Tweed Buttons</a></h6>

                                            <div class="product_price">Rs.500</div>
                                        </div>
                                        <input type="hidden" name="proname" value="blazer2">
                                        <input type="hidden" name="price" value="500">
                                        <input type="number" name="quantity" value="1" placeholder="Quantity">
                                        <button class="btn btn-info w-100 mt-3" type="submit" name="adding_cart">Add to cart</button>

                                    </div>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block m-auto">
                        <form action="insert_cart.php" method="POST">

                            <div class="card border-0">
                                <img src="../img/w2.webp" class="card-img img-fluid">
                                <div class="label new">New</div>
                                <a href="order.html" style="text-decoration: none; color: #416163;">
                                    <div class="card-body">
                                        <div class="product_item_text">
                                            <h6><a href="#">Blazer Tweed Buttons</a></h6>

                                            <div class="product_price">Rs.800</div>
                                        </div>
                                        <input type="hidden" name="proname" value="blazer3">
                                        <input type="hidden" name="price" value="800">
                                        <input type="number" name="quantity" value="1" placeholder="Quantity">
                                        <button class="btn btn-info w-100 mt-3" type="submit" name="adding_cart">Add to cart</button>
                                    </div>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block m-auto">
                        <form action="insert_cart.php" method="POST">
                            <div class="card border-0">
                                <img src="../img/w1.webp" class="card-img img-fluid">
                                <div class="label new">New</div>
                                <a href="order.html" style="text-decoration: none; color: #416163;">
                                    <div class="card-body">
                                        <div class="product_item_text">
                                            <h6><a href="#">Blazer Tweed Buttons</a></h6>

                                            <div class="product_price">Rs.400</div>
                                        </div>
                                        <input type="hidden" name="proname" value="blazer4">
                                        <input type="hidden" name="price" value="400">
                                        <input type="number" name="quantity" value="1" placeholder="Quantity">
                                        <button class="btn btn-info w-100 mt-3" type="submit" name="adding_cart">Add to cart</button>
                                    </div>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block m-auto">
                        <form method="POST">
                            <div class="card border-0">
                                <img src="../img/w7.webp" class="card-img img-fluid">
                                <div class="label new">New</div>
                                <a href="order.html" style="text-decoration: none; color: #416163;">
                                    <div class="card-body">
                                        <div class="product_item_text">
                                            <h6><a href="#">Blazer Tweed Buttons</a></h6>

                                            <div class="product_price">Rs.300</div>
                                        </div>
                                        <input type="hidden" name="proname" value="blazer5">
                                        <input type="hidden" name="price" value="300">
                                        <input type="number" name="quantity" value="1" placeholder="Quantity">
                                        <button class="btn btn-info w-100 mt-3" type="submit" name="adding_cart">Add to cart</button>
                                    </div>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block m-auto">
                        <form method="POST">
                            <div class="card border-0">
                                <img src="../img/w4.webp" class="card-img img-fluid">
                                <div class="label new">New</div>
                                <a href="order.html" style="text-decoration: none; color: #416163;">
                                    <div class="card-body">
                                        <div class="product_item_text">
                                            <h6><a href="#">Blazer Tweed Buttons</a></h6>

                                            <div class="product_price">Rs.550</div>
                                        </div>
                                        <input type="hidden" name="proname" value="blazer9">
                                        <input type="hidden" name="price" value="550">
                                        <input type="number" name="quantity" value="1" placeholder="Quantity">
                                        <button class="btn btn-info w-100 mt-3" type="submit" name="adding_cart">Add to cart</button>
                                    </div>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block m-auto">
                        <form method="POST">
                            <div class="card border-0">
                                <img src="../img/w9.webp" class="card-img img-fluid">
                                <div class="label new">New</div>
                                <a href="order.html" style="text-decoration: none; color: #416163;">
                                    <div class="card-body">
                                        <div class="product_item_text">
                                            <h6><a href="#">Blazer Tweed Buttons</a></h6>

                                            <div class="product_price">Rs.880</div>
                                        </div>
                                        <input type="hidden" name="proname" value="blazer6">
                                        <input type="hidden" name="price" value="880">
                                        <input type="number" name="quantity" value="1" placeholder="Quantity">
                                        <button class="btn btn-info w-100 mt-3" type="submit" name="adding_cart">Add to cart</button>
                                    </div>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block m-auto">
                        <form method="POST">
                            <div class="card border-0">
                                <img src="../img/w11.webp" class="card-img img-fluid">
                                <div class="label new">New</div>
                                <a href="order.html" style="text-decoration: none; color: #416163;">
                                    <div class="card-body">
                                        <div class="product_item_text">
                                            <h6><a href="#">Blazer Tweed Buttons</a></h6>

                                            <div class="product_price">Rs.430</div>
                                        </div>
                                        <input type="hidden" name="proname" value="blazer7">
                                        <input type="hidden" name="price" value="430">
                                        <input type="number" name="quantity" value="1" placeholder="Quantity">
                                        <button class="btn btn-info w-100 mt-3" type="submit" name="adding_cart">Add to cart</button>
                                    </div>
                                </a>
                            </div>
                        </form>
                    </div>
                    <?php
                    while ($row = mysqli_fetch_assoc($qrychk)) {
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block">
                            <form action="insert_cart.php" method="POST">
                                <div class="card border-0">
                                    <img src="<?php echo $row['pimage']; ?>" class="card-img">
                                    <div class="label new">New</div>
                                    <a href="order.html" style="text-decoration: none; color: #416163;">
                                        <div class="card-body">
                                            <div class="product_item_text">
                                                <h6><a href="#"><?php echo $row['pname']; ?></a></h6>
                                                <div class="product_price">Rs.<?php echo $row['price']; ?></div>
                                            </div>
                                            <input type="hidden" name="proname" value="<?php echo $row['pname']; ?>">
                                            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                            <input type="number" name="quantity" value="1" placeholder="Quantity">
                                            <button class="btn w-100 mt-3" type="submit" name="adding_cart">Add to cart</button>
                                            <!-- <button class="btn btn-info btn1 text-white w-100 mt-3" type="submit" name="buy">Buy Now</button> -->
                                        </div>
                                    </a>
                                </div>
                            </form>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- </div> -->

                <div class="products mt-5">
                    <div class="container-fluid text-center">
                        <h1>Shop Categories</h1>
                        <hr>
                        <div class="row p-5">
                            <div class="col-lg-4 col-md-4 col-sm-10 col-12 d-block m-auto  p-5" style="background-color: #fae3d9;">
                                <h2>Leather Bags</h2>
                                <img src="../img/s1.webp" height="100px" width="150px">
                                <p>Lorem ipsum dolor sit amet consectetur<br> consectetur adipisicing elit.</p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-10 col-12 d-block m-auto  p-5" style="background-color: #f5ece8;">
                                <h2>Sunglasses</h2>
                                <img src="../img/s.webp" height="100px" width="150px">
                                <p>Lorem ipsum dolor sit amet consectetur<br> consectetur adipisicing elit.</p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-10 col-12 d-block m-auto  p-5" style="background-color:#fae3d9;">
                                <h2>Shoes</h2>
                                <img src="../img/s2.webp" height="100px" width="150px">
                                <p>Lorem ipsum dolor sit amet consectetur<br> consectetur adipisicing elit.</p>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="traditional">
                    <div class="container text-center">
                        <h1>Jacket</h1>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-10 d-block m-auto">
                                <form method="POST">
                                    <div class="card border-0">
                                        <img src="../img/j2.webp" class="card-img img-fluid">
                                        <div class="card-body">
                                            <div class="product_item_text">
                                                <h6><a href="#">Blazer Tweed Buttons</a></h6>
                                                <div class="product_price">Rs.800</div>
                                            </div>
                                            <input type="hidden" name="proname" value="Tweed">
                                            <input type="hidden" name="price" value="800">
                                            <input type="number" name="quantity" value="1" placeholder="Quantity">
                                            <button class="btn btn-info w-100 mt-3" type="submit" name="adding_cart">Add to cart</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-10 d-block m-auto">
                                <form method="POST">
                                    <div class="card border-0">
                                        <img src="../img/i6.jpg" class="card-img img-fluid">
                                        <div class="card-body">
                                            <div class="product_item_text">
                                                <h6><a href="#">Blazer Tweed Buttons</a></h6>
                                                <div class="product_price">Rs.650</div>
                                            </div>
                                            <input type="hidden" name="proname" value="Tweed1">
                                            <input type="hidden" name="price" value="650">
                                            <input type="number" name="quantity" value="1" placeholder="Quantity">
                                            <button class="btn btn-info w-100 mt-3" type="submit" name="adding_cart">Add to cart</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-10 d-block m-auto">
                                <form method="POST">
                                    <div class="card border-0">
                                        <img src="../img/j4.jpg" class="card-img img-fluid">
                                        <div class="card-body">
                                            <div class="product_item_text">
                                                <h6><a href="#">Blazer Tweed Buttons</a></h6>
                                                <div class="product_price">Rs.700</div>
                                            </div>
                                            <input type="hidden" name="proname" value="Tweed3">
                                            <input type="hidden" name="price" value="700">
                                            <input type="number" name="quantity" value="1" placeholder="Quantity">
                                            <button class="btn btn-info w-100 mt-3" type="submit" name="adding_cart">Add to cart</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-10 d-block m-auto">
                                <form method="POST">
                                    <div class="card border-0">
                                        <img src="../img/j5.jpg" class="card-img img-fluid">
                                        <div class="card-body">
                                            <div class="product_item_text">
                                                <h6><a href="#">Blazer Tweed Buttons</a></h6>
                                                <div class="product_price">Rs.950</div>
                                            </div>
                                            <input type="hidden" name="proname" value="Tweed5">
                                            <input type="hidden" name="price" value="950">
                                            <input type="number" name="quantity" value="1" placeholder="Quantity">
                                            <button class="btn btn-info w-100 mt-3" type="submit" name="adding_cart">Add to cart</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="p-3"></div>
            <div class="p-5 mt-5"></div>
            <div class="mt-5">
                <?php include "footer.php" ?>
            </div>


</body>

</html>