<?php include "_component/header.php"; ?>
<?php include "../config/koneksi.php"; ?>

<section class="container">
    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <?php
                $sql = "SELECT * FROM gambar";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                <div class="carousel-item active">
                    <img src="<?php echo $row["url"] ?>" class="d-block w-100" alt="...">
                </div>
                <?php
                        // echo "kolom1;" . $row["judul"] . "- kolom2;" . $row["konten"] . "</br>";
                    }
                } else {
                    echo "0 data";
                }
                ?>
            </div>
            <button class=" carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
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