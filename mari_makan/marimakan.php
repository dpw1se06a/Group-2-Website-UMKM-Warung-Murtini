<?php
include '../config/connect.php';
include 'edit/tambah.php';
include 'edit/edit.php';
include 'edit/hapus.php';

function bubbleSort_ASC($data)
{
    $n = count($data);
    for ($i = 0; $i < $n; $i++) {
        for ($j = $n - 1; $j > $i; $j--) {
            if ($data[$j]['url'] < $data[$j - 1]['url']) {
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
            if ($data[$j]['url'] > $data[$j - 1]['url']) {
                $temp = $data[$j];
                $data[$j] = $data[$j - 1];
                $data[$j - 1] = $temp;
            }
        }
    }
    return $data;
}

$query = "SELECT * FROM marimakan";
$result = mysqli_query($conn, $query);
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mari Makan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="page.php?mod=dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Mari makan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="card">
        <div class="col m-1">
            <div class="input-group">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataJasa">
                Tambah Data
            </button>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">gambar</th>
                    <th scope="col">judul</th>
                    <th scope="col">isi</th>
                    <th scope="col" style="width: 100px;">url</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><img src="../../page/mari_makan/image/<?php echo $row["gambar"] ?>" width="400px" height="150px"></td>
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['isi'] ?></td>
                        <td style="word-wrap: break-word; max-width: 100px;"><?= $row['url'] ?></td>
                        <td>
                            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editDataJasa<?= $row['id_marimakan'] ?>' data-id='<?= $row['id_marimakan'] ?>' data-judul='<?= $row['judul'] ?>' data-isi='<?= $row['isi'] ?>' data-url='<?= $row['url'] ?>' data-gambar='<?= $row['gambar'] ?>'>Edit</button>
                            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#hapusDataJasa<?= $row['id_marimakan'] ?>'>Hapus</button>
                        </td>
                    </tr>

                    <div class='modal fade' id='hapusDataJasa<?= $row['id_marimakan'] ?>' tabindex='-1' aria-labelledby='editDataJasa<?= $row['id_marimakan'] ?>Label' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='editDataJasa<?= $row['id_marimakan'] ?>Label'>
                                        Hapus <?= $row['judul'] ?>
                                    </h1>
                                </div>
                                <form method='POST' action='page.php?mod=deleteMariMakan'>
                                    <div class='modal-body'>
                                        <input type='text' class='form-control' id='id_marimakan' name='id_marimakan' value='<?= $row['id_marimakan'] ?>' hidden='true'>
                                        <div class='mb-3'>
                                            <h4>Konfirmasi hapus data mari makan</h4>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                        <button type='submit' class='btn btn-primary'>Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class='modal fade' id='editDataJasa<?= $row['id_marimakan'] ?>' tabindex='-1' aria-labelledby='editDataJasa<?= $row['id_marimakan'] ?>Label' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='editDataJasa<?= $row['id_marimakan'] ?>Label'>
                                        Edit <?= $row['judul'] ?>
                                    </h1>
                                </div>
                                <form method='POST' action='page.php?mod=updateMariMakan'>
                                    <div class='modal-body'>
                                        <input type='text' class='form-control' id='id_marimakan' name='id_marimakan' value='<?= $row['id_marimakan'] ?>' hidden='true'>
                                        <div class='mb-3'>
                                            <label for='judul' class='form-label'>Judul</label>
                                            <input type='text' class='form-control' id='judul' name='judul' value='<?= $row['judul'] ?>'>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='isi' class='form-label'>isi</label>
                                            <textarea class='form-control' id='isi' name='isi'><?= $row['isi'] ?></textarea>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='url' class='form-label'>url</label>
                                            <input type='text' class='form-control' id='url' name='url' value='<?= $row['url'] ?>'>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='gambar' class='form-label'>Gambar</label>
                                            <input type='text' class='form-control' id='gambar' name='gambar' value='<?= $row['gambar'] ?>'>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                        <button type='submit' class='btn btn-primary'>Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="tambahDataJasa" tabindex="-1" aria-labelledby="tambahDataJasaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahDataJasaLabel">
                    Tambah Data
                </h1>
            </div>
            <form method="POST" action="page.php?mod=addMariMakan">
                <div class="modal-body">
                    <div class="mb-3">
                        <label form="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea class="form-control" id="isi" name="isi" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label form="url" class="form-label">url</label>
                        <input type="text" class="form-control" id="url" name="url">
                    </div>
                    <div class="mb-3">
                        <label form="gambar" class="form-label">Gambar</label>
                        <input type="text" class="form-control" id="gambar" name="gambar">
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
