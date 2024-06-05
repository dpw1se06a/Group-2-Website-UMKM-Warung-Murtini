<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Warung Murtini</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div>
            <img src="logo.png" alt="logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Makan Apa?</a></li>
                <li><a href="#">Mari Makan</a></li>
                <li><a href="#">Ulasan</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <button onclick="sayHi()">Hi, User!</button>
            </ul>
        </nav>
    </header>
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
        function openMaps() {
            var url = "https://maps.app.goo.gl/rH44Nizz1QXR7bPRA"; // URL peta
            window.open(url, '_blank');
        }
        function sayHi() {
            alert("Hi, User!");
        }
    </script>
</body>
</html>

