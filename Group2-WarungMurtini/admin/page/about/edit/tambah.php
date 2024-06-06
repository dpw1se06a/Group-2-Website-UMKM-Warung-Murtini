<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $judul = $_POST['judul'];
  $konten = $_POST['konten'];

  $sequel = "INSERT INTO about (`id_about`, `judul`, `konten`) VALUES (NULL, '$judul', '$konten')";

  if ($conn->query($sequel)) {
?>
    <script>
      window.location = "page.php?mod=about";
    </script>
<?php
    exit;
  } else {
    echo "Error executing query: " . $conn->error;
  }
}
?>