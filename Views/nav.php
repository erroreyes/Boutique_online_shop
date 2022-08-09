<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>boutique</title>
  <link rel="stylesheet" href="../css/head.css">
  <link rel="stylesheet" href="../links/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../links/bootstrap/css/bootstrap.min.css">
  <style>
    .backimg {
      background-color: #fff;
      color: #416163;
    }
  </style>
</head>
<body>
  <?php
  // session_start();
  $count=0;
  if (isset($_SESSION['cart'])) {
    $count=count($_SESSION['cart']);
  }
  ?>
<section>
  <nav class="navbar navbar-expand-lg  backimg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="../img/logo1.png" width="200px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id=" navbarNav">
        <ul class="navbar-nav ml-5  mb-2 mb-lg-0">
          <li><a href="home.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="signUp.php">Sign Up</a></li>
          <li class="dropdown">
            <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Sign In
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a href="User.php" class="dropddown-item">User</a></li>
              <li><a href="Admin.php" class="dropddown-item">Admin</a></a></li>
            </ul>
          </li>
          <li>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i><?php echo $count;?></a></li>
        </ul>
      </div>
    </div>
  </nav>
</section>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
</html>
