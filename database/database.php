<?php
 $host = "localhost";
 $dbname = "classified_db";
 $username = "root";
 $password = "";


$db_conn = mysqli_connect($host, $username, $password, $dbname);

//$host = 'db';
//$db   = 'classified_ads';
//$user = 'classified_user';
//$pass = 'classified_pass';
//$port = 9081; // Use 3306 inside the container, 9081 from your host
//
//$db_conn = new mysqli($host, $user, $pass, $db, $port);

if (!$db_conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// mysqli_close($db_conn);
