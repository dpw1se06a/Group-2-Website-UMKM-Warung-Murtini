<?php
include '../../config/connect.php';
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
    for ($j = $n - 1; $j > $i; $j--) {
      if ($data[$j]['harga'] > $data[$j - 1]['harga']) {
        $temp = $data[$j];
        $data[$j] = $data[$j - 1];
        $data[$j - 1] = $temp;
      }
    }
  }
  return $data;
}

$nama_minuman = $deskripsi = $harga = $gambar = '';
if (isset($_GET["edit"])) {
    $id = $_GET["edit"];
    $result = $conn->query("SELECT * FROM minuman WHERE id_minuman=$id");
    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $id_minuman = $row['id_minuman'];
        $nama_minuman = $row["nama_minuman"];
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
                    <h1>Daftar Minuman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="page.php?mod=dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Minuman</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content --> 
    <div id="editForm" class="edit">
        <div class="container mt-5">
            <h2>Form Edit</h2>
            <form id="editFormMinuman" method="post" action="minuman/edit/edit.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_minuman">Nama Minuman</label>
                    <input type="text" class="form-control" id="nama_minuman" name="nama_minuman"
                        value="<?php echo $nama_minuman; ?>" required>
                    <input type="hidden" class="form-control" id="nama_minuman" name="id_minuman"
                        value="<?php echo $id_minuman; ?>" required>
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
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#tambahDataMinuman">
                                            Tambah Produk
                                        </button>
                                    </div>
                                </div>
                                <div class="col">
                                    <form action="page.php?mod=Minuman" method="post">
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
                                            echo 'selected' ?>>Default</option>

                                                <option value="asc" <?php if ($sort == 'asc')
                                              echo 'selected' ?>>
                                                    Harga: murah ke mahal</option>

                                                <option value="desc" <?php if ($sort == 'desc')
                                                echo 'selected' ?>>Harga: mahal ke murah
                                                </option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- MODAL TAMBAH -->
                            <div class="modal fade" id="tambahDataMinuman" tabindex="-1"
                                aria-labelledby="tambahDataMinumanLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="tambahDataMinumanLabel">
                                                Tambah Minuman
                                            </h1>
                                        </div>
                                        <form method="POST" action="page.php?mod=addMinuman">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nama_minuman" class="form-label">Nama
                                                        Paketan</label>
                                                    <input type="text" class="form-control" id="nama_minuman"
                                                        name="nama_minuman">
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
                                                <div class="mb-3">
                                                    <label for="gambar" class="form-label">Gambar</label>
                                                    <input type="text" class="form-control" id="gambar" name="gambar">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </form>
                                    </div>
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
                  $sql = "SELECT * FROM minuman";
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

                  foreach ($data as $row) {
                  ?>
                                    <tr>
                                        <td><img src="<?= $row['gambar'] ?>" width="100px"></td>
                                        <td><?= $row['nama_minuman'] ?></td>
                                        <td><?= $row['deskripsi'] ?></td>
                                        <td>Rp. <?= number_format($row['harga'], 0, ',', '.') ?></td>
                                        <td>
                                            <a href="page.php?mod=minuman&edit=<?php echo $row['id_minuman']; ?>"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#hapusDataMinuman<?= $row['id_minuman'] ?>">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- MODAL EDIT -->
                                    <div class="modal fade" id="editDataMinuman<?= $row['id_minuman'] ?>" tabindex="-1"
                                        aria-labelledby="editDataMinuman<?= $row['id_minuman'] ?>Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5"
                                                        id="editDataMinuman<?= $row['id_minuman'] ?>Label">
                                                        Edit <?= $row['nama_minuman'] ?>
                                                    </h1>
                                                </div>
                                                <form method="POST" action="page.php?mod=updateMinuman">
                                                    <div class="modal-body">
                                                        <input type="text" class="form-control" id="id_minuman"
                                                            name="id_minuman" value="<?= $row['id_minuman'] ?>"
                                                            hidden="true">
                                                        <div class="mb-3">
                                                            <label for="nama_minuman" class="form-label">Nama
                                                                Minuman</label>
                                                            <input type="text" class="form-control" id="nama_minuman"
                                                                name="nama_minuman" value="<?= $row['nama_minuman'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                                            <input type="text" class="form-control" id="deskripsi"
                                                                name="deskripsi" value="<?= $row['deskripsi'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="harga" class="form-label">Harga</label>
                                                            <input type="number" class="form-control" id="harga"
                                                                name="harga" value="<?= $row['harga'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="gambar" class="form-label">Gambar</label>
                                                            <input type="text" class="form-control" id="harga"
                                                                name="gambar" value="<?= $row['gambar'] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- MODAL DELETE -->
                                    <div class="modal fade" id="hapusDataMinuman<?= $row['id_minuman'] ?>" tabindex="-1"
                                        aria-labelledby="editDataMinuman<?= $row['id_minuman'] ?>Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5"
                                                        id="editDataMinuman<?= $row['id_minuman'] ?>Label">
                                                        Hapus <?= $row['nama_minuman'] ?>
                                                    </h1>
                                                </div>
                                                <form method="POST" action="page.php?mod=deleteminuman">
                                                    <div class="modal-body">
                                                        <input type="text" class="form-control" id="id_minuman"
                                                            name="id_minuman" value="<?= $row['id_minuman'] ?>"
                                                            hidden="true">
                                                        <div class="mb-3">
                                                            <h4>Konfirmasi hapus data minuman</h4>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                  }
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
</div>

<!-- Main content -->

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

<script src="../../src/admin/js/minuman.js"></script>