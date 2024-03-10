<?php
error_reporting(E_ALL); // Add this line to show any PHP errors

include('database.php'); // Include the database connection file

// Define variables and initialize with empty values
$lastname = $firstname = $blk = $lot = $street = $phasesub = $barangay = $country = $state = $city = $area_code = $contact_number = $email = $password = $confirm_password = "";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign form values to variables
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $blk = $conn->real_escape_string($_POST['blk']);
    $lot = $conn->real_escape_string($_POST['lot']);
    $street = $conn->real_escape_string($_POST['street']);
    $phasesub = $conn->real_escape_string($_POST['phasesub']);
    $barangay = $conn->real_escape_string($_POST['barangay']);
    $country = isset($_POST['country']) ? $conn->real_escape_string($_POST['country']) : '';
    $state = isset($_POST['state']) ? $conn->real_escape_string($_POST['state']) : '';
    $city = isset($_POST['city']) ? $conn->real_escape_string($_POST['city']) : '';
    $area_code = $conn->real_escape_string($_POST['area_code']);
    $contact_number = isset($_POST['contact_number']) ? $conn->real_escape_string($_POST['contact_number']) : '';
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);

    // Perform validation
    if (empty($lastname) || empty($firstname) || empty($blk) || empty($lot) || empty($street) || empty($phasesub) || empty($barangay) || empty($country) || empty($state) || empty($city) || empty($area_code) || empty($contact_number) || empty($email) || empty($password) || empty($confirm_password)) {
        array_push($errors, "All fields are required");
    }

    // Check if Email is not valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
    }

    // Check if password do not match
    if ($password !== $confirm_password) {
        array_push($errors, "Passwords do not match");
    }

    // Check if email already exists
    $sql = "SELECT * FROM user_table WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        array_push($errors, "Email already exists");
    }

    // Check if contact number already exists
    $sql = "SELECT * FROM user_table WHERE contact_number = '$contact_number'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        array_push($errors, "Contact number already exists");
}


    // If no errors, insert into database
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user_table (lastname, firstname, blk, lot, street, phasesub, barangay, country, state, city, area_code, contact_number, email, password)
                VALUES ('$lastname', '$firstname', '$blk', '$lot', '$street', '$phasesub', '$barangay', '$country', '$state', '$city', '$area_code', '$contact_number', '$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            // Redirect to login page
            header("Location: login.php");
            exit(); // Ensure that no other output is sent
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex justify-content-center align-items-center bg-body-secondary" style="min-height: 100vh;">
<div class="card text-center shadow" style="max-width: 600px; width: 100%;">
    <div class="card-header bg-body-primary text-black d-flex justify-content-start align-items-center">
        <!-- Header content -->
        <a href="index.php">
            <img src="home_logo.jpg" alt="Home" class="mt-2 me-2" width="50px" height="50px">
        </a>
        <h3 class="mb-0 mx-auto card-header bg-body-primary text-black ">MON FITNESS</h3>
    </div>
    <div class="card-body">
        <!-- Display errors -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <!-- Sign up form -->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- Form fields -->
            <div class="row mb-3">
                <div class="col">
                    <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo $lastname; ?>" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo $firstname; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" class="form-control" name="blk" placeholder="Blk" value="<?php echo $blk; ?>" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="lot" placeholder="Lot" value="<?php echo $lot; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" class="form-control" name="street" placeholder="Street" value="<?php echo $street; ?>" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="phasesub" placeholder="Phase/Subdivision" value="<?php echo $phasesub; ?>" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="barangay" placeholder="Barangay" value="<?php echo $barangay; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="select-option">
                        <select class="form-select country" aria-label="Default select example" onchange="loadStates()" name="country" required>
                            <option selected>Select Country</option>
                            <!-- Add options for countries here -->
                        </select>
                    </div>
                </div>
                <div class="col">
                    <select class="form-select state" aria-label="Default select example" onchange="loadCities()" name="state" required>
                        <option selected>Select State</option>
                        <!-- Add options for states here -->
                    </select>
                </div>
                <div class="col">
                    <select class="form-select city" aria-label="Default select example" name="city" required>
                        <option selected>Select City</option>
                        <!-- Add options for cities here -->
                        <option value="NONE">None</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Area Code</span>
                        <select class="form-select" id="areaCodeSelect" name="area_code" required>
                            <option value="">Select a Country</option>
                            <option value="263">Zimbabwe (+263)</option>
                            <!-- Add more options for different country codes -->
                        </select>
                        <input type="tel" class="form-control" name="contact_number" id="exampleInputContact"
                               placeholder="Contact #" value="<?php echo $contact_number; ?>" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" id="exampleInputEmail"
                       aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $email; ?>" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" id="exampleInputPassword"
                       placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="confirm_password" id="exampleInputConfirmPassword"
                       placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
    <div class="card-footer bg-body-primary text-black">
        Already have an account? <a href="login.php" class="text-black">Login</a>
    </div>
</div>

<script src="app.js"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


