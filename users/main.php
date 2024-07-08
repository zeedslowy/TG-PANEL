<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Ayarları</title>
    <style>
        /* Önceki CSS kuralları */
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Kullanıcı Ayarları</h2>
        <?php
        // Veritabanı bağlantısı ve ayarları
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database_name";

        // Bağlantı oluşturma
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Bağlantıyı kontrol etme
        if ($conn->connect_error) {
            die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
        }

        // Form gönderimi işleme
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Veri ekleme sorgusu
            $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "Kullanıcı bilgileri başarıyla kaydedildi.";
            } else {
                echo "Hata: " . $sql . "<br>" . $conn->error;
            }
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="email">E-posta:</label>
                <input type="email" id="email" name="email" placeholder="E-posta adresinizi girin">
            </div>
            <div class="form-group">
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" id="username" name="username" placeholder="Kullanıcı adınızı girin">
            </div>
            <div class="form-group">
                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password" placeholder="Şifrenizi girin">
            </div>
            <button type="submit">Güncelle</button>
        </form>
    </div>
</body>
</html>
