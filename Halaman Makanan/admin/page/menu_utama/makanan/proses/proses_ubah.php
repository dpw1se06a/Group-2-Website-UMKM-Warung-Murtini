<?php
session_start();
include '../../../../../config/connect.php';

if (isset($_POST['id_makanan'], $_POST['nama_makanan'], $_POST['deskripsi'], $_POST['harga'])) {
    $id_makanan = $_POST['id_makanan'];
    $nama_makanan = $_POST['nama_makanan'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Check if a new image is uploaded
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = $_FILES['gambar']['tmp_name'];

        // Read the binary data from the uploaded file
        $imageData = file_get_contents($gambar);
    } else {
        // If no new image is uploaded, keep the existing image
        // Assuming the existing image path is stored in the database
        // You may need to adjust this part based on your database structure
        $query = "SELECT gambar FROM makanan WHERE id_makanan = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id_makanan);
        $stmt->execute();
        $stmt->bind_result($gambar);
        $stmt->fetch();
        $stmt->close();
    }

    // Prepare the SQL statement for updating
    $query = "UPDATE makanan SET nama_makanan = ?, deskripsi = ?, harga = ?";
    // Add the gambar column only if a new image is uploaded
    if (isset($imageData)) {
        $query .= ", gambar = ?";
    }
    $query .= " WHERE id_makanan = ?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($query);
    if (isset($imageData)) {
        $stmt->bind_param('ssisi', $nama_makanan, $deskripsi, $harga, $imageData, $id_makanan);
    } else {
        $stmt->bind_param('ssii', $nama_makanan, $deskripsi, $harga, $id_makanan);
    }

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: ../../../page.php?mod=dashboard");
        exit;
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

} else {
    echo "Required data is missing.";
}
?>