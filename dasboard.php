<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }
        
        .sidebar {
            width: 20%;
            background-color: #111;
            padding: 20px;
            border-radius: 5px;
        }
        
        .sidebar h2 {
            margin-top: 0;
        }
        
        .main-content {
            width: 75%;
            background-color: #111;
            padding: 20px;
            border-radius: 5px;
        }
        
        .main-content h1 {
            margin-top: 0;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
        }
        
        input, textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            background-color: #222;
            color: #fff;
            border-radius: 3px;
        }
        
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Ayarlar</h2>
            <p>Kullanıcı Adı: <?php echo $user['username']; ?></p>
            
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SCRIPT"]);?>">
                <label for="telegram_bot_token">Telegram Bot Token:</label>
                <input type="text" name="telegram_bot_token" id="telegram_bot_token" value="<?php echo $user['telegram_bot_token'];?>">
                
                <label for="telegram_chat_id">Telegram Chat ID:</label>
                <input type="text" name="telegram_chat_id" id="telegram_chat_id" value="<?php echo $user['telegram_chat_id'];?>">
                
                <button type="submit" name="submit">Güncelle</button>
            </form>
        </div>
        
        <div class="main-content">
            <h1>Python Telegram Bot Altyapısı</h1>
            
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SCRIPT"]);?>" enctype="multipart/form-data">
                <label for="bot_script">Python Bot Dosyası:</label>
                <input type="file" name="bot_script" id="bot_script">
                
                <button type="submit" name="submit">Yükle</button>
            </form>
        </div>
    </div>
</body>
</html>
