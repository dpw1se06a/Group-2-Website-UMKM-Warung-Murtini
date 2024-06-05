<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<title>Halaman Paketan</title>
	<link rel="stylesheet" href="paketan.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-#ffffff" style="height: 100px;">
		<div class="container-fluid" style="max-width: 1800px;">
			<a class="navbar-brand" href="#">
				<img src="logo.png" alt="" width="150" height="150">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Makan Apa?</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Lokasi</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Mari Makan
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Delivery</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Catering</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Makan Ditempat</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="">Ulasan</a>
					</li>
				</ul>
				<form class="d-flex">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>

	<div class="container">
		<div id="menu" class="menu padding-atas-2">
			<div class="container" style="max-width: 1500px;">
				<div class="judul-menu padding-bawah-2">
					<h1 style="text-align: center;">Paketan</h1>
				</div>
				<div class="isi-menu">
					<div class="row">
						<?php
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

	<footer class="footer">
		<div class="footer-left">
			<h3>Warung Murtini</h3>
			<div class="credit-cards">
				<img src="logo.png" alt="">
			</div>
			<p class="footer-copyright">2022 Kelompok2</p>
		</div>

		<div class="footer-center">
			<div>
				<i class="fa fa-map-marker"></i>
				<p><span>Indonesia</span> Jawa Tengah, Purwokerto</p>
			</div>
			<div>
				<i class="fa fa-phone"></i>
				<p>+62 077-777-77</p>
			</div>
			<div>
				<i class="fa fa-envelope"></i>
				<p><a href="#">support@gmail.com</a></p>
			</div>
		</div>

		<div class="footer-right">
			<p class="footer-about">
				<span>About</span>
				Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis, facilis fugit consequuntur reiciendis
				laborum quo earum corrupti excepturi ex non voluptatem officia explicabo quia numquam. Quos quis
				temporibus fuga necessitatibus.
			</p>

			<div class="footer-media">
				<a href="#"><i class="fa fa-youtube"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
			</div>
		</div>

	</footer>

	<script>
		function whatapps() {
			var url = "http://wa.me//6281359341536";
			window.open(url, '_blank');
		}
	</script>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>