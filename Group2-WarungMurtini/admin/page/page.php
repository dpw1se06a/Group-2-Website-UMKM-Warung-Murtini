<?php
include '_component/header.php';
include '_component/navbar.php';

// Set $mod value and retrieve it from URL
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home'; // Set default value for $mod

switch ($mod) {
    // CASE Navbar
  case 'dashboard':
    include 'dashboard/dashboard.php';
    break;
  case 'paketan':
    include 'paketan/paketan.php';
    break;
  case 'about':
    include 'about/about.php';
    break;

    // CASE Paketan
  case 'updatePaketan':
    include 'paketan/edit/edit.php';
    break;
  case 'addPaketan':
    include 'paketan/edit/tambah.php';
    break;
  case 'deletePaketan':
    include 'paketan/edit/hapus.php';
    break;

    // CASE About
  case 'updateAbout':
    include 'about/edit/edit.php';
    break;
  case 'addAbout':
    include 'about/edit/tambah.php';
    break;
  case 'deleteAbout':
    include 'about/edit/hapus.php';
    break;

    // Add new case here
    // .................
    // .................
    // DEFAULT
  default:
    include 'dashboard/dashboard.php';
}

include '_component/footer.php';
