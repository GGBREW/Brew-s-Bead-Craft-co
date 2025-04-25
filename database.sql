-- create the database
CREATE DATABASE bead_market;

USE bead_market;

-- table to hold bag listings
CREATE TABLE bead_bags (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  description TEXT,
  price DECIMAL(8,2) NOT NULL,
  image_url VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- sample INSERT
INSERT INTO bead_bags (title, description, price, image_url)
VALUES 
 ('Ocean Blue Tote', 'Handmade ocean‑inspired bead tote.', 49.99, 'images/ocean_blue.jpg'),
 ('Sunset Clutch', 'Warm sunset tones with gold accents.', 39.50, 'images/sunset_clutch.jpg');
