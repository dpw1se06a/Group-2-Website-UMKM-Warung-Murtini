<?php
include '_component/header.php';
include '_component/navbar.php';

// Set $mod value and retrieve it from URL
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home'; // Set default value for $mod

switch ($mod) {
    // CASE Navbar

  case 'loginpage':
    include 'login_admin/loginpage.php';
    break;
    
  case 'dashboard':
    include 'dashboard/dashboard.php';
    break;
  case 'paketan':
    include 'paketan/paketan.php';
    break;
  case 'about':
    include 'about/about.php';
    break;

  case 'marimakan':
    include 'mari_makan/marimakan.php';
    break;

  case 'makanan':
    include 'makanan/makanan.php';
    break;

  case 'lokasi':
      include 'lokasi/lokasi.php';
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

    // CASE Mari Makan
  case 'updateMariMakan':
    include 'mari_makan/edit/edit.php';
    break;
  case 'addMariMakan':
    include 'mari_makan/edit/tambah.php';
    break;
  case 'deleteMariMakan':
    include 'mari_makan/edit/hapus.php';
    break;
    
    // CASE Makanan
  case 'updateMakanan':
    include 'makanan/edit/proses/proses_ubah.php';
    break;
  case 'addMakanan':
    include 'makanan/edit/proses/proses_tambah.php';
    break;
  case 'deleteMakanan':
    include 'makanan/edit/proses/proses_hapus.php';
    break;
  case 'updatePesanan':
    include 'makanan/edit/proses_pesan/proses_ubah.php';
    break;
  case 'addPesanan':
    include 'makanan/edit/proses_pesan/proses_tambah.php';
    break;
  case 'deletePesanan':
    include 'makanan/edit/proses_pesan/proses_hapus.php';
    break;
  
    // CASE lokasi
  case 'updateLokasi':
    include 'lokasi/edit/edit.php';
    break;
  case 'addLokasi':
    include 'lokasi/edit/tambah.php';
    break;
  case 'deleteLokasi':
    include 'lokasi/edit/hapus.php';
    break;


    // Add new case here
    // .................
    // .................
    // DEFAULT
  default:
    include 'dashboard/dashboard.php';
}

include '_component/footer.php';
