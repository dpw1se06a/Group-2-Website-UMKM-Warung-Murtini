<?php

include "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id_alamat'];

    echo $id . "<br>";
    $query = "DELETE FROM alamat WHERE id_alamat = $id";

    if ($conn->query($query)) {
        ?>
        <script>
            window.location = "page.php?mod=lokasi";
        </script>
        <?php
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}