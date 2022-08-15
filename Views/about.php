<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/shop.css">
    <link rel="stylesheet" href="../links/css/all.css">
    <link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../links/bootstrap/js/bootstrap.min.js">
    <style>
        .card-img {
            object-fit: cover;
            width: 250px;
            height: 350px;
        }

        .bgimg {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url("about.jpg");
            background-attachment: fixed;
            width: 100%;
            height: 700px;
            background-size: cover;
            object-fit: cover;
            backdrop-filter: blur(0.5);
        }
    </style>
</head>

<body>
    <!-- logo and navigation -->
    <?php

    include "nav.php";
    ?>

    <div class="bgimg mt-5 p-5" data-aos="zoom-in" data-aos-duration="1500">
        <div class="container-fluid headtext p-5 mt-5">

            <head class="row justify-content-center">
                <div class="col-12 text-center mt-5 p-5">
                    <h1 style="font-size:100px ;" data-aos="zoom-in" data-aos-duration="2000">About us</h1>
                    <hr class="bg-white " style="margin-left:37%;width:26%;height: 2px;">
                    <!-- <p style="color:#fff;font-size:20px;" class="p-3">Lorem ipsum dolor sit amet consectetur consectetur adipisicing elit <br>dolor sit amet consectetur consectetur adipisicing elit.</p> -->
                </div>
            </head>
        </div>
    </div>

    <section class="container-fluid p-5 mt-5">
        <div class="row">
            <div class="col-lg-6 text-center" data-aos="fade-right" data-aos-duration="1500">
                <img src="../img/center2.jpg" alt="" width="550px">
            </div>
            <div class="col-lg-6 align-self-center" data-aos="fade-left" data-aos-duration="1500">
                <h1 style="color:#416163;">Who We Are ?</h1>
                <h5 class="p-1 mt-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum minus sed architecto tempora excepturi veniam non ut impedit, dolores nulla beatae quisquam facilis hic porro magni doloremque error placeat neque.</h5>
                <h6 class="p-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum minus sed architecto tempora excepturi veniam non ut impedit, dolores nulla</h6>
                <h6 class="p-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum minus sed architecto tempora excepturi veniam non ut impedit, dolores nulla</h6>
            </div>
        </div>
    </section>
    <section class="team">
        <div class="container text-center">
            <h2 style="color: #416163;">Our Team</h2>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block m-auto" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="card border-0">
                        <img src="../img/o1.jpg" class="card-img ">
                        <div class="card-body" style="font-size:20px;">
                            <span>John Archand</span>
                            <div style="color:#416163;">Owner</div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block m-auto" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="card border-0">
                        <img src="../img/o2.jpg" class="card-img ">
                        <div class="card-body" style="font-size:20px;">
                            <span>Miara Garland</span>
                            <div style="color:#416163;">Manager</div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-10 col-12 d-block m-auto" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="card border-0">
                        <img src="../img/o3.jpg" class="card-img ">
                        <div class="card-body" style="font-size:20px;">
                            <span>Femina Mehra</span>
                            <div style="color:#416163;">Designer</div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div class="p-3"></div>
    <?php include "footer.php" ?>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
            <script>
                AOS.init();
            </script>
</body>

</html>