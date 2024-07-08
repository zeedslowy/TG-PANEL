<?php
// Include the necessary libraries
require_once 'vendor/autoload.php';
require_once '../config/database.php';

use Anthropic\LanguageModel\ChatModel;

// Initialize the chat model
$model = new ChatModel('your_api_key_here');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input from the form
    $userMessage = $_POST["message"];

    // Generate a response from the chat model
    $botResponse = $model->generateResponse($userMessage);

    // Save the conversation to the database
    $sql = "INSERT INTO conversations (user_message, bot_response, created_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $userMessage, $botResponse);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bot 3</title>
    <style>
        .chat-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f4f4f4;
        }
        .chat-box {
            height: 300px;
            overflow-y: scroll;
            margin-bottom: 20px;
        }
        .user-message, .bot-message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
        }
        .user-message {
            background-color: #d1ecf1;
            text-align: right;
        }
        .bot-message {
            background-color: #e2e3e5;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <h1>Bot 3</h1>
        <div class="chat-box">
            <?php
            // Fetch the conversation history from the database
            $sql = "SELECT user_message, bot_response, created_at FROM conversations ORDER BY id DESC LIMIT 10";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='user-message'>" . $row["user_message"] . "</div>";
                    echo "<div class='bot-message'>" . $row["bot_response"] . "</div>";
                }
            } else {
                echo "No conversation history found.";
            }
            ?>
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" name="message" placeholder="Type your message..." required>
            <input type="submit" name="submit" value="Send">
        </form>
    </div>
</body>
</html>
