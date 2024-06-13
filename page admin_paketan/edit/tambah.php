<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_paketan'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['tmp_name'];

    // Read the file content into a variable
    $gambarData = file_get_contents($gambar);

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO paketan (nama_paketan, deskripsi, harga, gambar) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $nama, $deskripsi, $harga, $gambarData);

    if ($stmt->execute()) {
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
?>