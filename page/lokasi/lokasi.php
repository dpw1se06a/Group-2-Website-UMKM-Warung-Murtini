<?php include "_component/header.php";?>
<?php
include '../../config/koneksi.php';

$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

$sql = "SELECT jalan, nomor, kota, provinsi FROM alamat WHERE id_alamat = 1"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Format alamat sesuai dengan struktur yang diinginkan
        $full_address = "Jalan ".$row['jalan'] . ", Nomor " . $row['nomor'] . ", " . $row['kota'] .  ", " . $row['provinsi'];
?>

<main>
    <div class="content">
        <div class="map-container">
            <!-- Ganti dengan URL Google Maps yang sesuai atau tinggalkan jika iframe tidak perlu -->
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.315039781485!2d109.2483559841311!3d-7.430347254050838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655f636669ad0f%3A0xb31ec5340965dd91!2sWarung%20Murtini!5e0!3m2!1sen!2sid!4v1711535239366!5m2!1sen!2sid"
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
            <p><?php echo $full_address; ?></p>
            <p class="status-buka-tutup" id="statusBukaTutup"></p>
        </div>
    </div>
</main>
<?php
    }
} else {
    echo "Data alamat tidak ditemukan";
}

// Menutup koneksi database
$conn->close();
?>

<?php include "../_component/footer.php"; ?>

<script>
    // Fungsi untuk menentukan status buka/tutup berdasarkan jam
    function getStatusBukaTutup() {
        var now = new Date();
        var hour = now.getHours();
        var status = (hour >= 6 && hour <= 21) ? "BUKA" : "TUTUP";
        return status;
    }

    // Menampilkan status buka/tutup ke dalam elemen HTML
    document.getElementById("statusBukaTutup").innerText = "Status: " + getStatusBukaTutup();

    function openMaps() {
        var url = "https://maps.app.goo.gl/rH44Nizz1QXR7bPRA"; // URL peta
        window.open(url, '_blank');
    }

    function sayHi() {
        alert("Hi, User!");
    }
</script>

<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
