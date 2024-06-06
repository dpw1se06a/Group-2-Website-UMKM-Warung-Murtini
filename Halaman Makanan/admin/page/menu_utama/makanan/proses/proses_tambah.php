<?php
session_start();
include '../../../../../config/connect.php';

if (isset( $_POST['nama_makanan'], $_POST['deskripsi'], $_POST['harga'], $_POST['gambar'])) {
    $nama = $_POST['nama_makanan'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];

    // Memasukan data menggunakan query SQL
    $query = "INSERT INTO makanan (nama_makanan, deskripsi, harga, gambar) VALUES ('$nama', '$deskripsi', '$harga', '$gambar')";

    // Jika berhasil maka dialihkan ke halaman produk
    if ($conn->query($query)) {
        header("Location: ../../page.php?mod=dashboard");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>