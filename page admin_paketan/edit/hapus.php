<?php

include "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id_paketan'];

    echo $id . "<br>";
    $query = "DELETE FROM paketan WHERE id_paketan = $id";

    if ($conn->query($query)) {
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