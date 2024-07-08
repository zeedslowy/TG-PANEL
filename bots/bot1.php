<?php
// Include the database connection file
require_once '../config/database.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input from the form
    $message = $_POST["message"];

    // Prepare the SQL query to insert the message into the database
    $sql = "INSERT INTO messages (message, created_at) VALUES ('$message', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Message saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bot 1</title>
</head>
<body>
    <h1>Bot 1</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Message: <input type="text" name="message">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
