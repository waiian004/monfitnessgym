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
    <title>MON FITNESS</title>
    <style>

        .contact-form {
            background-color: #8080806e;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px; /* Adjusted padding */
            max-width: 550px;
            margin: 20px auto;
            max-height: 614px; /* Adjusted max-height */
            overflow-y: auto; /* Added overflow-y to enable scrolling if content exceeds max-height */
        }
        .contact-form label {
            display: block;
            margin-bottom: 10px;
        }
        .contact-form input, .contact-form textarea {
            width: calc(100% - 20px); /* Adjusted width */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .contact-form button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .contact-method {
            margin-top: 0px;
            text-align: right;
        }
        .contact-method img {
            width: 20px;
            height: 20px;
            margin-right: 10px; /* Adjusted margin */
        }
        #map-container {
            background-color: #8080806e;
            padding: 20px; /* Adjusted padding */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; /* Added margin */
        }
        #map-title {
            color: #333; /* Changed color */
            margin-bottom: .4em;
            font-weight: bold;
            font-size: 24px; /* Adjusted font size */
            text-align: center;
        }
        #map-container {
            background-color: #8080806e;
            padding: 20px; /* Adjusted padding */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto; /* Center the map container horizontally with a margin of 20px */
            width: 100%; /* Set width to 80% of the viewport */
        }
        #map-container iframe {
            width: 100%; /* Make the iframe width 100% of the map container */
            height: 508px; /* Adjusted height */
            border: none;
            border-radius: 5px;
        }
        /* Additional style to ensure proper layout */
        #contact {
            margin-bottom: 20px; /* Add margin to separate sections */
        }
        section {
            height: 100vh; /* Set the height to fill the viewport */
            overflow-y: auto; /* Enable vertical scrolling if needed */
            padding-top: 130px; /* Added padding to give space for navbar */
        }


        @media screen and (max-width: 375px) {
        /* Add your styles for screens up to 320px wide here */
        .container {
            width: 131%;
            padding: 5px;
            margin-left: -40px;
    
            }
            
            .navbar-brand{
            margin-left: 45px;
            }
  
            h2 {
                font-size: 18px
            }
  
            p{
                font-size: 10px;
            }

        }

        @media (min-width: 576px) {
            .contact-form {
                max-width: 550px;
            }
            .contact-form button {
                width: auto;
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

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="map-container">
                        <h1 class="text-center fs-4">Location Map | Papawis Fitness Gym</h1>   
                        <iframe src="https://www.google.com/maps/embed?pb=!3m2!1sen!2sph!4v1709356036628!5m2!1sen!2sph!6m8!1m7!1szvUoH1g-uxnPAUuTI--TaA!2m2!1d14.73549213877092!2d121.065215715603!3f344.8019228899266!4f3.1094770320544995!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <h2 class="text-center fs-4 mb-4">Share Your Thoughts</h2>
                        <form id="feedbackForm" method="post">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                            <label for="subject">Subject:</label>
                            <input type="text" id="subject" name="subject" required>
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" rows="4" required></textarea>
                            <button type="submit">Submit</button>
                        </form>
                        <div class="contact-method">
                            <!-- Your contact methods here -->
                        </div>
                        <div id="feedbackNotification" style="display: none;" class="alert alert-success mt-3" role="alert">
                            Feedback submitted successfully!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <footer style="background-color: rgba(255, 255, 255, 0.788);">
        <p>&copy; 2024 Gym Coaching. All rights reserved.</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#feedbackForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            // Check if the user is logged in (you can replace this with your actual authentication check)
            var isLoggedIn = checkLoginStatus();

            if (!isLoggedIn) {
                // If the user is not logged in, display a message prompting them to sign up or log in
                $('#feedbackNotification').removeClass('alert-danger').addClass('alert-danger').text('You have to sign up or log in before submitting feedback').fadeIn();
                return;
            }

            // If the user is logged in, proceed with form submission
            var formData = $(this).serialize();
            var form = this;

            $.ajax({
                type: 'POST',
                url: 'submit_feedback.php',
                data: formData,
                success: function(response) {
                    $('#feedbackNotification').removeClass('alert-danger').addClass('alert-success').text('Feedback submitted successfully!').fadeIn();
                    form.reset();
                    setTimeout(function() {
                        $('#feedbackNotification').fadeOut();
                    }, 3000); // Fade out after 3 seconds
                },
                error: function(xhr, status, error) {
                    // Handle errors
                }
            });
        });
    });

    // Dummy function to check login status
    function checkLoginStatus() {
        // Replace this with your actual authentication check
        return true; // Return true if user is logged in, false otherwise
    }
</script>


</body>
</html>
