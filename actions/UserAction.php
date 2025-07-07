<?php

require_once __DIR__ . "./../service/UserService.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        // Handle User Registration
        case 'register':
            session_start();

            // Get input values
            $firstname = trim($_POST['firstname'] ?? '');
            $lastname = trim($_POST['lastname'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            // Basic validation
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['register_error'] = "Invalid email address.";
                header("Location: ./../views/users/register.php");
                exit();
            }

            if (empty($password)) {
                $_SESSION['register_error'] = "Password cannot be empty.";
                header("Location: ./../views/users/register.php");
                exit();
            }

            // Check if email already exists
            $existingUser = findUserByEmail($email);

            if ($existingUser) {
                $_SESSION['register_error'] = "Email already registered. Please use a different email.";
                header("Location: ./../views/users/register.php");
                exit();
            }

            // Create user
            $result = createUser($firstname, $lastname, $email, $password);

            if ($result) {
                $_SESSION['register_success'] = "Registration successful! Please log in.";
                header("Location: ./../views/users/login.php");
                exit();
            } else {
                $_SESSION['register_error'] = "Something went wrong. Please try again.";
                header("Location: ./../views/users/register.php");
                exit();
            }
            break;

        // Handle User Login
        case 'login':
            session_start();
            
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
            
            if (empty($email) || empty($password)) {
                $_SESSION['login_error'] = "Please fill in both fields.";
                header("Location: ./../views/users/login.php");
                exit();
            }

            $user = loginUser($email, $password);

            if ($user) {
                // Success
                $_SESSION['user'] = $user;
                header("Location: ./../views/users/me.php");
                exit();
            } else {
                // Invalid login
                $_SESSION['login_error'] = "Invalid email or password.";
                header("Location: ./../views/users/login.php");
                exit();
            }

            break;


        // Handle Update User
        case 'update':
            session_start();

            // Get input values
            $user_id = $_SESSION['user']['id'] ?? null; 
            $firstname = trim($_POST['firstname'] ?? '');
            $lastname = trim($_POST['lastname'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            // Basic validation
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['iupdateerror'] = "Invalid email address.";
                header("Location: ./../views/users/update.php");
                exit();
            }

            if (empty($password)) {
                $_SESSION['update_error'] = "Password cannot be empty.";
                header("Location: ./../views/users/update.php");
                exit();
            }

            // Check if email already exists
            $existingUser = findUserByEmail($email);

            if ($existingUser) {
                $_SESSION['update_error'] = "Email already registered. Please use a different email.";
                header("Location: ./../views/users/update.php");
                exit();
            }

            // Update user
            $result = updateUser($user_id, $firstname, $lastname, $email, $password);

            if ($result) {
                $_SESSION['update_success'] = "Registration successful! Please log in.";
                header("Location: ./../views/users/login.php");
                exit();
            } else {
                $_SESSION['update_error'] = "Something went wrong. Please try again.";
                header("Location: ./../views/users/update.php");
                exit();
            }
            break;
            
        // Handle Delete User
        case 'logout':
            session_start();
            unset($_SESSION['user']);            
                header("Location: ./../views");
                exit();
           
            break;

        default:
            die("Invalid action.");
    }
}
