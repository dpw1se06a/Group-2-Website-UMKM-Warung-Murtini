<?php

include "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id_about'];

    echo $id . "<br>";
    $query = "DELETE FROM about WHERE id_about = $id";

    if ($conn->query($query)) {
        ?>
        <script>
            window.location = "page.php?mod=about";
        </script>
        <?php
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}