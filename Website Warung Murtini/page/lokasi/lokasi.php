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
<main>
    <div class="content">
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.338454257708!2d109.23558701477585!3d-7.432638294630748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e656bdf1b3e3eeb%3A0x8f5a4a0a621d807e!2sJl.%20Sidodadi%20No.1176%2C%20Legok%2C%20Purwokerto%20Kidul%2C%20Kec.%20Purwokerto%20Sel.%2C%20Kabupaten%20Banyumas%2C%20Jawa%20Tengah%2053147%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1622629172022!5m2!1sen!2sid" 
                width="600" 
                height="450"
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
            <div class="tombol-rute">
                <button onclick="openMaps()">Lihat Rute</button>
            </div>
        </div>
        <div class="address">
            <p>Jl. Sidodadi No.1176, RT.02/RW.03, Legok, Purwokerto Kidul,</p>
            <p>Kec.Purwokerto Sel, Kabupaten Banyumas,Jawa Tengah 53147</p>
        </div>
    </div>
</main>
<footer class="footer">
    <div class="footer-left">
        <h3>Warung Murtini</h3>
        <div class="credit-cards">

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
            <p>+62 813-2425-3254</p>
        </div>
        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="#">support@gmail.com</a></p>
        </div>
    </div>

    <div class="footer-right">
        <p class="footer-about">
            <span>About</span>
            Warung Murtini adalah tempat di mana kelezatan hidangan khas Indonesia bertemu dengan kisah hidup yang dipenuhi dengan semangat dan kegigihan. Terletak di Jl. Sidodadi No.1176, Legok, Purwokerto Kidul, Purwokerto Selatan, Banyumas, Jawa Tengah, kami hadir dengan semangat untuk menghadirkan pengalaman kuliner yang tak terlupakan bagi Anda.
        </p>

        <div class="footer-media">
            <a href="#"><i class="fa fa-youtube"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
        </div>

</footer>


    <script>
        function openMaps() {
            var url = "https://maps.app.goo.gl/rH44Nizz1QXR7bPRA"; // URL peta
            window.open(url, '_blank');
        }
        function sayHi() {
            alert("Hi, User!");
        }
    </script>

<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script> 
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

