<?php include "_component/header.php"; ?>
<?php require_once ("../config/koneksi.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data User</li>
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
                        <div class="card-header">
                            <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Nama</th>
                                        <th>No. Whatapps</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../config/koneksi.php';
                                    // using SQL query to display user data
                                    $query = "SELECT * FROM user";
                                    $datas = $conn->query($query);
                                    foreach ($datas as $data):
                                        ?>
                                    <tr>
                                        <td><?= $data['email'] ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['no_hp'] ?></td>
                                        <td><?= $data['password'] ?></td>
                                        <td>
                                            <button type=" button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editDataModal<?= $data['user_id'] ?>">Edit</button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#hapusDataModal<?= $data['user_id'] ?>">Hapus</button>
                                        </td>
                                    </tr>
                                    <!-- Modal ubah data -->
                                    <div class="modal fade" id="editDataModal<?= $data['user_id'] ?>" tabindex="-1"
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
                                                <form method="POST" action="user/proses/proses_ubah.php">
                                                    <div class=" modal-body">
                                                        <input type="hidden" name="user_id"
                                                            value="<?= $data['user_id'] ?>">
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input required type="text" class=" form-control" id="email"
                                                                name="email" value="<?= $data['email'] ?>">
                                                        </div>
                                                        <div class=" form-group">
                                                            <label for="nama">Nama</label>
                                                            <input required type="text" class="form-control" id="nama"
                                                                name="nama" value="<?= $data['nama'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_hp">no_hp</label>
                                                            <input required type="varchar" class="form-control"
                                                                id="no_hp" name="no_hp" value="<?= $data['no_hp'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input required type="text" class=" form-control"
                                                                id="password" name="password"
                                                                value="<?= $data['password'] ?>">
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
                                    <div class="modal fade" id="hapusDataModal<?= $data['user_id'] ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="hapusDataModalLabel<?= $data['user_id'] ?>"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="hapusDataModalLabel<?= $data['user_id'] ?>">
                                                        Konfirmasi Penghapusan</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
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
                                                    <a href="user/proses/proses_hapus.php?id=<?= $data['user_id'] ?>"
                                                        class="btn btn-danger">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
</div>
<?php include "_component/footer.php"; ?>