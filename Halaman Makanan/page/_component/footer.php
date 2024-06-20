<footer class="footer">
    <div class="footer-left">
        <h3>Warung Murtini</h3>
        <div class="credit-cards">
            <img src="../image/Logo2.png" alt="">
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

<script>
    // Get the query string parameters from the URL
    const urlParams = new URLSearchParams(window.location.search);
    // Check if there's an error parameter in the URL
    if (urlParams.has('error')) {
        // Get the value of the error parameter
        const error = urlParams.get('error');
        // Display appropriate notification based on the error
        if (error === 'wrongpassword') {
            alert('Password salah. Silakan coba lagi.');
        } else if (error === 'emailnotfound') {
            alert('Email tidak ditemukan. Silakan coba lagi.');
        }
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