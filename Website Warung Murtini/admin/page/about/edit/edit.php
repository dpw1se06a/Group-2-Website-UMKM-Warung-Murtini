<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id_about'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    $sql = "UPDATE about SET judul = '$judul', konten = '$konten' WHERE id_about = '$id'";

    if ($conn->query($sql)) {
        ?>
        <script>
            window.location = "page.php?mod=about";
        </script>
        <?php
    } else {
        echo "Error executing query: " . $conn->error;
    }
}