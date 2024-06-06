<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Halaman About</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <?php
  include '../../config/connect.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman About</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="page.php?mod=dashboard">Home</a></li>
              <li class="breadcrumb-item active">About</li>
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
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataAbout">
                        Tambah Tentang Kami
                      </button>
                    </div>
                  </div>

                  <!-- MODAL TAMBAH -->
                  <div class="modal fade" id="tambahDataAbout" tabindex="-1" aria-labelledby="tambahDataAboutLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="tambahDataAboutLabel">
                            Tambah About
                          </h1>
                        </div>
                        <form method="POST" action="page.php?mod=addAbout">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="judul" class="form-label">Judul</label>
                              <input type="text" class="form-control" id="judul" name="judul">
                            </div>
                            <div class="mb-3">
                              <label for="konten" class="form-label">Konten</label>
                              <input type="text" class="form-control" id="konten" name="konten">
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
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <table id="List" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th class="w-auto">Judul</th>
                      <th class="w-auto">Konten</th>
                      <th class="w-auto">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM about";
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
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['konten'] ?></td>
                        <td>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editDataAbout<?= $row['id_about'] ?>">Edit</button>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusDataAbout<?= $row['id_about'] ?>">Hapus</button>
                        </td>
                      </tr>

                      <!-- MODAL EDIT -->
                      <div class="modal fade" id="editDataAbout<?= $row['id_about'] ?>" tabindex="-1" aria-labelledby="editDataAbout<?= $row['id_about'] ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editDataAbout<?= $row['id_about'] ?>Label">Edit <?= $row['judul'] ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="POST" action="page.php?mod=updateAbout">
                              <div class="modal-body">
                                <input type="hidden" class="form-control" id="id_about" name="id_about" value="<?= $row['id_about'] ?>">
                                <div class="mb-3">
                                  <label for="judul" class="form-label">Judul</label>
                                  <input type="text" class="form-control" id="judul" name="judul" value="<?= $row['judul'] ?>">
                                </div>
                                <div class="mb-3">
                                  <label for="konten" class="form-label">Konten</label>
                                  <input type="text" class="form-control" id="konten" name="konten" value="<?= $row['konten'] ?>">
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
                      <div class="modal fade" id="hapusDataAbout<?= $row['id_about'] ?>" tabindex="-1" aria-labelledby="hapusDataAbout<?= $row['id_about'] ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="hapusDataAbout<?= $row['id_about'] ?>Label">Hapus <?= $row['judul'] ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="POST" action="page.php?mod=deleteAbout">
                              <div class="modal-body">
                                <input type="hidden" class="form-control" id="id_about" name="id_about" value="<?= $row['id_about'] ?>">
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

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script src="../../src/admin/js/paketan.js"></script>
</body>

</html>