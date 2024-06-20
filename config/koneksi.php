<?php

$dbhost     = "localhost";
$dbuser       = "root";
$dbpassword = "";
$dbname     = "murtini_db";

$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

if ($conn->connect_error){
    die("koneksi gagal: " . $conn->connect_error);
}
else{
    
}
?>