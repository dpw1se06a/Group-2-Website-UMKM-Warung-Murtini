<?php
session_start();
include '../../../../../config/connect.php';

if (isset($_POST['nama_makanan'], $_POST['deskripsi'], $_POST['harga']) && isset($_FILES['gambar'])) {
    $nama = $_POST['nama_makanan'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar'];

    // Debugging
    echo "tes1";
    var_dump($_FILES['gambar']); // Debugging line

    // Read the binary data from the uploaded file
    $imageData = file_get_contents($gambar['tmp_name']);

    // Prepare the SQL statement with placeholders
    $query = "INSERT INTO makanan (nama_makanan, deskripsi, harga, gambar) VALUES (?, ?, ?, ?)";

    // Prepare and bind parameters
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('ssis', $nama, $deskripsi, $harga, $imageData);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: ../../../page.php?mod=dashboard");
            exit;
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing query: " . $conn->error;
    }

} else {
    echo "Required data is missing.";
}
?>