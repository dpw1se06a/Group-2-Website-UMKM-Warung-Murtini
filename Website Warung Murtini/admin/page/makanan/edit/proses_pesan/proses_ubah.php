<?php
session_start();
include '../../../../config/connect.php';


if (isset($_POST['id_pesanan'], $_POST['nama'], $_POST['no_hp'], $_POST['pesanan'], $_POST['jumlah'])) {

    // Mengambil data dari inputan user
    $id = $_POST['id_pesanan'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $pesanan = $_POST['pesanan'];
    $jumlah = $_POST['jumlah'];

    // Mengubah data menggunakan query SQL
    $query = "UPDATE pesanan SET nama = '$nama', no_hp = '$no_hp', pesanan = '$pesanan', jumlah = '$jumlah' WHERE id_pesanan = '$id'";

    // Jika berhasil maka dialihkan ke halaman produk
    if ($conn->query($query)) {
        header("Location: ../../../page.php?mod=makanan");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>