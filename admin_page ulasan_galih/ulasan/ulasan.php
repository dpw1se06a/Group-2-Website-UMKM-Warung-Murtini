<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Fitur Ulasan</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <?php
  include '../config/connect.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fitur Ulasan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="page.php?mod=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Ulasan</li>
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
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataUlasan">
                        Tambah Ulasan
                      </button>
                    </div>
                  </div>

                  <!-- MODAL TAMBAH -->
                  <div class="modal fade" id="tambahDataUlasan" tabindex="-1" aria-labelledby="tambahDataUlasanLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="tambahDataUlasanLabel">
                            Tambah Ulasan
                          </h1>
                        </div>
                        <form method="POST" action="page.php?mod=addUlasan">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="nama" class="form-label">Nama</label>
                              <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="mb-3">
                              <label for="ulasan" class="form-label">Ulasan</label>
                              <textarea class="form-control" id="ulasan" name="ulasan"></textarea>
                            </div>
                            <div class="mb-3">
                              <label for="rating" class="form-label">Rating</label>
                              <select class="form-control" id="rating" name="rating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
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
                      <th class="w-auto">Nama</th>
                      <th class="w-auto">Ulasan</th>
                      <th class="w-auto">Rating</th>
                      <th class="w-auto">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM ulasan";
                    $q = mysqli_query($conn, $sql);
                    $data = [];
                    while ($row = mysqli_fetch_array($q)) {
                      $data[] = $row;
                    }

                    function bubbleSort_ASC($array) {
                      // implementation of bubble sort in ascending order
                    }
                    
                    function bubbleSortDesc($array) {
                      // implementation of bubble sort in descending order
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
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['ulasan'] ?></td>
                        <td><?= $row['rating'] ?></td>
                        <td>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editDataUlasan<?= $row['id_ulasan'] ?>">Edit</button>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusDataUlasan<?= $row['id_ulasan'] ?>">Hapus</button>
                        </td>
                      </tr>

                      <!-- MODAL EDIT -->
                      <div class="modal fade" id="editDataUlasan<?= $row['id_ulasan'] ?>" tabindex="-1" aria-labelledby="editDataUlasan<?= $row['id_ulasan'] ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editDataUlasan<?= $row['id_ulasan'] ?>Label">Edit Ulasan dari <?= $row['nama'] ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="POST" action="page.php?mod=updateUlasan">
                              <div class="modal-body">
                                <input type="hidden" class="form-control" id="id_ulasan" name="id_ulasan" value="<?= $row['id_ulasan'] ?>">
                                <div class="mb-3">
                                  <label for="nama" class="form-label">Nama</label>
                                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>">
                                </div>
                                <div class="mb-3">
                                  <label for="ulasan" class="form-label">Ulasan</label>
                                  <textarea class="form-control" id="ulasan" name="ulasan"><?= $row['ulasan'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                  <label for="rating" class="form-label">Rating</label>
                                  <select class="form-control" id="rating" name="rating">
                                    <option value="1" <?= $row['rating'] == 1 ? 'selected' : '' ?>>1</option>
                                    <option value="2" <?= $row['rating'] == 2 ? 'selected' : '' ?>>2</option>
                                    <option value="3" <?= $row['rating'] == 3 ? 'selected' : '' ?>>3</option>
                                    <option value="4" <?= $row['rating'] == 4 ? 'selected' : '' ?>>4</option>
                                    <option value="5" <?= $row['rating'] == 5 ? 'selected' : '' ?>>5</option>
                                  </select>
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
                      <div class="modal fade" id="hapusDataUlasan<?= $row['id_ulasan'] ?>" tabindex="-1" aria-labelledby="hapusDataUlasan<?= $row['id_ulasan'] ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="hapusDataUlasan<?= $row['id_ulasan'] ?>Label">Hapus Ulasan dari <?= $row['nama'] ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="POST" action="page.php?mod=deleteUlasan">
                              <div class="modal-body">
                                <input type="hidden" class="form-control" id="id_ulasan" name="id_ulasan" value="<?= $row['id_ulasan'] ?>">
                                <div class="mb-3">
                                  <p>Apakah Anda yakin ingin menghapus ulasan ini?</p>
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

</body>

</html>
