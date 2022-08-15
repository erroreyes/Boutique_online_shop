<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>product</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="../css/shop.css">
  <link rel="stylesheet" href="../links/css/all.css">
  <link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../links/bootstrap/js/bootstrap.min.js">
  <style>
    .contact-item {
      position: relative;
      padding-left: 55px;
      margin-bottom: 40px;
    }

    .contact-item .icon-box {
      position: absolute;
      height: 40px;
      width: 40px;
      background-color: #416163;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      left: 0;
      top: 0;
      color: #fff;
    }

    .sub-title {
      font-size: 32px;
      margin: 0 0 30px;
      font-weight: 600;
      color: #416163;
    }

    .form-title {
      color: #fff;
      font-size: 25px;
      margin: 10% 0 10% 0;
    }

    #btn-form {
      background-color: #f8e7e0;
      color: #416163;
      margin-top: 30px;
    }

    #box {
      background-color: #416163;
      padding: 0px 5% 40px 5%;
      margin-top: -2%;
      height: 500px;
      border-radius: 10px;
    }

    <?php include "../css/contact.css"; ?>
  </style>
</head>

<body>

  <!-- logo and navigation -->
  <?php
  include "nav.php";
  ?>

  <!-- <div class="bgimg">
    <div class="container-fluid headtext p-5">

      <head class="row">
        <div class="col-lg-6 text-left p-5">
          <h1>Contact us</h1>
          <hr class="bg-white w-25" style="height:2px;margin-right:20%;">
          <div class="text-left" style="color:#fff;font-size:20px;">Lorem ipsum dolor sit amet consectetur consectetur adipisicing elit <br>dolor sit amet consectetur consectetur adipisicing elit.</div>
        </div>
      </head>
    </div>
  </div> -->
  <div class="contact p-5 mt-5" style="background-color:#f8e7e0;height:800px">
    <div class="container-fluid text-center" data-aos="zoom-in" data-aos-duration="1500">
      <div class="row">
        <div class="col-lg-12" style="color:#416163;font-size:50px;">Contact us</div>
      </div>
      <div class="row">
        <div class="col-lg-12" style="color:#416163;font-size:20px;">Have any questions? We'd love to hear from
          you.</div>
      </div>
    </div>
    <br>
    <section class="container p-5 mt-5" id="contact">
      <div class="row">
        <div class="col-md-6" data-aos="fade-right" data-aos-duration="1500">
          <div class="section-title">
            <p class="sub-title">Get In Touch</p>
          </div>
          <div class="contact-items">
            <div class="contact-item">
              <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
              <h5>Address</h5>
              <p>46, Sargam Park Society , Aie Mata Road ,Surat </p>
            </div>
            <div class="contact-item">
              <div class="icon-box"><i class="fas fa-phone"></i></div>
              <h5>Phone</h5>
              <p>9909475301</p>
            </div>
            <div class="contact-item">
              <div class="icon-box"><i class="fas fa-envelope"></i></div>
              <h5>Email</h5>
              <p>Krisha2253@gmail.com</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 around-space" id="box" data-aos="fade-left" data-aos-duration="1500">
          <div class="contact-form box" >
            <h2 class="form-title">Leave a Message</h2>
            <form action="">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Phone">
              </div>
              <div class="form-group">
                <textarea class="form-control" placeholder="Message"></textarea>
              </div>
              <button type="submit" class="btn btn-lg btn-block btn-theme btn-form" id="btn-form">Send Message</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include "footer.php" ?>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
            <script>
                AOS.init();
            </script>
</body>

</html>