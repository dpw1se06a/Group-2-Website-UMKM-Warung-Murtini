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
          <h1>Lokasi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="page.php?mod=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Lokasi</li>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataLokasi">
                      Tambah Data
                    </button>
                  </div>
                </div>
              </div>

              <!-- MODAL TAMBAH -->
              <div class="modal fade" id="tambahDataLokasi" tabindex="-1" aria-labelledby="tambahDataLokasiLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="tambahDataLokasiLabel">
                        Tambah Lokasi
                      </h1>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="POST" action="page.php?mod=addLokasi">
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="jalan" class="form-label">Jalan</label>
                          <input type="text" class="form-control" id="jalan" name="jalan" required>
                        </div>
                        <div class="mb-3">
                          <label for="nomor" class="form-label">Nomor</label>
                          <input type="text" class="form-control" id="nomor" name="nomor" required>
                        </div>
                        <div class="mb-3">
                          <label for="kota" class="form-label">Kota</label>
                          <input type="text" class="form-control" id="kota" name="kota" required>
                        </div>
                        <div class="mb-3">
                          <label for="provinsi" class="form-label">Provinsi</label>
                          <input type="text" class="form-control" id="provinsi" name="provinsi" required>
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
                    <th class="w-auto">Jalan</th>
                    <th class="w-50">Nomor</th>
                    <th class="w-auto">Kota</th>
                    <th class="w-auto">Provinsi</th>
                    <th class="w-auto">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                    $sql = "SELECT * FROM alamat";
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
                      <td><?= $row['jalan'] ?></td>
                      <td><?= $row['nomor'] ?></td>
                      <td><?= $row['kota'] ?></td>
                      <td><?= $row['provinsi'] ?></td>
                      <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editDataLokasi<?= $row['id_alamat'] ?>"> Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusDataLokasi<?= $row['id_alamat'] ?>">
                          Hapus
                        </button>
                      </td>
                    </tr>

                    <!-- MODAL EDIT -->
                    <div class="modal fade" id="editDataLokasi<?= $row['id_alamat'] ?>" tabindex="-1" aria-labelledby="editDataLokasi<?= $row['id_alamat'] ?>Label" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editDataLokasi<?= $row['id_alamat'] ?>Label">
                              Edit Lokasi
                            </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form method="POST" action="page.php?mod=updateLokasi">
                            <div class="modal-body">
                              <input type="text" class="form-control" id="id_alamat" name="id_alamat" value="<?= $row['id_alamat'] ?>" hidden="true">
                              <div class="mb-3">
                                <label for="jalan" class="form-label">Jalan</label>
                                <input type="text" class="form-control" id="jalan" name="jalan" value="<?= $row['jalan'] ?>">
                              </div>
                              <div class="mb-3">
                                <label for="nomor" class="form-label">Nomor</label>
                                <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $row['nomor'] ?>">
                              </div>
                              <div class="mb-3">
                                <label for="kota" class="form-label">Kota</label>
                                <input type="text" class="form-control" id="kota" name="kota" value="<?= $row['kota'] ?>">
                              </div>
                              <div class="mb-3">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $row['provinsi'] ?>">
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
                    <div class="modal fade" id="hapusDataLokasi<?= $row['id_alamat'] ?>" tabindex="-1" aria-labelledby="hapusDataLokasi<?= $row['id_alamat'] ?>Label" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="hapusDataLokasi<?= $row['id_alamat'] ?>Label">
                              Hapus Lokasi
                            </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form method="POST" action="page.php?mod=deleteLokasi">
                            <div class="modal-body">
                              <input type="text" class="form-control" id="id_alamat" name="id_alamat" value="<?= $row['id_alamat'] ?>" hidden="true">
                              <div class="mb-3">
                                <h4>Konfirmasi hapus data lokasi</h4>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Hapus</button>
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

<!-- Import Bootstrap and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="../../src/admin/js/paketan.js"></script>
