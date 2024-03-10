<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" />
  <title>MON FITNESS</title>
  <style>
    section {
      padding: 25px;
    }
    .image-container {
      position: relative;
      max-width: 60%;
      margin-bottom: 20px;
    }
    .image-container img {
      width: 100%; /* Make image responsive */
      border-radius: 20px; /* Optional: Add border radius for rounded corners */
    }
    .image-text {
      color: rgba(255, 217, 0, 0.788);
      font-size: 20px;
      text-align: right;
      letter-spacing: 2px;

    }

    p {
      font-size: 19px;
    }

    
    @media screen and (max-width: 375px) {
  /* Add your styles for screens up to 320px wide here */

  h2 {
    font-size: 22px;
  }
  
  p{
    font-size: 14px;
  }

  img{
  max-width: 250px;
  margin-left: 60px;

}

.image-text {
  margin-left: 19px;
}
    }
@media screen and (max-width: 425px) {
  /* Add your styles for screens up to 320px wide here */
  
  p{
    font-size: 15px;
  }

  img{
  max-width: 250px;
  margin-left: 60px;

}

.image-text {
  margin-left: 19px;
}
    }
@media screen and (max-width: 768px) {
  /* Add your styles for screens up to 320px wide here */
  p{
    font-size: 15px;
  }

  img{
  max-width: 250px;
  margin-left: 20px;

}

.image-text {
  margin-left: 19px;
}

    }
    @media screen and (max-width: 1024px) {
  /* Add your styles for screens up to 320px wide here */
  
  p{
    font-size: 0.5em;
  }

  img{
  max-width: 250px;
  margin-left: 20px;

}

    }

    
  </style>
</head>
<body>
  <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-secondary fixed-top">
    <div class="container">
        <!-- logo -->
        <a class="navbar-brand" href="index.php">MON FITNESS</a>
        <!--Toggle Btn-->
        <button class="navbar-toggler shawdow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--Side bar-->
        <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <!-- Sidebar Header-->
            <div class="offcanvas-header text-center text-black border-bottom">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MON FITNESS GYM</h5>
                <button type="button" class="btn-close btn-close-white shawdow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <!--Sidebar Body-->
            <div class="offcanvas-body d-flex-column p-4">
                <ul class="navbar-nav justify-content-end-center align-items-center fs-10 flex-grow-1 pe-3">
                    <li class="nav-item mx-2">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <!-- Login / Sign up / Logout -->
                <div class="d-flex justify-content-center align-items-center gap-3">
                    <?php if (isset($_SESSION['email'])): ?>
                        <a href="logout.php" class="text-white text-decoration-none px-3 py-1 rounded-4" style="background-color: black;">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="text-black">Login</a>
                        <a href="signup.php" class="text-black text-decoration-none px-3 py-1 rounded-4" style="background-color: gold;">Signup</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>

  
  <section class="w-100 vh-100 d-flex flex-column justify-content-center align-items-center text-white fs-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <h2 style="font-size: 1em">Welcome to Mon Fitness Coaching</h2> <br>
          <p>Get in shape with our professional coaching services.
          <p>Whether you're looking to build muscle, lose weight, or improve your 
          <p>overall fitness, our experienced trainers are here to help you achieve 
          <p>your goals. Contact us today to schedule a consultation!</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="image-container">
            <img src="indexpicture.jpg" alt="Description of your image">
            <div class="image-text">Michael Genato</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <footer style="background-color: rgba(255, 255, 255, 0.788);">
    <div class="container">
      <p>&copy; 2024 Gym Coaching. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
