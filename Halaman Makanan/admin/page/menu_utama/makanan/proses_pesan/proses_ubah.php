<?php
session_start();
include '../../../config/koneksi.php';


if (isset($_POST['user_id'], $_POST['email'], $_POST['nama'], $_POST['no_hp'], $_POST['password'])) {
    // Mengambil data dari inputan user
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];

    // Mengubah data menggunakan query SQL
    $query = "UPDATE user SET email = '$email', nama = '$nama', no_hp = '$no_hp', password = '$password' WHERE user_id = '$user_id'";

    // Jika berhasil maka dialihkan ke halaman produk
    if ($conn->query($query)) {
        header("Location: ../../page.php?mod=dashboard");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>