<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $id = $_POST['id_paketan'];
  $nama = $_POST['nama_paketan'];
  $deskripsi = $_POST['deskripsi'];
  $harga = $_POST['harga'];
  $gambar = $_POST['gambar'];

  $sql = "UPDATE paketan SET nama_paketan = '$nama', deskripsi = '$deskripsi', harga = '$harga', gambar = '$gambar' WHERE id_paketan = '$id'";

  if ($conn->query($sql)) {
?>
    <script>
      window.location = "page.php?mod=paketan";
    </script>
<?php
  } else {
    echo "Error executing query: " . $conn->error;
  }
}
