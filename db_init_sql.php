<?php
require_once __DIR__ . "/database/database.php";

global $db_conn;

if (!$db_conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Load your SQL file
$sql = file_get_contents(__DIR__ . '/database/database.sql');

if (!$sql) {
    die("Could not read SQL file.");
}

// Run multi-query using $db_conn
if (mysqli_multi_query($db_conn, $sql)) {
    do {
        if ($result = mysqli_store_result($db_conn)) {
            mysqli_free_result($result);
        }
    } while (mysqli_next_result($db_conn));
    echo "✅ Database initialized successfully.";
} else {
    echo "❌ Error executing SQL: " . mysqli_error($db_conn);
}

mysqli_close($db_conn);

