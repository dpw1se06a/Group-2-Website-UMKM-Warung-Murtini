<?php include "_component/header.php" ?>
<div class="container">
    <div id="menu" class="menu padding-atas-2">
        <div class="container" style="max-width: 1500px;">
            <div class="judul-menu padding-bawah-2">
                <h1 style="text-align: center; color: #fff;">Makanan</h1>
            </div>
            <div class="isi-menu">
                <div class="row">
                    <div class="row row-cols-1 row-cols-md-3 g-4"
                        style="align-items: center; justify-content: center; margin-left: 40px;">
                        <?php
                        $sql = "SELECT * FROM makanan";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                        <div class="col-md-3">
                            <div class="card h-100">
                                <?php
                                        // Fetch image data from the database
                                        $imageData = $row["gambar"];

                                        // Convert binary image data to base64 format
                                        $base64Image = base64_encode($imageData);

                                        // Output the image in the card
                                        ?>
                                <img src="data:image/jpeg;base64,<?php echo $base64Image ?>" class="card-img-top"
                                    alt="...">
                                <div class="card-body" style="">
                                    <h4 class="card-title"><?php echo $row["nama_makanan"] ?></h4>
                                    <p class="card-text" style="">
                                        <?php echo $row["deskripsi"] ?>
                                    </p>
                                    <h6 class="card-price">Rp.<?php echo number_format($row["harga"], 0, ',', '.') ?>
                                    </h6>
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
                <h1 style="text-align: center; margin-left: 10px; color: #fff;">Pesan Makanan</h1>
            </div>
            <div class="buttonpesan padding-bawah-2"
                style=" text-align: center; margin-left: 10px; border-radius: 60px;">
                <button type=" button" class="btn btn-warning btn-lg" data-bs-toggle="modal"
                    data-bs-target="#tambahDataModal">
                    Pesanan Disini
                </button>
            </div>
            <div class="table-responsive mt-3" style="display:flex; margin-left: 10px; align-items: center;">
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
                        include '../config/connect.php';
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
                                <!-- <button type=" button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editDataModal<?= $data['id_pesanan'] ?>">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#hapusDataModal<?= $data['id_pesanan'] ?>">Hapus</button> -->
                                <button type="button" class="btn btn-success btn-sm"
                                    onclick="whatapps('<?= $data['nama'] ?>', '<?= $data['no_hp'] ?>', '<?= $data['pesanan'] ?>', '<?= $data['jumlah'] ?>')">Konfirmasi
                                    disini!</button>
                            </td>
                        </tr>
                        <!-- Modal ubah data -->
                        <div class="modal fade" id="editDataModal<?= $data['id_pesanan'] ?>" tabindex="-1" role="dialog"
                            aria-labelledby="editDataModalLabel" ariahidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editDataModalLabel">Tambah Data
                                            Pengguna</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="makanan/produk/ubah.php">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_pesanan" value="<?= $data['id_pesanan'] ?>">
                                            <div class=" form-group">
                                                <label for="nama">Nama</label>
                                                <input required type="text" class="form-control" id="nama" name="nama"
                                                    value="<?= $data['nama'] ?>">
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
                                            <button type="submit" class="btn btn-primary">Simpan</button>
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
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                                        <a href="makanan/produk/hapus.php?id=<?= $data['id_pesanan'] ?>"
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
                <form method="POST" action="makanan/produk/tambah.php">
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

    <?php include "_component/footer.php" ?>