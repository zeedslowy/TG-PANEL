-- users tablosu
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  email VARCHAR(120) NOT NULL UNIQUE,
  password VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Örnek kullanıcı eklemesi
INSERT INTO users (username, email, password) VALUES
  ('johndoe', 'johndoe@example.com', 'password123'),
  ('janesmith', 'janesmith@example.com', 'password456'),
  ('bobwilliams', 'bobwilliams@example.com', 'password789');

-- products tablosu
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  description TEXT,
  price DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

