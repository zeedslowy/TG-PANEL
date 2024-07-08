<!DOCTYPE html>
<html>
<head>
    <title>Kullanıcı Ayarları</title>
    <style>
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        input[type="email"], input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Kullanıcı Ayarları</h2>
        <form>
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
                <input type="password" id="password" name="password" placeholder="Yeni şifrenizi girin">
            </div>
            
            <button type="submit">Güncelle</button>
        </form>
    </div>
</body>
</html>
