<?php
session_start();
include '../../../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Mengambil data dari inputan user
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $pesanan = $_POST['pesanan'];
    $jumlah = $_POST['jumlah'];

    // Memasukan data menggunakan query SQL
    $query = "INSERT INTO pesanan (nama, no_hp, pesanan, jumlah) VALUES ('$nama', '$no_hp', '$pesanan', '$jumlah')";
    
    // Jika berhasil maka dialihkan ke halaman produk
    if ($conn->query($query)) {
        header("Location: ../../page.php?mod=dashboard");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>