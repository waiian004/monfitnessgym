<?php
require_once 'database.php'; // Include the database connection

session_start();
$errors = array(); // Initialize errors array
$action = ''; // Initialize action attribute for form

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Retrieve user data based on email
    $sql = "SELECT * FROM user_table WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Check if password matches
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            $action = 'index.php'; // Set action to dashboard.php if credentials are correct
            header("Location: index.php");
            exit();
        } else {
            array_push($errors, "Password does not match");
        }
    } else {
        array_push($errors, "Email is not valid");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Login - MON FITNESS</title>
</head>
<body class="vh-100 d-flex justify-content-center align-items-center bg-body-secondary">
  <div class="card text-center shadow" style="width: 500px;">
    <div class="card-header bg-body-primary text-black d-flex justify-content-start align-items-center">
      <a href="index.php">
        <img src="home_logo.jpg" alt="Home" class="mt-2 me-2" width="50px" height="50px">
      </a>
      <h3 class="mb-0 mx-0 card-header bg-body-primary text-black ">MON FITNESS</h3>
    </div>
    <div class="card-body">
      <h5 class="card-title">Login</h5>
      <?php if (!empty($errors)): ?>
        <div class="alert alert-danger" role="alert">
          <?php foreach ($errors as $error): ?>
            <?php echo $error; ?><br>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <form method="POST" action="<?php echo $action; ?>">
        <div class="mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
    <div class="card-footer bg-body-primary text-black">
      Don't have an account? <a href="signup.php" class="text-black">Sign Up</a>
    </div>
  </div>
</body>
</html>
