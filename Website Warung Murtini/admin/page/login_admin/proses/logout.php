<?php
// Mulai session
session_start();

// Hapus semua data session
session_unset();

// Hancurkan session
session_destroy();

// Arahkan pengguna ke halaman login
header("Location: ../loginpage.php  ");
exit();
?>