<?php
include "../../config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>  
    <title>Halaman Makanan</title>
    <link rel="stylesheet" href="../../src/css/makanan.css">
    <style>
    /* body {
        background-color: #4b6357;
    } */

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-img-top {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        text-align: center;
        padding: 20px;
        flex-grow: 1;
    }

    .card-title {
        font-size: 1.5rem;
        margin-bottom: 15px;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .card-price {
        font-size: 1.1rem;
        color: #e67e22;
        font-weight: bold;
    }

    .isi-menu {
        margin: 20px 0;
    }

    @media (min-width: 768px) {
        .row-cols-md-3>.col {
            flex: 0 0 33.333%;
            max-width: 33.333%;
        }
    }
    </style>
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
              <a class="nav-link active" aria-current="page" href="#" style="color: black;">Makanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../minuman/minuman.php" style="color: black;">Minuman</a>
            </li>
          </ul>
        </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../mari_makan/marimakan.php" style="color: black;"">Mari makan</a>
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