<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $id = $_POST['id_marimakan'];
  $nama = $_POST['judul'];
  $isi = $_POST['isi'];
  $url = $_POST['url'];
  $gambar = $_POST['gambar'];

  $sql = "UPDATE marimakan SET judul = '$nama', isi = '$isi', url = '$url', gambar = '$gambar' WHERE id_marimakan = '$id'";

  if ($conn->query($sql)) {
?>
    <script>
      window.location = "page.php?mod=marimakan";
    </script>
<?php
  } else {
    echo "Error executing query: " . $conn->error;
  }
}
