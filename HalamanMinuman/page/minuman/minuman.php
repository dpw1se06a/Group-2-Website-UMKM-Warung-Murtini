<?php
include "header.php";

// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'websitewarung';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi Error : " . $conn->connect_error);
}

// Query untuk mengambil data minuman dari tabel minuman
$sql = "SELECT * FROM minuman";
$result = mysqli_query($conn, $sql);

// Memeriksa apakah query berhasil dieksekusi
if ($result) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="minuman.css"> <!-- Menggunakan file minuman.css -->
        <title>Minuman</title>
    </head>
    <body>
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
                            // Mengambil data dari hasil query dan menampilkannya dalam card Bootstrap
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="<?php echo $row["gambar"] ?>" class="card-img-top" style="" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"></h5>
                                            <h4><?php echo $row["nama_minuman"] ?></h4>
                                            <p><?php echo $row["deskripsi"] ?></p>
                                            <h6><?php echo $row["harga"] ?></h6>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                            }
                            ?>
                            <button class="pesan-button">Pesan disini</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php
} else {
    // Jika query tidak berhasil dieksekusi
    echo "Gagal mengambil data minuman dari database";
}

include "footer.php";
?>


