<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/shop.css">
    <link rel="stylesheet" href="../links/css/all.css">
    <link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../links/bootstrap/js/bootstrap.min.js">
</head>

<body>
    <!-- logo and navigation -->
    <?php
        include "nav.html";
    ?>
    <!--    header -->
    <section class="related p-5">
        <div class="container text-center">
            <div class="row p-5">
                <div class="col-lg-6 d-block m-auto text-left">
                    <img src="img/w6.webp" width="400px" height="400px">
                </div>
                <div class="col-lg-6 d-block m-auto text-left">
                    <h1 class="p-1">White Printd Shirt by HRN</h1>
                    <h5 class="p-2">Rs.450</h5>
                    <select class="p-1">
                        <option value="Select Size">Select Size</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select><br><br>
                    <input type="text" placeholder="How many.." >
                    <button id="btn">Add To Cart</button><br><br>
                    <h4>Product Details</h4>
                    <p >Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque magni repudiandae, illo aliquam ut quos, a reiciendis ratione mollitia voluptatibus impedit libero quis perferendis officia reprehenderit debitis. Cumque, beatae assumenda.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 d-block m-auto  text-left">
                    <h1>Related Products</h1>
                </div>
                <div class="col-lg-6 d-block m-auto text-right">
                   <h5> <a href="shop.html">View More</a></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block m-auto">
                    <div class="card">
                        <img src="img/w1.webp" class="card-img img-fluid">
                        <div class="card-body">
                            <h2 class="card-title">Classic jacket</h2>
                            <p class="card-text">Rs.450</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block m-auto">
                    <div class="card">
                        <img src="img/w2.webp" class="card-img img-fluid">
                        <div class="card-body">
                            <h2 class="card-title">Black Hoodie</h2>
                            <p class="card-text">Rs.450</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block m-auto">
                    <div class="card">
                        <img src="img/w3.webp" class="card-img img-fluid">
                        <div class="card-body">
                            <h2 class="card-title">Long Light Dress</h2>
                            <p class="card-text">Rs.450</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block m-auto">
                    <div class="card">
                        <img src="img/w11.webp" class="card-img img-fluid">
                        <div class="card-body">
                            <h2 class="card-title">Long Plated Jacket</h2>
                            <p class="card-text">Rs.450</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>

</html>