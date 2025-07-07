<?php
require_once __DIR__ . "./../database/database.php";

// Get All Users
function findAllUsers()
{
    global $db_conn;

    $sql = "SELECT created_at, firstname, lastname, username FROM users";
    $result = mysqli_query($db_conn, $sql);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    return $users;
}

// Get User By Id
function findUserById($id)
{
    global $db_conn;

    $stmt = mysqli_prepare($db_conn, "SELECT created_at, firstname, lastname, username FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    return mysqli_fetch_assoc($result);
}

// Get User By Email (username)
function findUserByEmail($email)
{
    global $db_conn;

    $stmt = mysqli_prepare($db_conn, "SELECT id, firstname, lastname, username FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    return mysqli_fetch_assoc($result);
}


//  Login User
function loginUser($email, $password)
{
    global $db_conn;

    $stmt = mysqli_prepare($db_conn, "SELECT id, firstname, lastname, username, role, password FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    $user = mysqli_fetch_assoc($result);

    if (!$user) {        
        return false;
    }

    if (password_verify($password, $user['password'])) {        
        unset($user['password']);
        return $user;
    }

    return false;
}


// Create User - with password hashing
function createUser($firstname, $lastname, $username, $password)
{
    global $db_conn;

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = mysqli_prepare($db_conn, "INSERT INTO users (firstname, lastname, username, password) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $username, $hashed_password);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    return $result;
}

// Update User - with password hashing (optional: update only if password is provided)
function updateUser($id, $firstname, $lastname, $username, $password)
{
    global $db_conn;

    if ($password !== null) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($db_conn, "UPDATE users SET firstname = ?, lastname = ?, username = ?, password = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "ssssi", $firstname, $lastname, $username, $hashed_password, $id);
    } else {
        $stmt = mysqli_prepare($db_conn, "UPDATE users SET firstname = ?, lastname = ?, username = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "sssi", $firstname, $lastname, $username, $id);
    }

    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    return $result;
}

// Delete User
function deleteUser($id)
{
    global $db_conn;

    $stmt = mysqli_prepare($db_conn, "DELETE FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    return $result;
}
