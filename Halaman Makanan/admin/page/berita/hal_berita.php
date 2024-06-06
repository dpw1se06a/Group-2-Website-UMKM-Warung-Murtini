<?php include "_component/header.php"; ?>
<?php include "../config/koneksi.php"; ?>

<section>
    <div class="container">
        <div class="row">
            <h2 style="text-align: center;">Berita</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                $sql = "SELECT * FROM berita";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id_berita = $row["id_berita"];
                        ?>
                        <div class="col">
                            <div class="card h-100">
                                <img src="<?php echo $row["gambar"]; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row["judul"]; ?></h5>
                                    <p class="card-text"><?php echo mb_strimwidth($row["konten"], 0, 100, '...') ?></p>
                                    <a class="btn btn-primary"
                                        href="page.php?mod=berita&id=<?php echo $id_berita ?>">Selengkapnya</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-body-secondary"><?php echo $row["created_at"]; ?></small>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php include "_component/footer.php"; ?>