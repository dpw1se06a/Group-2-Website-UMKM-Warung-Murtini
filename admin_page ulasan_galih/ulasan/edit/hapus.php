<?php

include "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id_ulasan'];

    echo $id . "<br>";
    $query = "DELETE FROM ulasan WHERE id_ulasan = $id";

    if ($conn->query($query)) {
        ?>
        <script>
            window.location = "page.php?mod=ulasan";
        </script>
        <?php
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}