<?php

include "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id_marimakan'];

    echo $id . "<br>";
    $query = "DELETE FROM marimakan WHERE id_marimakan = $id";

    if ($conn->query($query)) {
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