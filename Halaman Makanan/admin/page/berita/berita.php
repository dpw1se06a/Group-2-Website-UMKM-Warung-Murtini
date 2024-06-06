<?php include "_component/header.php"; ?>
<?php include "../config/koneksi.php"; ?>

<?php
if (isset($_GET['id'])) {
    $id_berita = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM berita WHERE id_berita = $id_berita";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        ?>
<br><br>
<div class="judul">
    <h2>
        <?php echo $row["judul"] ?>
    </h2>
</div>
<br><br>
<div class="gambar">
    <img src="<?php echo $row["gambar"]; ?>" style="width: 100%; height: 100%" alt="...">
</div>
<?php }
} ?>
</section>


<section class="container">
    <div class="row">
        <?php
        if (isset($_GET['id'])) {
            $id_berita = mysqli_real_escape_string($conn, $_GET['id']);

            $sql = "SELECT * FROM berita WHERE id_berita = $id_berita";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                ?>
        <br><br>
        <div class="konten">
            <?php
                    $paragraf = explode("\n", $row['konten']);
                    foreach ($paragraf as $p) {
                        echo "<p style='text-align: justify-content; text-justify: inter-word;'>$p</p>";
                    }
            }
        }
        ?>
        </div>
    </div>
</section>

<?php include "_component/footer.php"; ?>