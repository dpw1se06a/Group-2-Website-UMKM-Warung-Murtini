<?php
session_start();
include '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari inputan user
    $id_pesanan = $_POST['id_pesanan'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $pesanan = $_POST['pesanan'];
    $jumlah = $_POST['jumlah'];

    // Mengubah data menggunakan query SQL
    $query = "UPDATE pesanan SET nama = '$nama', no_hp = '$no_hp', pesanan = '$pesanan', jumlah = '$jumlah' WHERE id_pesanan = '$id_pesanan'";

    // Jika berhasil maka dialihkan ke halaman produk
    if ($conn->query($query)) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>