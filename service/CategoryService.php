<?php
require_once __DIR__ . "./../database/database.php";

// find All Ads
function findAllCategories()
{
    global $db_conn;

    $sql = "SELECT * FROM categories ORDER BY created_at ASC";
    $result = mysqli_query($db_conn, $sql);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db_conn));
    }

    $categories = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }

    return $categories;
}