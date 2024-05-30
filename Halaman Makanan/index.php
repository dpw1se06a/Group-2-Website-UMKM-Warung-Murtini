<?php
include "connect.php";
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-#739072" style="height: 100px;">
        <div class="container-fluid" style="max-width: 1800px;">
            <a class="navbar-brand" href="#">
                <img src="Logo2.png" alt="" width="150" height="150">
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

    <div class="container">
        <div id="menu" class="menu padding-atas-2">
            <div class="container" style="max-width: 1500px;">
                <div class="judul-menu padding-bawah-2">
                    <h1 style="text-align: center; color: #fff;">Makanan</h1>
                </div>
                <div class="isi-menu">
                    <div class="row">
                        <div class="row row-cols-1 row-cols-md-3 g-3">
                            <?php
							$sql = "SELECT * FROM makanan";
							$result = mysqli_query($conn, $sql);

							if (mysqli_num_rows($result)) {
								while ($row = mysqli_fetch_assoc($result)) {
									?>
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <img src="<?php echo $row["gambar"] ?>" class="card-img-top" style="" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <h4><?php echo $row["nama_makanan"] ?></h4>
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

    <div class="container_pesan">
        <div id="pesan" class="padding-atas-2">
            <div class="container-pesan" style="max-width: 1500px;">
                <div class="pesan-menu padding-bawah-2">
                    <h1 style="text-align: center; margin-left: 400px; color: #fff;">Pesan Makanan</h1>
                </div>
                <div class="buttonpesan padding-bawah-2"
                    style=" text-align: center; margin-left: 400px; border-radius: 60px;">
                    <button type=" button" class="btn btn-warning btn-lg" data-bs-toggle="modal"
                        data-bs-target="#tambahDataModal">
                        Pesanan Disini
                    </button>
                </div>
                <div class="table-responsive mt-3" style="display:flex; margin-left: 220px; align-items: center;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Pelanggan</th>
                                <th>No. Whatapps</th>
                                <th>Pesanan</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							include 'connect.php';
							// menggunakan query sql agar menampilkan data produk dan join kedalam tabel user agar mendapatkan siapa pemilik produk
							$query = "SELECT * FROM pesanan";
							$datas = $conn->query($query);
							foreach ($datas as $data):
								?>
                            <tr>
                                <td>
                                    <?= $data['nama'] ?>
                                </td>
                                <td>
                                    <?= $data['no_hp'] ?>
                                </td>
                                <td>
                                    <?= $data['pesanan'] ?>
                                </td>
                                <td>
                                    <?= $data['jumlah'] ?>
                                </td>
                                <td>
                                    <button type=" button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editDataModal<?= $data['id_pesanan'] ?>">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#hapusDataModal<?= $data['id_pesanan'] ?>">Hapus</button>
                                    <button type="button" class="btn btn-success btn-sm"
                                        onclick="whatapps('<?= $data['nama'] ?>', '<?= $data['no_hp'] ?>', '<?= $data['pesanan'] ?>', '<?= $data['jumlah'] ?>')">Konfirmasi
                                        disini!</button>
                                </td>
                            </tr>
                            <!-- Modal ubah data -->
                            <div class="modal fade" id="editDataModal<?= $data['id_pesanan'] ?>" tabindex="-1"
                                role="dialog" aria-labelledby="editDataModalLabel" ariahidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editDataModalLabel">Tambah Data
                                                Pengguna</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action="produk/ubah.php">
                                            <div class="modal-body">
                                                <input type="hidden" name="id_pesanan"
                                                    value="<?= $data['id_pesanan'] ?>">
                                                <div class=" form-group">
                                                    <label for="nama">Nama</label>
                                                    <input required type="text" class="form-control" id="nama"
                                                        name="nama" value="<?= $data['nama'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_hp">no_hp</label>
                                                    <input required type="varchar" class="form-control" id="no_hp"
                                                        name="no_hp" value="<?= $data['no_hp'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pesanan">Pesanan</label>
                                                    <input required type="text" class=" form-control" id="pesanan"
                                                        name="pesanan" value="<?= $data['pesanan'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah</label>
                                                    <input required type="text" class=" form-control" id="jumlah"
                                                        name="jumlah" value="<?= $data['jumlah'] ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btnprimary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Hapus Data -->
                            <div class="modal fade" id="hapusDataModal<?= $data['id_pesanan'] ?>" tabindex="-1"
                                role="dialog" aria-labelledby="hapusDataModalLabel<?= $data['id_pesanan'] ?>"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusDataModalLabel<?= $data['id_pesanan'] ?>">
                                                Konfirmasi Penghapusan</h5>
                                            <button type="button" class="close" datadismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data pengguna
                                            ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <a href="produk/hapus.php?id=<?= $data['id_pesanan'] ?>"
                                                class="btn btn-danger">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal tambah data -->
        <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahDataModalLabel">Pesan Makanan Saja</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" arialabel="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="produk/tambah.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input required type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No whatapps</label>
                                <input required type="varchar" class="form-control" id="no_hp" name="no_hp">
                            </div>
                            <div class="form-group">
                                <label for="pesanan">Pesanan</label>
                                <input required type="text" class="form-control" id="pesanan" name="pesanan">
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input required type="number" class="form-control" id="jumlah" name="jumlah">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
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