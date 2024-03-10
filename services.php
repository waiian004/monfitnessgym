<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['email']);

// Include any other necessary files or configurations here

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
        <style>

        .service {
          background-color: #8080806e;
          padding: 90px;
          border-radius: 10px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          margin-bottom: 20px;
          font-size: 35px;
          padding: 30px;
          margin-bottom: 20px;
        }
    
        /* Add styles for the images to display side by side */
        .service .class-images {
          text-align: center; /* Center the images */
        }
    
        .service img {
          display: block;
          margin: 10px auto; /* Center the images */
          max-width: 80%; /* Ensure images don't exceed container width */
          border-radius: 10px;
        }

        section {
      height: 100vh; /* Set the height to fill the viewport */
      overflow-y: auto; /* Enable vertical scrolling if needed */
      padding-top: 130px; /* Added padding to give space for navbar */
    }
    

    /* SERVICE RESPONSIVENESS */

    @media screen and (max-width: 320px) {
  .container {
    width: 100%;
    padding: 5px;
  }

  .service {
    width: 100%; /* Set the width to 100% */
    padding: 30px; /* Adjust the padding */
    margin-bottom: 20px;
    font-size: 15px;
  }

  .service img {
    max-width: 100%; /* Ensure images fit within the container */
  }

  h2 {
    font-size: 15px;
  }

  p {
    font-size: 11px;
  }
}


@media screen and (max-width: 375px) {
  /* Add your styles for screens up to 320px wide here */
  .container {
    width: 100%;
    padding: 5px;
    
  }

  .service {
      width: 130%; /* Make images fill the container width */
      height: auto; /* Preserve aspect ratio */
      margin-left: -45px;
    }

    .service img {
    max-width: 100%; /* Ensure images fit within the container */
  }
  
  h2 {
    font-size: 19px
  }
  
  p{
    font-size: 15px;
  }
}

@media screen and (max-width: 425px) {
  /* Add your styles for screens up to 320px wide here */
  .container {
    width:100%;
    padding: 5px;
    
  }

  .service {
      width: 125%; /* Make images fill the container width */
      height: auto; /* Preserve aspect ratio */
      margin-left: -41px;
    }
  
    .service img {
    max-width: 100%; /* Ensure images fit within the container */
  }
  
  h2 {
    font-size: 24px
  }
  
  p{
    font-size: 15px;
  }
}

    
      </style>
    <title>MON FITNESS</title>
  </head>
  <body class="vh-100 overflow-hidden">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-body-secondary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">MON FITNESS</a>
            <button class="navbar-toggler shawdow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header text-center text-black border-bottom">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MON FITNESS GYM</h5>
                <button type="button" class="btn-close btn-close-white shawdow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
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
                        <?php if ($isLoggedIn): ?>
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

<section>
<div class="container">
      <div class="service">
        <h2>Personal Training</h2>
        <p>Our certified personal trainers will work with you one-on-one to create a customized workout plan tailored to your goals and fitness level.</p>
        <img src="service.jpg" alt="Personal Training Image" height="auto">
      </div>

      <div class="service">
        <h2>Group Classes</h2>
        <p>Join our group fitness classes for a fun and motivating workout experience. We offer a variety of classes including yoga, Zumba, and HIIT.</p>
        <img src="service1.jpg" alt="Group Classes Image">
      </div>
      
      <div class="service">
        <h2>Nutritional Counseling</h2>
        <p>Our nutritionists will provide you with personalized guidance and support to help you develop healthy eating habits and achieve your weight loss or muscle gain goals.</p>
        <img src="nutrition.jpg" alt="Nutritional Counseling Image">
      </div>
    </div>
  
    
  </section>
  <footer style="background-color: rgba(255, 255, 255, 0.788);">
    <p>&copy; 2024 Gym Coaching. All rights reserved.</p>
  </footer>
</body>
</html>
