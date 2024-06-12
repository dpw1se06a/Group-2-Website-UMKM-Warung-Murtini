<?php include "../mari_makan/_component/header.php"; ?>

<main>

    <div class="container-md">
        <div class="pesansekarang">
            <div class="row-menu">
                <?php
                $sql = "SELECT * FROM marimakan";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-md-3">
                            <div class="card">
                                <img src="image/<?php echo $row["gambar"] ?>" class="card-img-top" style="" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $row["judul"] ?></h4>
                                    <p class="card-text">
                                        <?php echo $row["isi"] ?>
                                    </p>
                                    <a href="<?php echo $row['url'] ?>"><button class="pesand-button">Pesan disini!</button></a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "No data";
                }
                ?>
            </div>
        </div>
    </div>

</main>

<?php include "../mari_makan/_component/footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
