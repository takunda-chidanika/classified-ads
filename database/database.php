<?php
 $host = "localhost";
 $dbname = "classified_db";
 $username = "root";
 $password = "";


$db_conn = mysqli_connect($host, $username, $password, $dbname);

if (!$db_conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

