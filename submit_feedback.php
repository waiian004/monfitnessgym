<?php
// Check if the user is logged in
session_start();
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to the login page or show a message
    header("Location: login.php");
    exit();
}

// Include your database connection code here
// Example:
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "genato_db";

// Create connection
$conn = new mysqli($hostName, $dbUser, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_SESSION['email']; // Assuming you want to use the logged-in user's email
$subject = $_POST['subject'];
$message = $_POST['message'];

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO feedback (email, subject, message) VALUES (?, ?, ?)");

if (!$stmt) {
    die("Error: " . $conn->error);
}

$stmt->bind_param("sss", $email, $subject, $message);

// Execute SQL statement
if ($stmt->execute()) {
    // Feedback submitted successfully
    echo "Feedback submitted successfully!";
} else {
    // Error submitting feedback
    echo "Error: " . $conn->error;
}

// Close prepared statement and database connection
$stmt->close();
$conn->close();
?>
