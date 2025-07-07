CREATE TABLE IF NOT EXISTS users (
                                     id INT AUTO_INCREMENT PRIMARY KEY,
                                     firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    email_verified BOOLEAN,
    role VARCHAR(100) NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

CREATE TABLE IF NOT EXISTS categories (
                                          id INT AUTO_INCREMENT PRIMARY KEY,
                                          name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

CREATE TABLE IF NOT EXISTS ads (
                                   id INT AUTO_INCREMENT PRIMARY KEY,
                                   title VARCHAR(100) NOT NULL,
    description VARCHAR(100) NOT NULL,
    price VARCHAR(100) NOT NULL,
    image VARCHAR(250),
    published BOOLEAN,
    sponsored BOOLEAN,
    contact_location VARCHAR(100) NOT NULL UNIQUE,
    contact_email VARCHAR(100) NOT NULL,
    user VARCHAR(100) NOT NULL,
    category VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

INSERT INTO categories (name) VALUES
                                  ('Electronics'),
                                  ('Home Appliances'),
                                  ('Books'),
                                  ('Clothing'),
                                  ('Toys & Games'),
                                  ('Sports & Outdoors'),
                                  ('Beauty & Personal Care'),
                                  ('Automotive'),
                                  ('Health & Wellness'),
                                  ('Computers & Accessories'),
                                  ('Furniture'),
                                  ('Garden & Outdoor'),
                                  ('Jewelry'),
                                  ('Office Supplies'),
                                  ('Pet Supplies'),
                                  ('Music & Instruments'),
                                  ('Baby Products'),
                                  ('Food & Beverages'),
                                  ('Art & Collectibles'),
                                  ('Tools & Hardware');

INSERT INTO users (firstname, lastname, username, password, email_verified, role, created_at)
VALUES ('Admin', 'User', 'admin', '$2y$10$6JCSleiUx42CvjQ8BniqN.NWJcFNieLE9IZyADqPL4FtJKLpXG3T2', TRUE, 'admin', NOW());

INSERT INTO ads (title, description, price, image, published, sponsored, contact_location, contact_email, user, category, created_at, update_at) VALUES
                                                                                                                                                     ('Product 1', 'Sample description for product 1', '10.00', '', 1, 0, 'Location 1', 'admin@example.com', '1', '1', NOW(), NOW()),
                                                                                                                                                     ('Product 2', 'Sample description for product 2', '20.00', '', 1, 0, 'Location 2', 'admin@example.com', '1', '2', NOW(), NOW()),
                                                                                                                                                     ('Product 3', 'Sample description for product 3', '30.00', '', 1, 0, 'Location 3', 'admin@example.com', '1', '3', NOW(), NOW()),
                                                                                                                                                     ('Product 4', 'Sample description for product 4', '40.00', '', 1, 0, 'Location 4', 'admin@example.com', '1', '4', NOW(), NOW()),
                                                                                                                                                     ('Product 5', 'Sample description for product 5', '50.00', '', 1, 0, 'Location 5', 'admin@example.com', '1', '5', NOW(), NOW()),
                                                                                                                                                     ('Product 6', 'Sample description for product 6', '60.00', '', 1, 0, 'Location 6', 'admin@example.com', '1', '6', NOW(), NOW()),
                                                                                                                                                     ('Product 7', 'Sample description for product 7', '70.00', '', 1, 0, 'Location 7', 'admin@example.com', '1', '7', NOW(), NOW()),
                                                                                                                                                     ('Product 8', 'Sample description for product 8', '80.00', '', 1, 0, 'Location 8', 'admin@example.com', '1', '8', NOW(), NOW()),
                                                                                                                                                     ('Product 9', 'Sample description for product 9', '90.00', '', 1, 0, 'Location 9', 'admin@example.com', '1', '9', NOW(), NOW()),
                                                                                                                                                     ('Product 10', 'Sample description for product 10', '100.00', '', 1, 0, 'Location 10', 'admin@example.com', '1', '10', NOW(), NOW()),
                                                                                                                                                     ('Product 11', 'Sample description for product 11', '110.00', '', 1, 0, 'Location 11', 'admin@example.com', '1', '11', NOW(), NOW()),
                                                                                                                                                     ('Product 12', 'Sample description for product 12', '120.00', '', 1, 0, 'Location 12', 'admin@example.com', '1', '12', NOW(), NOW()),
                                                                                                                                                     ('Product 13', 'Sample description for product 13', '130.00', '', 1, 0, 'Location 13', 'admin@example.com', '1', '13', NOW(), NOW()),
                                                                                                                                                     ('Product 14', 'Sample description for product 14', '140.00', '', 1, 0, 'Location 14', 'admin@example.com', '1', '14', NOW(), NOW()),
                                                                                                                                                     ('Product 15', 'Sample description for product 15', '150.00', '', 1, 0, 'Location 15', 'admin@example.com', '1', '15', NOW(), NOW()),
                                                                                                                                                     ('Product 16', 'Sample description for product 16', '160.00', '', 1, 0, 'Location 16', 'admin@example.com', '1', '16', NOW(), NOW()),
                                                                                                                                                     ('Product 17', 'Sample description for product 17', '170.00', '', 1, 0, 'Location 17', 'admin@example.com', '1', '17', NOW(), NOW()),
                                                                                                                                                     ('Product 18', 'Sample description for product 18', '180.00', '', 1, 0, 'Location 18', 'admin@example.com', '1', '18', NOW(), NOW()),
                                                                                                                                                     ('Product 19', 'Sample description for product 19', '190.00', '', 1, 0, 'Location 19', 'admin@example.com', '1', '19', NOW(), NOW()),
                                                                                                                                                     ('Product 20', 'Sample description for product 20', '200.00', '', 1, 0, 'Location 20', 'admin@example.com', '1', '20', NOW(), NOW());

