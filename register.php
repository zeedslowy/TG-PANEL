<!DOCTYPE html>
<html>
<head>
    <title>Kayıt Ol</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        form {
            background-color: #333;
            padding: 20px;
            border-radius: 5px;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>KAYIT Ol</h1>
        <form action="register_submit.php" method="post">
            <label for="username">Kullanıcı Adı:</label>
            <input type="text" id="username" name="username" placeholder="Kullanıcı Adınızı Girin" required>
            <label for="email">E-posta:</label>
            <input type="text" id="email" name="email" placeholder="E-posta Adresinizi Girin" required>
            <label for="password">Şifre:</label>
            <input type="password" id="password" name="password" placeholder="Şifrenizi Girin" required>
            <label for="confirm_password">Şifre Doğrula:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Şifrenizi doğrulayın" required>
            <button type="submit">Kaydol</button>
        </form>
        <div class="message">
            <?php
                if(isset($_GET['error'])) {
                    echo "Kullanıcı adı veya e-posta zaten kayıtlı.";
                }
