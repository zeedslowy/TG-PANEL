<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php?error=notloggedin");
    exit();
}

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

// Get bot details from the database
$bot_id = 1; // This is the ID of the first bot
$sql = "SELECT * FROM bots WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $bot_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $bot_name = $row['name'];
    $bot_description = $row['description'];
    $bot_status = $row['status'];
    $bot_created_at = $row['created_at'];
} else {
    echo "No bot found.";
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bot 1 - Management Panel</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h1>Bot 1 - Management Panel</h1>
    <h2><?php echo $bot_name; ?></h2>
    <p><?php echo $bot_description; ?></p>
    <p>Status: <?php echo $bot_status; ?></p>
    <p>Created at: <?php echo $bot_created_at; ?></p>

    <h3>Bot Actions</h3>
    <button onclick="startBot()">Start</button>
    <button onclick="stopBot()">Stop</button>
    <button onclick="restartBot()">Restart</button>

    <script>
        function startBot() {
            // Add your JavaScript code to start the bot
            alert("Starting the bot...");
        }

        function stopBot() {
            // Add your JavaScript code to stop the bot
            alert("Stopping the bot...");
        }

        function restartBot() {
            // Add your JavaScript code to restart the bot
            alert("Restarting the bot...");
        }
    </script>
</body>
</html>
