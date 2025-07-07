<?php
require_once __DIR__ . "./../database/database.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

// find All Ads
function findAllAds()
{
    global $db_conn;

    $sql = "SELECT * FROM ads ORDER BY created_at ASC";
    $result = mysqli_query($db_conn, $sql);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    $ads = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $ads[] = $row;
    }

    return $ads;
}

// find ad by id
function findAdById($id)
{
    global $db_conn;

    $stmt = mysqli_prepare($db_conn, "SELECT * FROM ads WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    return mysqli_fetch_assoc($result);
}

// find all by user
function findAllAdsByUser($user)
{
    global $db_conn;

    $stmt = mysqli_prepare($db_conn, "SELECT * FROM ads WHERE user = ?");
    mysqli_stmt_bind_param($stmt, "i", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    $ads = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $ads[] = $row;
    }

    return $ads;
}

// find all and group by category
function findAllAdsAndGroupByCategory()
{
    global $db_conn;

    $sql = "SELECT * , COUNT(*) AS total_ads FROM ads GROUP BY category ORDER BY created_at ASC";
    $result = mysqli_query($db_conn, $sql);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    $ads = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $ads[] = $row;
    }

    return $ads;
}

// find all by category
function findAllAdsByCategory($id)
{
    global $db_conn;

    $stmt = mysqli_prepare($db_conn, "SELECT * FROM ads WHERE category = ?");
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    $ads = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $ads[] = $row;
    }

    return $ads;
}

//  Create Ad
function createAd($image, $title, $description, $price, $published, $sponsored, $contact_location, $contact_email, $user, $category)
{
    global $db_conn;

    $stmt = mysqli_prepare($db_conn, "INSERT INTO `ads` (`image`,`title`, `description`, `price`, `published`, `sponsored`, `contact_location`, `contact_email`, `user`, `category`) VALUES (?, ?, ?, ?, ?,?, ?, ?, ?,?)");
    mysqli_stmt_bind_param($stmt, "sssdiissii", $image, $title, $description, $price, $published, $sponsored, $contact_location, $contact_email, $user, $category);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    return $result;
}

// Update Ad
function updateAd($id, $title, $description, $price, $published, $sponsored, $contact_location, $contact_email, $category)
{

    global $db_conn;

    $stmt = mysqli_prepare($db_conn, "UPDATE ads SET title=?, description=?, price=?, published=?, sponsored=?, contact_location=?, contact_email=?, category=? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssdiissii", $title, $description, $price, $published, $sponsored, $contact_location, $contact_email, $category, $id);

    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    return $result;
}

// Delete Ad
function deleteAdByid($id)
{
    global $db_conn;

    $stmt = mysqli_prepare($db_conn, "DELETE FROM ads WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    return $result;
}

//  Get Category Name
function getCategoryName($id)
{
    global $db_conn;

    $stmt = mysqli_prepare($db_conn, "SELECT name FROM categories WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    $category = mysqli_fetch_assoc($result);

    return $category['name'];
}