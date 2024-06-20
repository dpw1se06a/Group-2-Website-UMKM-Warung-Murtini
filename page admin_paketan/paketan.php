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
$nama_paketan = $deskripsi = $harga = $gambar = '';
if (isset($_GET["edit"])) {
  $id = $_GET["edit"];
  $result = $conn->query("SELECT * FROM paketan WHERE id_paketan=$id");
  if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $id_paketan = $row['id_paketan'];
    $nama_paketan = $row["nama_paketan"];
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
          <h1>Daftar Paketan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="page.php?mod=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Paketan</li>
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
            <div id="editForm" class="edit">
              <div class="container mt-5">
                <h2>Form Edit</h2>
                <form id="editFormPaketan" method="post" action="paketan/edit/edit.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="nama_paketan">Nama Paketan</label>
                    <input type="text" class="form-control" id="nama_paketan" name="nama_paketan" value="<?php echo $nama_paketan; ?>" required>
                    <input type="hidden" class="form-control" id="nama_paketan" name="id_paketan" value="<?php echo $id_paketan; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="summernote" name="deskripsi" value="" required><?php echo $deskripsi; ?></textarea>
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
            <!-- HEADER -->
            <div class="card-header">
              <div class="row justify-content-between">
                <div class="col m-1">
                  <div class="input-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataPaketan">
                      Tambah Produk
                    </button>
                  </div>
                </div>
                <div class="col">
                  <form action="page.php?mod=paketan" method="post">
                    <div class="input-group">
                      <label for="Sort" class="input-group-text">Sort By: </label>
                      <select name="Sort" id="Sort" class="form-select" onchange="this.form.submit()">
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
              <div class="modal fade" id="tambahDataPaketan" tabindex="-1" aria-labelledby="tambahDataPaketanLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="tambahDataPaketanLabel">Tambah Paketan</h1>
                    </div>
                    <form method="POST" action="page.php?mod=addPaketan" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="nama_paketan" class="form-label">Nama Paketan</label>
                          <input type="text" class="form-control" id="nama_paketan" name="nama_paketan">
                        </div>
                        <div class="mb-3">
                          <label for="deskripsi" class="form-label">Deskripsi</label>
                          <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                        </div>
                        <div class="mb-3">
                          <label for="harga" class="form-label">Harga</label>
                          <input type="number" class="form-control" id="harga" name="harga">
                        </div>
                        <div class="mb-3">
                          <label for="gambar" class="form-label">Gambar</label>
                          <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                  $sql = "SELECT * FROM paketan";
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
                      <td>
                        <?php
                        $imgData = base64_encode($row['gambar']);
                        $src = 'data:image/jpeg;base64,' . $imgData;
                        ?>
                        <img src="<?= $src ?>" width="200px">
                      </td>
                      <td><?= $row['nama_paketan'] ?></td>
                      <td><?= $row['deskripsi'] ?></td>
                      <td>Rp. <?= number_format($row['harga'], 0, ',', '.') ?></td>
                      <td>
                        <a href="page.php?mod=paketan&edit=<?php echo $row['id_paketan']; ?>" class="btn btn-primary btn-sm">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusDataPaketan<?= $row['id_paketan'] ?>">
                          Hapus
                        </button>
                      </td>
                    </tr>

                    <!-- MODAL EDIT -->
                    <div class="modal fade" id="editDataPaketan<?= $row['id_paketan'] ?>" tabindex="-1" aria-labelledby="editDataPaketan<?= $row['id_paketan'] ?>Label" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editDataPaketan<?= $row['id_paketan'] ?>Label">
                              Edit <?= $row['nama_paketan'] ?>
                            </h1>
                          </div>
                          <form method="POST" action="page.php?mod=updatePaketan" enctype="multipart/form-data">
                            <div class="modal-body">
                              <input type="hidden" class="form-control" id="id_paketan" name="id_paketan" value="<?= $row['id_paketan'] ?>">
                              <div class="mb-3">
                                <label for="nama_paketan" class="form-label">Nama Paketan</label>
                                <input type="text" class="form-control" id="nama_paketan" name="nama_paketan" value="<?= $row['nama_paketan'] ?>">
                              </div>
                              <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $row['deskripsi'] ?>">
                              </div>
                              <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" value="<?= $row['harga'] ?>">
                              </div>
                              <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                              </div>
                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- MODAL DELETE -->
                    <div class="modal fade" id="hapusDataPaketan<?= $row['id_paketan'] ?>" tabindex="-1" aria-labelledby="hapusDataPaketan<?= $row['id_paketan'] ?>Label" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="hapusDataPaketan<?= $row['id_paketan'] ?>Label">Hapus <?= $row['nama_paketan'] ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form method="POST" action="page.php?mod=deletePaketan">
                            <div class="modal-body">
                              <input type="hidden" class="form-control" id="id_about" name="id_paketan" value="<?= $row['id_paketan'] ?>">
                              <div class="mb-3">
                                <p>Apakah Anda yakin ingin menghapus data ini?</p>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">Hapus</button>
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


<script src="../../src/admin/js/paketan.js"></script>