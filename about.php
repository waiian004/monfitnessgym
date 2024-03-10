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

    .about-content {
      background-color: #8080806e;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      font-size: 35px;
    }

    .about-header {
      background-color: #8080806e;
      padding: 40px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .team-member {
      text-align: center;
      margin-bottom: 20px;
    }

    .team-member img {
      width: 200px;
      height: 200px;
      object-fit: cover;
      border-radius: 50%;
    }

    .scrollable-content {
      min-height: calc(100vh - 56px); /* Adjusted height to accommodate the navbar */
      overflow-y: auto;
      padding-top: 100px; /* Added padding to give space for navbar */
      height: calc(100vh - 56px); /* Adjusted height to accommodate the navbar */
      overflow-y: auto;
      padding-top: 800px; /* Added padding to give space for navbar */
    }

    section {
      height: 100vh; /* Set the height to fill the viewport */
      overflow-y: auto; /* Enable vertical scrolling if needed */
      padding-top: 130px; /* Added padding to give space for navbar */
    }

    /* ABOUT RESPONSIVENESS */

    @media screen and (max-width: 320px) {
  /* Add your styles for screens up to 320px wide here */
  .container {
    width: 110%;
    padding: 5px;
    
  }

  .service {
      width: 120%; /* Make images fill the container width */
      height: auto; /* Preserve aspect ratio */
      margin-left: -35px;
    }
  
  h2 {
    font-size: 15px
  }
  
  p{
    font-size: 11px;
  }
}

@media screen and (max-width: 375px) {
  /* Add your styles for screens up to 320px wide here */
  .container {
    width: 100%;
    padding: 5px;
    
  }

  .about-content {
      width: 125%; /* Make images fill the container width */
      height: auto; /* Preserve aspect ratio */
      margin-left: -45px;
    }
  
  h2 {
    font-size: 18px
  }
  
  p{
    font-size: 10px;
  }
}

@media screen and (max-width: 425px) {
  /* Add your styles for screens up to 320px wide here */
  .container {
    width: 100%;
    padding: 5px;
    
  }

  .about-content {
      width: 125%; /* Make images fill the container width */
      height: auto; /* Preserve aspect ratio */
      margin-left: -42px;
    }
  
  h2 {
    font-size: 25px
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
      <div class="about-content">
        <h2>About Us</h2>
        <p>At MON FITNESS GYM, we're passionate about helping individuals of all fitness levels achieve their health and wellness goals. With a team of dedicated trainers and state-of-the-art facilities, we're committed to providing personalized coaching and support to every member of our community.</p>
      </div>

      <div class="about-content">
        <h2>Our Mission</h2>
        <p>Our mission is to empower individuals to lead healthier, more active lifestyles by providing expert guidance, motivation, and support at every step of their fitness journey. We believe that through proper coaching, education, and encouragement, anyone can unlock their full potential and achieve lasting results.</p>
      </div>

      <div class="about-content">
        <h2>Meet Our Team</h2>
        <div class="row">
          <div class="col-sm-4">
            <div class="team-member">
              <img src="meh.jpg" alt="Team Member 1">
              <p>Mikhael Genato<br>Certified Personal Trainer</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="team-member">
              <img src="coacharnel.jpg" alt="Team Member 2">
              <p>Arnel Morron<br>Yoga Instructor</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="team-member">
              <img src="mark.jpg" alt="Team Member 3">
              <p>Mark Ramos<br>Nutritionist</p>
            </div>
          </div>
        </div>
      </div>

      <div class="about-content">
        <h2>Join Our Community</h2>
        <p>Whether you're a seasoned athlete or new to fitness, MON FITNESS GYM welcomes you to join our community and embark on a journey to better health and wellness. Contact us today to schedule a consultation and take the first step toward achieving your fitness goals!</p>
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

