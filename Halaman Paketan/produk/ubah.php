<?php
session_start();
// Include file koneksi
include '../connect.php';

// Jika metode request adalah POST, artinya pengguna telah mengirimkan formulir edit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // mengambil data dari inputan user
    $id_pesanan = $_POST['id_pesanan'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $pesanan = $_POST['pesanan'];
    $jumlah = $_POST['jumlah'];

    // mengubah data menggunakan query sql
    $query = "UPDATE pesanan SET nama = '$nama', no_hp = '$no_hp', pesanan = '$pesanan', jumlah = '$jumlah' WHERE id_pesanan = '$id_pesanan'";

    // jika berhasil maka dialihkan ke halaman produk
    if ($conn->query($query)) {
        header("Location: ../paketan.php");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
