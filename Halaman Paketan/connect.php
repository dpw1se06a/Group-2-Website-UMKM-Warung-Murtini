<?php
$host = 'localhost'; // Nama host database
$username = 'root'; // Username database
$password = ''; // Password database
$database = 'warung_murtini'; // Nama database
// Buat koneksi
$conn = new mysqli($host, $username, $password, $database);
// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
