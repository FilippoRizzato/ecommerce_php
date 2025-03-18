

USE ecommerce;

CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       email VARCHAR(255) NOT NULL UNIQUE,
                       password VARCHAR(255) NOT NULL
);

CREATE TABLE products (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(255) NOT NULL,
                          price DECIMAL(10, 2) NOT NULL,
                          stock INT NOT NULL,
                          sold INT DEFAULT 0,
                          image VARCHAR(255),
                          variants JSON
);

CREATE TABLE cart (
                      id INT AUTO_INCREMENT PRIMARY KEY,
                      user_id INT,
                      product_id INT,
                      quantity INT DEFAULT 1,
                      FOREIGN KEY (user_id) REFERENCES users(id),
                      FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, price, stock, image) VALUES
                                                     ('DAMN. - Kendrick Lamar', 44.99, 10, 'https://www.disclan.com/150738-home_default/damn-lamar-kendrick-lp.jpg'),
                                                     ('All Eyez On Me - 2Pac', 34.99, 15, 'https://www.disclan.com/160944-home_default/all-eyez-on-me-2pac-lp.jpg'),
                                                     ('Effigy - Lamb As', 24.99, 20, 'https://www.disclan.com/162611-home_default/lamb-as-effigy-.jpg'),
                                                     ('Madra - Indie Exclusive', 22.99, 5, 'https://www.disclan.com/163550-home_default/madra-indie-exclusive-green-vinyl.jpg'),
                                                     ('The Razors Edge - AC/DC', 39.99, 8, 'https://www.disclan.com/163490-home_default/the-razors-edge-lp-colore-oro-ac-dc-lp.jpg'),
                                                     ('Where Is My Utopia - Indie Exclusive', 26.99, 12, 'https://www.disclan.com/163445-home_default/where-is-my-utopia-colored-vinyl-indie-exclusive-ltd-ed.jpg'),
                                                     ('Lives Outgrown - Deluxe', 28.99, 7, 'https://www.disclan.com/163881-home_default/lives-outgrown-deluxe-indie-only.jpg'),
                                                     ('For Those About to Rock - AC/DC', 38.99, 6, 'https://www.disclan.com/163488-home_default/for-those-about-to-rock-we-salute-you-lp-colore-oro-ac-dc-lp.jpg'),
                                                     ('Who Made Who - AC/DC', 37.99, 9, 'https://www.disclan.com/163491-home_default/who-made-who-lp-colore-oro-ac-dc-lp.jpg');
