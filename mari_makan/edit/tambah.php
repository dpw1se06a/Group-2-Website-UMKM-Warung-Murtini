<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['judul'];
    $isi = $_POST['isi'];
    $url = $_POST['url'];
    $gambar = $_POST['gambar'];

    $sequel = "INSERT INTO marimakan (`id_marimakan`, `judul`, `isi`, `url`, `gambar`) VALUES (NULL, '$nama', '$isi', '$url', '$gambar')";

    if ($conn->query($sequel)) {
        ?>
        <script>
            window.location = "page.php?mod=marimakan";
        </script>
        <?php
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>