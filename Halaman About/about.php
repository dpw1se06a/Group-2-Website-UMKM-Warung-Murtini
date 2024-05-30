<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warung Murtini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="about.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-#739071" style="height: 100px;">
        <div class="container-fluid" style="max-width: 1800px;">
            <a class="navbar-brand" href="#">
                <img src="Logo.png" alt="" width="150" height="150">
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
                        <a class="nav-link" href="#">Mari Makan</a>
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
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <main>
        <div class="text-center">
            <!-- Full-width images with number and caption text -->
            <div class="w3-display-container mySlides">
                <img src="lokasi warung.png" style="width:100%">
                <div class="w3-display-bottomleft w3-container w3-padding-16 w3-black">
                </div>
            </div>

            <section class="tentang-kami">
                <h3>Tentang Kami</h3>
                <h6>Selamat datang di Warung Murtini!</h6>
                <p>Berdiri sejak 2 Februari 2022, Warung Murtini adalah tempat di mana kelezatan hidangan khas Indonesia
                    bertemu dengan kisah hidup yang dipenuhi dengan semangat dan kegigihan. Terletak di Jl. Sidodadi
                    No.1176, Legok, Purwokerto Kidul, Purwokerto Selatan, Banyumas, Jawa Tengah, kami hadir dengan
                    semangat untuk menghadirkan pengalaman kuliner yang tak terlupakan bagi Anda. Di sini, setiap
                    hidangan bukan hanya sebuah sajian, tetapi juga sebuah cerita. Kami mempersembahkan rasa rumahan dan
                    cita rasa autentik Indonesia yang telah menjadi bagian dari perjalanan hidup kami. Dari setiap
                    suapan, Anda akan merasakan kehangatan dan kebahagiaan yang kami tuangkan dalam setiap hidangan.
                    Mari bergabung dengan kami di Warung Murtini, tempat di mana makanan lezat dan kisah hidup saling
                    bersatu dalam harmoni. Terima kasih atas dukungan dan kepercayaan Anda kepada kami. Jadikan setiap
                    kunjungan Anda sebagai petualangan kuliner yang memuaskan! Selamat menikmati sajian khas Indonesia
                    di Warung Murtini!</p>
            </section>
        </div>
        <div class="peta">
            <h3 style="text-align: center; color: white;">Lokasi Warung</h3>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.315039781485!2d109.2483559841311!3d-7.430347254050838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655f636669ad0f%3A0xb31ec5340965dd91!2sWarung%20Murtini!5e0!3m2!1sen!2sid!4v1711535239366!5m2!1sen!2sid"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- Form Komentar -->
<div class="container">
    <h3>Komentar</h3>
    <form action="submit_comment.php" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="komentar" class="form-label">Komentar:</label>
            <textarea class="form-control" id="komentar" name="komentar" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>

    </main>
     <!-- Footer -->
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