<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $judul = $_POST['judul'];
  $konten = $_POST['konten'];

  $sequel = "INSERT INTO about (`id_ulasan`, `judul`, `konten`) VALUES (NULL, '$judul', '$konten')";

  if ($conn->query($sequel)) {
?>
    <script>
      window.location = "page.php?mod=ulasan";
    </script>
<?php
    exit;
  } else {
    echo "Error executing query: " . $conn->error;
  }
}
?>