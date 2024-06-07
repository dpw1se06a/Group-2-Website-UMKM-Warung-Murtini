<?php
session_start();
include "../../../../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $pesanan = $_POST['pesanan'];
    $jumlah = $_POST['jumlah'];

    // Insert the data into the database
    $sql = "INSERT INTO pesanan (nama, no_hp, pesanan, jumlah) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nama, $no_hp, $pesanan, $jumlah);

    if ($stmt->execute()) {
        // Redirect to the dashboard page
        header("Location: ../../../page.php?mod=dashboard");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

?>