<?php
// Start the session
session_start();

// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validate form data
if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
    header("Location: register.php?error=emptyfields");
    exit();
}

if ($password !== $confirm_password) {
    header("Location: register.php?error=passwordmismatch");
    exit();
}

// Check if username or email already exists
$sql = "SELECT * FROM users WHERE username = ? OR email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("Location: register.php?error=usertaken");
    exit();
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert new user into the database
$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $hashed_password);

if ($stmt->execute()) {
    // Set session variables
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    // Redirect to the dashboard or any other page
    header("Location: dashboard.php");
    exit();
} else {
    header("Location: register.php?error=registrationfailed");
    exit();
}

$stmt->close();
$conn->close();
?>
