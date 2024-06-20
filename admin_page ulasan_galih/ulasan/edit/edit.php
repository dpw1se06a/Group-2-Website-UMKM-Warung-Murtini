<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id_ulasan'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    $sql = "UPDATE ulasan SET judul = '$judul', konten = '$konten' WHERE id_ulasan = '$id'";

    if ($conn->query($sql)) {
        ?>
        <script>
            window.location = "page.php?mod=ulasan";
        </script>
        <?php
    } else {
        echo "Error executing query: " . $conn->error;
    }
}