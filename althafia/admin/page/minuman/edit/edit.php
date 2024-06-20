<?php
include '../../../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id_minuman'];
  $nama = $_POST['nama_minuman'];
  $deskripsi = $_POST['deskripsi'];
  $harga = $_POST['harga'];
  $gambar = $_FILES['gambar']['tmp_name'];

  // Prepare the SQL query
  if (!empty($gambar)) {
    // Read the file content into a variable
    $gambarData = file_get_contents($gambar);

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE minuman SET nama_minuman = ?, deskripsi = ?, harga = ?, gambar = ? WHERE id_minuman = ?");
    $stmt->bind_param("ssisi", $nama, $deskripsi, $harga, $gambarData, $id);
  } else {
    // Update without changing the image
    $stmt = $conn->prepare("UPDATE minuman SET nama_minuman = ?, deskripsi = ?, harga = ? WHERE id_minuman = ?");
    $stmt->bind_param("ssii", $nama, $deskripsi, $harga, $id);
  }

  if ($stmt->execute()) {
?>
<script>
window.location = "../../page.php?mod=minuman";
</script>
<?php
  } else {
    echo "Error executing query: " . $conn->error;
  }
}
?>