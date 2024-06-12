<?php
session_start();
include '../../../../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id_makanan'];

    echo $id . "<br>";
    $query = "DELETE FROM makanan WHERE id_makanan = $id";

    if ($conn->query($query)) {
        ?>
        <script>
            window.location = "../../../page.php?mod=makanan";
        </script>
        <?php
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>