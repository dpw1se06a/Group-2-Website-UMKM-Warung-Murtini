<?php include "_component/header.php";
include '../config/koneksi.php';
function bubbleSort_ASC($data)
{
    $n = count($data);
    for ($i = 0; $i < $n; $i++) {
        for ($j = $n - 1; $j > $i; $j--) {
            if ($data[$j]['harga'] < $data[$j - 1]['harga']) {
                $temp = $data[$j];
                $data[$j] = $data[$j - 1];
                $data[$j - 1] = $temp;
            }
        }
    }
    return $data;
}
function bubbleSortDesc($data)
{
    $n = count($data);
    for ($i = 0; $i < $n; $i++) {
        for (
            $j = $n -
            1;
            $j > $i;
            $j--
        ) {
            if ($data[$j]['harga'] > $data[$j - 1]['harga']) {
                $temp = $data[$j];
                $data[$j] = $data[$j - 1];
                $data[$j - 1] = $temp;
            }
        }
    }
    return $data;
}
$nama_makanan = $deskripsi = $harga = $gambar = '';
if (isset($_GET["edit"])) {
    $id = $_GET["edit"];
    $result = $conn->query("SELECT * FROM makanan WHERE id_makanan=$id");
    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $id_makanan = $row['id_makanan'];
        $nama_makanan = $row["nama_makanan"];
        $deskripsi = $row["deskripsi"];
        $harga = $row["harga"];
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Makanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="page.php?mod=dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Makanan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div id="editForm" class="edit">
        <div class="container mt-5">
            <h2>Form Edit</h2>
            <form id="editFormMakanan" method="post" action="menu_utama/makanan/proses/proses_ubah.php"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_makanan">Nama Makanan</label>
                    <input type="text" class="form-control" id="nama_makanan" name="nama_makanan"
                        value="<?php echo $nama_makanan; ?>" required>
                    <input type="hidden" class="form-control" id="nama_makanan" name="id_makanan"
                        value="<?php echo $id_makanan; ?>" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="summernote" name="deskripsi" value=""
                        required><?php echo $deskripsi; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $harga; ?>">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    <label class="input-group-text" for="gambar">Upload</label>
                </div>
                <button type="submit" class="btn btn-warning">Edit</button>
            </form>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- HEADER -->
                        <div class="card-header">
                            <div class="row justify-content-between">
                                <div class="col m-1">
                                    <div class="input-group">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#tambahDataMakanan">
                                            Tambah Produk
                                        </button>
                                    </div>
                                </div>
                                <div class="col">
                                    <form action="page.php?mod=makanan" method="POST">
                                        <div class="input-group">
                                            <label for="Sort" class="input-group-text">Sort By: </label>
                                            <select name="Sort" id="Sort" class="form-select"
                                                onchange="this.form.submit()">
                                                <?php
                                                if (isset($_POST['Sort'])) {
                                                    $sort = $_POST['Sort'];
                                                } else {
                                                    $sort = '0';
                                                }
                                                ?>
                                                <option value="0" <?php if ($sort == '0')
                                                    echo 'selected' ?>>Default
                                                </option>
                                                <option value="asc" <?php if ($sort == 'asc')
                                                    echo 'selected' ?>>Harga:
                                                    murah ke mahal</option>
                                                <option value="desc" <?php if ($sort == 'desc')
                                                    echo 'selected' ?>>
                                                    Harga: mahal ke murah</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- MODAL TAMBAH -->
                            <div class="modal fade" id="tambahDataMakanan" tabindex="-1"
                                aria-labelledby="tambahDataMakananLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="tambahDataMakananLabel">Tambah
                                                Makanan
                                            </h1>
                                        </div>
                                        <form method="POST" action="menu_utama/makanan/proses/proses_tambah.php"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nama_makanan" class="form-label">Nama
                                                        Makanan</label>
                                                    <input type="text" class="form-control" id="nama_makanan"
                                                        name="nama_makanan">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <input type="text" class="form-control" id="deskripsi"
                                                        name="deskripsi">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="number" class="form-control" id="harga" name="harga">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                                    <label class="input-group-text" for="gambar">Upload</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <table id="List" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="w-auto">Gambar</th>
                                            <th class="w-50">Nama</th>
                                            <th class="w-auto">Deskripsi</th>
                                            <th class="w-auto">Harga</th>
                                            <th class="w-auto">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                $sql = "SELECT * FROM makanan";
                                                $q = mysqli_query($conn, $sql);
                                                $data = [];
                                                while ($row = mysqli_fetch_array($q)) {
                                                    $data[] = $row;
                                                }

                                                if (isset($_POST['Sort'])) {
                                                    $sort = $_POST['Sort'];
                                                    if ($sort == 'asc') {
                                                        $data = bubbleSort_ASC($data);
                                                    } elseif ($sort == 'desc') {
                                                        $data = bubbleSortDesc($data);
                                                    }
                                                }

                                                foreach ($data as $row):
                                                    ?>

                                        <tr>
                                            <td>
                                                <?php
                                                    $imgData = base64_encode($row['gambar']);
                                                    $src = 'data:image/jpeg;base64,' . $imgData;
                                                    ?>
                                                <img src="<?= $src ?>" width="200px">
                                            </td>
                                            <td><?= htmlspecialchars($row['nama_makanan']) ?></td>
                                            <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                                            <td>Rp. <?= number_format($row['harga'], 0, ',', '.') ?></td>
                                            <td>
                                                <a href="page.php?mod=makanan&edit=<?php echo $row['id_makanan']; ?>"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#hapusDataMakanan<?= $row['id_makanan'] ?>">Hapus</button>
                                            </td>
                                        </tr>

                                        <!-- MODAL EDIT -->
                                        <div class="modal fade" id="editDataMakanan<?= $row['id_makanan'] ?>"
                                            tabindex="-1"
                                            aria-labelledby="editDataMakanan<?= $row['id_makanan'] ?>Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="editDataMakanan<?= $row['id_makanan'] ?>Label">
                                                            Edit <?= htmlspecialchars($row['nama_makanan']) ?>
                                                        </h1>
                                                    </div>
                                                    <form method="POST"
                                                        action="menu_utama/makanan/proses/proses_ubah.php"
                                                        enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="hidden" class="form-control" id="id_makanan"
                                                                name="id_makanan" value="<?= $row['id_makanan'] ?>">
                                                            <div class="mb-3">
                                                                <label for="nama_makanan" class="form-label">Nama
                                                                    Makanan</label>
                                                                <input type="text" class="form-control"
                                                                    id="nama_makanan" name="nama_makanan"
                                                                    value="<?= htmlspecialchars($row['nama_makanan']) ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deskripsi"
                                                                    class="form-label">Deskripsi</label>
                                                                <input type="text" class="form-control" id="deskripsi"
                                                                    name="deskripsi"
                                                                    value="<?= htmlspecialchars($row['deskripsi']) ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="harga" class="form-label">Harga</label>
                                                                <input type="number" class="form-control" id="harga"
                                                                    name="harga" value="<?= $row['harga'] ?>">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <input type="file" class="form-control" id="gambar"
                                                                    name="gambar">
                                                                <label class="input-group-text"
                                                                    for="gambar">Upload</label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                name="update">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- MODAL DELETE -->
                                        <div class="modal fade" id="hapusDataMakanan<?= $row['id_makanan'] ?>"
                                            tabindex="-1"
                                            aria-labelledby="hapusDataMakanan<?= $row['id_makanan'] ?>Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="hapusDataMakanan<?= $row['id_makanan'] ?>Label">
                                                            Hapus <?= htmlspecialchars($row['nama_makanan']) ?>
                                                        </h1>
                                                    </div>
                                                    <form method="POST"
                                                        action="menu_utama/makanan/proses/proses_hapus.php">
                                                        <div class="modal-body">
                                                            <input type="hidden" class="form-control" id="id_makanan"
                                                                name="id_makanan" value="<?= $row['id_makanan'] ?>">
                                                            <div class="mb-3">
                                                                <h4>Konfirmasi hapus data Makanan</h4>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Form Pesanan -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="page.php?mod=dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Pesanan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- HEADER -->
                        <div class="card-header">
                            <div class="row justify-content-between">
                                <div class="col m-1">
                                    <div class="input-group">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#tambahDataPesanMakanan">
                                            Tambah Pesanan
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL TAMBAH -->
                            <div class="modal fade" id="tambahDataPesanMakanan" tabindex="-1"
                                aria-labelledby="tambahDataPesanMakananLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="tambahDataPesanMakananLabel">Tambah
                                                Pesanan
                                            </h1>
                                        </div>
                                        <form method="POST" action="menu_utama/makanan/proses_pesan/proses_tambah.php">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_hp" class="form-label">No. WhatsApp</label>
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pesanan" class="form-label">Pesanan</label>
                                                    <input type="text" class="form-control" id="pesanan" name="pesanan"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jumlah" class="form-label">Jumlah</label>
                                                    <input type="number" class="form-control" id="jumlah" name="jumlah"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="List" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>No. Whatapps</th>
                                            <th>Pesanan</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../config/koneksi.php';
                                        // using SQL query to display user data
                                        $query = "SELECT * FROM pesanan";
                                        $datas = $conn->query($query);
                                        foreach ($datas as $data):
                                            ?>
                                        <tr>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['no_hp'] ?></td>
                                            <td><?= $data['pesanan'] ?></td>
                                            <td><?= $data['jumlah'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editDataPesanModal<?= $data['id_pesanan'] ?>">Edit</button>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#hapusDataPesanModal<?= $data['id_pesanan'] ?>">Hapus</button>
                                            </td>
                                        </tr>
                                        <!-- Modal ubah data -->
                                        <div class="modal fade" id="editDataPesanModal<?= $data['id_pesanan'] ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="editDataPesanModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editDataPesanModalLabel">
                                                            Update
                                                            Data
                                                            Pesanan</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST"
                                                        action="menu_utama/makanan/proses_pesan/proses_ubah.php">
                                                        <div class=" modal-body">
                                                            <input type="hidden" name="id_pesanan"
                                                                value="<?= $data['id_pesanan'] ?>">
                                                            <div class="form-group">
                                                                <label for="nama">Nama</label>
                                                                <input required type="text" class=" form-control"
                                                                    id="nama" name="nama" value="<?= $data['nama'] ?>">
                                                            </div>
                                                            <div class=" form-group">
                                                                <label for="no_hp">No.Whatapps</label>
                                                                <input required type="text" class="form-control"
                                                                    id="no_hp" name="no_hp"
                                                                    value="<?= $data['no_hp'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="pesanan">no_hp</label>
                                                                <input required type="varchar" class="form-control"
                                                                    id="pesanan" name="pesanan"
                                                                    value="<?= $data['pesanan'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jumlah">Jumlah Pesanan</label>
                                                                <input required type="text" class=" form-control"
                                                                    id="jumlah" name="jumlah"
                                                                    value="<?= $data['jumlah'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Hapus Data -->
                                        <div class="modal fade" id="hapusDataPesanModal<?= $data['id_pesanan'] ?>"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="hapusDataPesanModalLabel<?= $data['id_pesanan'] ?>"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="hapusDataPesanModalLabel<?= $data['id_pesanan'] ?>">
                                                            Hapus
                                                            Data Pesanan</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST"
                                                        action="menu_utama/makanan/proses_pesan/proses_hapus.php">
                                                        <div class="modal-body">
                                                            <p>Apakah Anda yakin ingin menghapus pesanan ini?
                                                            </p>
                                                            <input type="hidden" name="id_pesanan"
                                                                value="<?= $data['id_pesanan'] ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script>
$('#summernote').summernote({
    placeholder: 'Edit disini',
    tabsize: 2,
    height: 120,
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
    ]
});
</script>

<?php include "_component/footer.php"; ?>