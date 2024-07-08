<?php
// Include the database connection file
require_once '../config/database.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input from the form
    $userMessage = $_POST["message"];

    // Prepare the SQL query to fetch the last 5 messages from the database
    $sql = "SELECT * FROM messages ORDER BY id DESC LIMIT 5";
    $result = $conn->query($sql);

    // Generate a response based on the user's message
    $botResponse = "I'm sorry, I didn't understand your message. Can you please rephrase it?";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if (strpos(strtolower($row["message"]), strtolower($userMessage)) !== false) {
                $botResponse = "I understand your message. Here are the last 5 messages in the database:";
                break;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bot 2</title>
</head>
<body>
    <h1>Bot 2</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Message: <input type="text" name="message">
        <input type="submit" name="submit" value="Submit">
    </form>
    <br>
    <?php
    if (isset($botResponse)) {
        echo $botResponse . "<br>";
        if ($result->num_rows > 0) {
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
                echo "<li>" . $row["message"] . " - " . $row["created_at"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No messages found in the database.";
        }
    }
    ?>
</body>
</html>
