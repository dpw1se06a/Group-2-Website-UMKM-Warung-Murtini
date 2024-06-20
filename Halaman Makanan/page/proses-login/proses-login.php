<?php
include "../../config/connect.php";

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    // Lakukan operasi pengecekan login di database
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Query untuk mendapatkan user berdasarkan email
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Password benar, set session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nama'] = $user['nama'];
            header("Location: ../page.php?mod=dashboard");
            exit();
        } else {
            // Password salah
            header("Location: login1.php?error=wrongpassword");
            exit();
        }
    } else {
        // Email tidak ditemukan
        header("Location: login1.php?error=wrongpassword");
        exit();
    }

}
?>