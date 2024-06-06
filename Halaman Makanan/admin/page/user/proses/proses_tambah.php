<?php
session_start();
include '../../../config/koneksi.php';

if (isset($_POST['email'], $_POST['nama'], $_POST['no_hp'], $_POST['password'])) {

    // Mengambil data dari inputan user
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];

    // Memasukan data menggunakan query SQL
    $query = "INSERT INTO user (email, nama, no_hp, password) VALUES ('$email', '$nama', '$no_hp', '$password')";

    // Jika berhasil maka dialihkan ke halaman produk
    if ($conn->query($query)) {
        header("Location: ../../page.php?mod=dashboard");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>