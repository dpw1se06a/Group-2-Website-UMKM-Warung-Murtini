<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_paketan'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];

    $sequel = "INSERT INTO paketan (`id_paketan`, `nama_paketan`, `deskripsi`, `harga`, `gambar`) VALUES (NULL, '$nama', '$deskripsi', '$harga', '$gambar')";

    if ($conn->query($sequel)) {
        ?>
        <script>
            window.location = "page.php?mod=paketan";
        </script>
        <?php
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>