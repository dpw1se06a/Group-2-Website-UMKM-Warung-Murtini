<?php
session_start();
include '../../../config/koneksi.php';

if (isset($_GET['id'])) {
    // Mengambil data dari parameter URL
    $id = $_GET['id'];

    // Menghapus data menggunakan query SQL
    $query = "DELETE FROM pesanan WHERE id_pesanan = $id";

    // Jika berhasil maka dialihkan ke halaman produk
    if ($conn->query($query)) {
        header("Location:../makanan.php");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>