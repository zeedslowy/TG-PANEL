<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Kullanıcı profil işlemleri
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];
    $userId = $_SESSION['user_id'];

    // Güncelleme sorgusu
    $updateQuery = "UPDATE users SET username = '$newUsername', email = '$newEmail', password = '$newPassword' WHERE id = $userId";
    if ($conn->query($updateQuery) === TRUE) {
        echo "Profil bilgileri başarıyla güncellendi.";
    } else {
        echo "Hata: " . $conn->error;
    }
}

// Kullanıcı bilgilerini al
$userId = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $userId";
$result = $conn->query($query);
$user = $result->fetch_assoc();
?>

<!-- HTML Formu -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SCRIPT"]);?>">
    Kullanıcı Adı: <input type="text" name="username" value="<?php echo $user['username'];?>">
    E-posta: <input type="email" name="email" value="<?php echo $user['email'];?>">
    Şifre: <input type="password" name="password" value="<?php echo $user['password'];?>">
    <input type="submit" name="submit" value="Güncelle">
</form>
