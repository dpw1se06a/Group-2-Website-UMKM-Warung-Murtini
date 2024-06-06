<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <title>Makan Apa?</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <img src="logo.jpg.png" alt="Logo" width="100" height="100" class="logo">
    <nav>
        <a href="#">Makan Apa?</a>
        <a href="#">Mari Makan</a>
        <a href="#">Ulasan</a>
        <a href="#">Tentang Kami</a>
        <button onclick="user-button">HI USER</button>
    </nav>
</header>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<div class="container">
        <div id="menu" class="menu padding-atas-2">
            <div class="container" style="max-width: 1500px;">
                <div class="judul-menu padding-bawah-2">
                    <h1 style="text-align: center; color: #fff;">Minuman</h1>
                </div>
                <div class="isi-menu">
                    <div class="row">
                        <div class="row row-cols-1 row-cols-md-3 g-3">
                            <?php
							$sql = "SELECT * FROM minuman";
							$result = mysqli_query($conn, $sql);

							if (mysqli_num_rows($result)) {
								while ($row = mysqli_fetch_assoc($result)) {
									?>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="<?php echo $row["gambar"] ?>" class="card-img-top" style="" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <h4><?php echo $row["nama"] ?></h4>
                                        <p>
                                            <?php echo $row["deskripsi"] ?>
                                        </p>
                                        <h6><?php echo $row["harga"] ?></h6>
                                    </div>
                                </div>
                            </div>
                            <?php
								}
							} else {
								echo "No data";
							}
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="pesan-button">Pesan disini</button>
        </div>
      </div>
      </div>

</div>

<footer class="footer">
            <div class="footer-left">
                <h3>Warung Murtini</h3>
                <div class="credit-cards">
                    <img src="Logo2.png" alt="">
                </div>
                <p class="footer-copyright">2022 Kelompok2</p>
            </div>

            <div class="footer-center">
                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>Indonesia</span> Jawa Tengah, Purwokerto</p>
                </div>
                <div>
                    <i class="fa fa-phone"></i>
                    <p>+62 077-777-77</p>
                </div>
                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="#">support@gmail.com</a></p>
                </div>
            </div>

            <div class="footer-right">
                <p class="footer-about">
                    <span>About</span>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis, facilis fugit
                    consequuntur reiciendis
                    laborum quo earum corrupti excepturi ex non voluptatem officia explicabo quia
                    numquam. Quos
                    quis
                    temporibus fuga necessitatibus.
                </p>

                <div class="footer-media">
                    <a href="#"><i class="fa fa-youtube"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>

        </footer>

        <script>
        function whatapps(nama, no_hp, pesanan, jumlah) {
            var url = "https://wa.me//6281936169483" + "?text=" +
                "*Nama :* " + nama + "%0a" +
                "*No. Whatapps :* " + no_hp + "%0a" +
                "*Pesanan :* " + pesanan + "%0a" +
                "*Jumlah :* " + jumlah + "%0a%0a" +
                "*Saya Konfirmasi atas pembelian saya pada website tolong segera dibuat";

            window.open(url, '_blank').focus();
        }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>