<?php
include "../config/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Halaman Makanan</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-#739072" style="height: 100px;">
        <div class="container-fluid" style="max-width: 1800px;">
            <a class="navbar-brand" href="#">
                <img src="../image/Logo2.png" alt="" width="150" height="150">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Makan Apa?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Lokasi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Mari Makan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Delivery</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Catering</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Makan Ditempat</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Ulasan</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <button class="btnuser">Hi User!</button>
                </form>
            </div>
        </div>
    </nav>