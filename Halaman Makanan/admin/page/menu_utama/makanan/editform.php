<?php 
session_start();
include "_component/header.php";
include '../config/koneksi.php';

if (isset($_POST['id_makanan'], $_POST['nama_makanan'], $_POST['deskripsi'], $_POST['harga'])) {
    $id_makanan = $_POST['id_makanan'];
    $nama_makanan = $_POST['nama_makanan'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Check if a new image is uploaded
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = $_FILES['gambar']['tmp_name'];

        // Read the binary data from the uploaded file
        $imageData = file_get_contents($gambar);
    } else {
        // If no new image is uploaded, keep the existing image
        // Assuming the existing image path is stored in the database
        // You may need to adjust this part based on your database structure
        $query = "SELECT gambar FROM makanan WHERE id_makanan = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id_makanan);
        $stmt->execute();
        $stmt->bind_result($gambar);
        $stmt->fetch();
        $stmt->close();
    }

    // Prepare the SQL statement for updating
    $query = "UPDATE makanan SET nama_makanan = ?, deskripsi = ?, harga = ?";
    // Add the gambar column only if a new image is uploaded
    if (isset($imageData)) {
        $query .= ", gambar = ?";
    }
    $query .= " WHERE id_makanan = ?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($query);
    if (isset($imageData)) {
        $stmt->bind_param('ssisi', $nama_makanan, $deskripsi, $harga, $imageData, $id_makanan);
    } else {
        $stmt->bind_param('ssii', $nama_makanan, $deskripsi, $harga, $id_makanan);
    }

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: ../../../page.php?mod=dashboard");
        exit;
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

} else {
    echo "Required data is missing.";
}
?>

?>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Halaman Edit</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">General Form</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Makanan</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="menu_utama/makanan/proses/proses_ubah.php">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama_makanan">Nama Makanan</label>
                                            <input type="text" class="form-control" id="nama_makanan"
                                                name="nama_makanan" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" id="summernote" name="deskripsi"
                                                required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga" class="form-label">Harga</label>
                                            <input type="number" class="form-control" id="harga" name="harga">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control" id="gambar" name="gambar">
                                            <label class="input-group-text" for="gambar">Upload</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
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