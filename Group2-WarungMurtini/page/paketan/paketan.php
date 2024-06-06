<!-- Link css -->
<link rel="stylesheet" href="../../src/css/paketan.css">

<div class="container">
		<div id="menu" class="menu padding-atas-2">
			<div class="container" style="max-width: 1500px;">
				<div class="judul-menu padding-bawah-2">
					<h1 style="text-align: center;">Paketan</h1>
				</div>
				<div class="isi-menu">
					<div class="row">
						<?php
            include '../config/connect.php';
						$sql = "SELECT * FROM paketan";
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								// menampilkan database
						?>
								<div class="col-md-4 mb-4">
									<div class="card h-100">
										<div class="card-image" style="padding: 18px 18px 0 18px;">
											<img src="<?php echo $row['gambar'] ?>" class="card-img-top" alt="...">
										</div>
										<div class="card-body">
											<h4><?php echo $row["nama_paketan"] ?></h4>
											<p><?php echo $row["deskripsi"] ?></p>
											<h6><?php echo $row["harga"] ?></h6>
										</div>
									</div>
								</div>
						<?php
							}
						} else {
							echo "0 data";
						}
						mysqli_close($conn);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>