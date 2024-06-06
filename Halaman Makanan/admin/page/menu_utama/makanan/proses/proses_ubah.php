<?php
session_start();
include '../../../../../config/connect.php';


if (isset($_POST['id_makanan'], $_POST['nama_makanan'], $_POST['deskripsi'], $_POST['harga'], $_POST['gambar'])) {
    $id = $_POST['id_makanan'];
    $nama = $_POST['nama_makanan'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];

    $sql = "UPDATE makanan SET nama_makanan= '$nama', deskripsi = '$deskripsi', harga = '$harga', gambar = '$gambar' WHERE id_makanan = '$id'";

    if ($conn->query($query)) {
        header("Location: ../../page.php?mod=dashboard");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>