<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_minuman'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];

    $sequel = "INSERT INTO minuman (`id_minuman`, `nama_minuman`, `deskripsi`, `harga`, `gambar`) VALUES (NULL, '$nama', '$deskripsi', '$harga', '$gambar')";

    if ($conn->query($sequel)) {
        ?>
        <script>
            window.location = "page.php?mod=minuman";
        </script>
        <?php
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>