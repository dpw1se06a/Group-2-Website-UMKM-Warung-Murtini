<?php include "../../config/koneksi.php";?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Warung Murtini</title>
    <link rel="stylesheet" type="text/css" href="../../src/css/lokasi.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-#FFB2A4" style="height: 100px;">
      <div class="container-fluid" style="max-width: 1800px;">
        <a class="navbar-brand" href="#">
          <img src="../Logo2.png" alt="" width="150" height="150">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../../index.php" style="color: black;">Beranda</a>
            </li>

            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Makan Apa?
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../makanan/makanan.php" style="color: black;">Makanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../minuman/minuman.php" style="color: black;">Minuman</a>
            </li>
          </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../marimakan/marimakan.php" style="color: black;"">Mari makan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../paketan/paketan.php" style="color: black;"">Paketan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../ulasan/ulasan.php" style="color: black";>Ulasan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../lokasi/lokasi.php" style="color: black;">Lokasi</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../about/about.php" style="color: black;">Tentang kami</a>
            </li>

          </ul>

        </div>
      </div>
    </nav>