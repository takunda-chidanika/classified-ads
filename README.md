# Classified Ads

A PHP-based classified ads web application.

## Getting Started with XAMPP

### 1. Prerequisites

- [XAMPP](https://www.apachefriends.org/index.html) installed (includes Apache, PHP, and MySQL)
- Project files placed in your XAMPP `htdocs` directory

### 2. Project Setup

#### a. Place the Project in XAMPP's Web Directory

- Copy or move the `classified-ads` folder into your XAMPP `htdocs` directory:
  - **Windows:** `C:\xampp\htdocs\classified-ads`
  - **Linux:** `/opt/lampp/htdocs/classified-ads`

#### b. Start XAMPP Services

- Open the XAMPP Control Panel.
- Start **Apache** and **MySQL**.

### 3. Database Setup

#### a. Create the Database and User

1. Open [phpMyAdmin](http://localhost/phpmyadmin) in your browser.
2. Create a new database named `classified_ads`.
3. Create a new user `classified_user` with password `classified_pass` and grant it all privileges on the `classified_ads` database.

#### b. Initialise the Database

- With Apache and MySQL running, open your browser and go to:
  ```
  http://localhost/classified-ads/db_init_sql.php
  ```
- You should see a message indicating whether the database was initialised successfully.

### 4. Configure Database Connection (if needed)

- Open `database/database.php` and ensure the credentials match your local setup:
  ```php
  $db_conn = mysqli_connect(
      'localhost',         // Host
      'classified_user',   // Username
      'classified_pass',   // Password
      'classified_ads',    // Database
      3306                 // Port
  );
  ```

### 5. Access the Application

- Open your browser and go to:
  ```
  http://localhost/classified-ads
  ```

---

## Repository

- [GitHub: takunda-chidanika/classified-ads](https://github.com/takunda-chidanika/classified-ads.git)

---

**Note:**  
- If you make changes to `database/database.sql`, you can re-run `db_init_sql.php` to update your database.
- Make sure Apache and MySQL are running in XAMPP before accessing the application or the database initialisation script. 