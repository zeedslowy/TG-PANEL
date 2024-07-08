<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TG-PANEL Dashboard</title>
  <style>
    /* Reset styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #222;
      color: #fff;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 40px;
    }

    .sidebar {
      background-color: #333;
      padding: 20px;
      border-radius: 5px;
      width: 200px;
      float: left;
    }

    .sidebar h2 {
      margin-bottom: 20px;
    }

    .sidebar ul {
      list-style-type: none;
    }

    .sidebar li {
      margin-bottom: 10px;
    }

    .sidebar a {
      color: #fff;
      text-decoration: none;
    }

    .sidebar a:hover {
      color: #ccc;
    }

    .main-content {
      margin-left: 220px;
      padding: 20px;
      background-color: #333;
      border-radius: 5px;
    }

    .file-upload {
      margin-top: 20px;
    }

    .file-upload label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    .file-upload input[type="file"] {
      display: block;
      width: 100%;
      padding: 8px;
      background-color: #444;
      border: none;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="sidebar">
      <h2>Settings</h2>
      <ul>
        <li><a href="#" onclick="showProfilePage()">Profile</a></li>
        <li><a href="#">Password</a></li>
        <li><a href="#">Notifications</a></li>
      </ul>
    </div>

    <div class="main-content">
      <h1>TG-PANEL Dashboard</h1>

      <div class="file-upload">
        <label for="file-input">Upload a File:</label>
        <input type="file" id="file-input" name="file-input">
      </div>

      <div class="profile-page" style="display: none;">
        <h2>Profile Settings</h2>
        <!-- Profil ayarları için gereken alanlar -->
      </div>
    </div>
  </div>

  <script>
    function showProfilePage() {
      document.querySelector('.profile-page').style.display = 'block';
    }
  </script>
</body>
</html>
