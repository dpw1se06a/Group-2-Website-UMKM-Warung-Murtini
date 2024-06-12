<?php include "_component/header.php";?>
<?php include "../config/koneksi.php";?>

<body>

<section class="container">
  <div class="row">
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="3000">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				<?php
				$sql = "SELECT * FROM slider";
				$result = mysqli_query($conn, $sql);
				$isActive = true;

				if (mysqli_num_rows($result) > 0) {
					while ($row = $result->fetch_assoc()) {
				?>
						<div class="carousel-item <?php if ($isActive) { echo 'active'; $isActive = false; } ?>">
							<img src="<?php echo $row['url'] ?>" class="d-block w-100" alt="...">
							<div class="carousel-caption d-none d-md-block">
								<h5><?php echo $row['judul'] ?></h5>
								<p><?php echo $row['deskripsi'] ?></p>
							</div>
						</div>
				<?php
					}
				} else {
					echo "0 data";
				}
				?>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
  </div>

    <!-- mari makan -->
		<div class="container_lihat">
			<div class="container_menu">
				<h2>Mari Makan</h2>
				<div class="container_menu_gambar">
					<div class="gambar_container">
            <div class="gambar1"></div>
						<p>Delivery</p>
					</div>
					<div class="gambar_container">
						<div class="gambar2"></div>
						<p>Cetering</p>
					</div>
					<div class="gambar_container">
						<div class="gambar3"></div>
						<p>Makan Ditempat</p>
					</div>

				</div>
			</div>
		</div>
		<!-- Lokasi -->
		<div id="lokasi" class="lokasi padding-atas-2">
			<div class="container" style="max-width: 1400px;">
				<div class="judul-lokasi padding-bawah-2">
					<h1>Lokasi</h1>
				</div>
				<div class="peta">
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.315039781485!2d109.2483559841311!3d-7.430347254050838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655f636669ad0f%3A0xb31ec5340965dd91!2sWarung%20Murtini!5e0!3m2!1sen!2sid!4v1711535239366!5m2!1sen!2sid"
						width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
				<div class="alamat">
					<div class="row">
						<div class="col-md-6">
							<h3>Alamat</h3>
							<h6>Warung Makan Murtini 2</h6>
							<p>Jl. Sidodadi No.1176, RT.02/RW.03, Legok, Purwokerto Kidul, Kec. Purwokerto Sel.,
								Kabupaten Banyumas, Jawa Tengah 53147</p>
						</div>
						<div class="col-md-6">
							<h3>Jam Buka</h3>
							<h6>Senin 09.00–21.00</h6>
							<h6>Selasa 09.00–21.00</h6>
							<h6>Rabu 09.00–21.00 </h6>
							<h6>Kamis 09.00–21.00</h6>
							<h6>Jumat 09.00–21.00</h6>
							<h6>Sabtu 09.00–21.00</h6>
							<h6>Minggu 09.00–21.00</h6>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- Ulasan -->
		<div class="testimoni">
    <!--text-->
    <div class="testimoni-text ">
        <p>Ulasan Pelanggan</p>
    </div>        

    <div class="testimoni-col">
        <!-- testimoni 1 -->
        <div class="testimoni-1">
            <img src="https://cdn1-production-images-kly.akamaized.net/fSUqYsoETboNth8dECbeXZVkt4M=/1200x1200/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3514755/original/091325600_1626677746-Chef_Juna_Rorimpandey.jpeg">
            <div>
                <p>Saya suka dengan pelayanan dan menu tempat ini. Saya sangat merekomendasikan layanan mereka kepada teman yang mencari tempat makan terbaik.</p>
                <h3>Juna</h3>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
        </div>

        <!-- testimoni 2 -->
        <div class="testimoni-2">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSs-A8VsOy-x8Wj9FY43cT6BQcgDc55vInNsKkxbnB_PLAJP0uVL_8h29SFKePlbuvvzGc&usqp=CAU">
            <div>
                <p>Pelayanan mereka dan komitmen terhadap cita rasa makanan nya sungguh luar biasa. Saya sangat puas dengan pelayanan dan hidangan tempat ini.</p>
                <h3>Olivia</h3>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
    </div>
</div>
	</div>
  </section>
  
</body>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <?php include "_component/footer.php";?>