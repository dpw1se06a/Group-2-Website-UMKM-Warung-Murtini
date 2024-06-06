<?php

// Replace with your database credentials
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "project";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Koneksi Gagal : " . $conn->connect_error);
} else {
    // echo "Koneksi Berhasil";
}

?>