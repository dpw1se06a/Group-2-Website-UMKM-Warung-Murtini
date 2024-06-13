<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $id = $_POST['id_minuman'];
  $nama = $_POST['nama_minuman'];
  $deskripsi = $_POST['deskripsi'];
  $harga = $_POST['harga'];
  $gambar = $_POST['gambar'];

  $sql = "UPDATE minuman SET nama_minuman = '$nama', deskripsi = '$deskripsi', harga = '$harga', gambar = '$gambar' WHERE id_minuman = '$id'";

  if ($conn->query($sql)) {
?>
    <script>
      window.location = "page.php?mod=minuman";
    </script>
<?php
  } else {
    echo "Error executing query: " . $conn->error;
  }
}
