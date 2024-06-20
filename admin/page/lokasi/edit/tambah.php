<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jalan = $_POST['jalan'];
    $nomor = $_POST['nomor'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];

    $sequel = "INSERT INTO alamat (`id_alamat`, `jalan`, `nomor`, `kota`,`provinsi`) VALUES (NULL, '$jalan', '$nomor', '$kota','$provinsi')";

    if ($conn->query($sequel)) {
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
?>