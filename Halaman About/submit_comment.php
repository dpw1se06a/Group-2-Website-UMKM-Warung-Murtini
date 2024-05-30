<?php
include 'connect.php';

// Tangkap data dari formulir
$nama = $_POST['nama'];
$komentar = $_POST['komentar'];

// Simpan data ke database
$sql = "INSERT INTO about (nama, komentar) VALUES ('$nama', '$komentar')";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Komentar berhasil dikirim.'); window.location.href='about.php';</script>";
} else {
    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "'); window.location.href='about.php';</script>";
}

$conn->close();
?>
