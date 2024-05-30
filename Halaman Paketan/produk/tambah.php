<?php
session_start();
include '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // mengambil data dari inputan user 
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $pesanan = $_POST['pesanan'];
    $jumlah = $_POST['jumlah'];

    // memasukan data menggunakan query sql 
    $query = "INSERT INTO pesanan (nama, no_hp, pesanan, jumlah) VALUES ('$nama', '$no_hp', '$pesanan', '$jumlah')";

    // jika berhasil maka dialihkan ke halaman produk 
    if ($conn->query($query)) {
        header("Location: ../paketan.php");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
