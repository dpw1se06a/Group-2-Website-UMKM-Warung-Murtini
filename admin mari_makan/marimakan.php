<?php
include '../config/connect.php';
include 'edit/tambah.php';
include 'edit/edit.php';
include 'edit/hapus.php';

// Function to perform selection sort
function selectionSort($data, $order = 'ASC') {
    $n = count($data);
    for ($i = 0; $i < $n - 1; $i++) {
        $index = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($order == 'ASC') {
                if (strcasecmp($data[$j]['judul'], $data[$index]['judul']) < 0) {
                    $index = $j;
                }
            } else {
                if (strcasecmp($data[$j]['judul'], $data[$index]['judul']) > 0) {
                    $index = $j;
                }
            }
        }
        $temp = $data[$index];
        $data[$index] = $data[$i];
        $data[$i] = $temp;
    }
    return $data;
}

$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

// Fetch data from the database
$query = "SELECT * FROM marimakan";
$result = mysqli_query($conn, $query);
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Sort the data based on the selected order
$sortedData = selectionSort($data, $order);
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
    <div class="row justify-content-between">
        <div class="col m-1">
            <div class="input-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataJasa">Tambah Data</button>
            </div>
        </div>

        <div class="col m-1">
        <form method="GET" action="page.php" class="ml-3">
            <div class="input-group">
                <label for="order" class="input-group-text">Sort By:</label>
                    <input type="hidden" name="mod" value="marimakan">
                    <select name="order" id="order" onchange="this.form.submit()" class="form-select">
                        <option value="0" <?php if($order == '0') echo 'selected'; ?>>Default</option>
                        <option value="ASC" <?php if ($order == 'ASC') echo 'selected'; ?>>Sort A-Z</option>
                        <option value="DESC" <?php if ($order == 'DESC') echo 'selected'; ?>>Sort Z-A</option>
                    </select>
                </form>
            </div>
            </div>
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
                <?php foreach ($sortedData as $row) : ?>
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
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- MODAL TAMBAH -->
    <div class="modal fade" id="tambahDataJasa" tabindex="-1" aria-labelledby="tambahDataJasaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahDataJasaLabel">Tambah Data</h1>
                </div>
                <form method="POST" action="page.php?mod=addMariMakan">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul">
                        </div>
                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi</label>
                            <textarea class="form-control" id="isi" name="isi"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">URL</label>
                            <input type="text" class="form-control" id="url" name="url">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
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
</div>
