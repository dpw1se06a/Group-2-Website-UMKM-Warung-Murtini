<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_alamat = $_POST['id_alamat'];
    $jalan = $_POST['jalan'];
    $nomor = $_POST['nomor'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];


  $sql = "UPDATE alamat SET jalan = '$jalan', nomor = '$nomor', kota = '$kota', provinsi = '$provinsi' WHERE id_alamat = '$id_alamat'";

  if ($conn->query($sql)) {
?>
    <script>
      window.location = "page.php?mod=lokasi";
    </script>
<?php
  } else {
    echo "Error executing query: " . $conn->error;
  }
}
