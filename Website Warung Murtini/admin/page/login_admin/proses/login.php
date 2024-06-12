<?php
session_start();
include '../../../config/connect.php';

// Ambil data dari form login
$email = $_POST['email'];
$password = $_POST['password'];

// Query untuk memeriksa email dan password
$query = "SELECT * FROM users WHERE email = ? AND password = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Simpan informasi user ke session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    // Redirect ke halaman dashboard atau halaman lain yang diinginkan
    header("Location: ../../page.php?mod=dashboard");
    exit();
} else {
    // Email atau password salah
    echo "<script>alert('Email atau password salah'); window.location.href = '../loginpage.php';</script>";
}

$stmt->close();
$conn->close();
?>
