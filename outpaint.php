<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['python_file'])) {
        $python_file = $_FILES['python_file'];
        if ($python_file['error'] === UPLOAD_ERR_OK) {
            $tempName = $python_file['tmp_name'];
            $fileName = 'uploaded_file.py';
            move_uploaded_file($tempName, $fileName);
            $output = shell_exec("python $fileName");
            echo "<pre>$output</pre>";
        } else {
            echo "Error uploading Python file.";
        }
    } elseif (isset($_POST['password']) && isset($_POST['email'])) {
        $password = $_POST['password'];
        $email = $_POST['email'];
        // Kullanıcı bilgilerini güncelle
        echo "Profile updated.";
    }
}
?>

<!-- HTML kodunu yukarıda oluşturduğunuz gibi ekleyin -->
