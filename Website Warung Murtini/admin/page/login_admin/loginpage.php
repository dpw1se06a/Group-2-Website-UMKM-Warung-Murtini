<?php
include '../../config/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Murtini</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../src/css/homestyle.css">
    <link rel="stylesheet" href="../../../src/css/loginstyle.css">

</head>

    <header>
    <nav class="navbar bg-body-tertiary fixed-top custom-navbar">
      <div class="container-fluid" style="max-width: 1800px;">
        <a class="navbar-brand" href="#">
          <img src="../../../page/Logo2.png" alt="" width="150" height="150" style="position: absolute; left: 50%; transform:translateX(-50%); top: -25px;">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
          </ul>
        </div>
      </div>
    </nav>

    
    </header>

<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body cardlogin">
                        <h5 class="card-title">Login</h5>
                        <form action="proses/login.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input required type="email" class="form-control" id="email" placeholder="Masukan email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input required type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary masuk">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>