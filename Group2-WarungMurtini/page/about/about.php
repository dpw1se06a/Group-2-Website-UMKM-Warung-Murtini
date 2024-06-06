<!-- Link css -->
<link rel="stylesheet" href="../src/css/about.css">

<main>
  <?php 
  include '../config/connect.php'; 
  ?>
  <div class="text-center">
    <!-- Full-width images with number and caption text -->
    <div class="w3-display-container mySlides">
      <img src="../src/img/lokasi warung.png" style="width:100%">
      <div class="w3-display-bottomleft w3-container w3-padding-16 w3-black">
      </div>
    </div>

    <?php
    $query = "SELECT * FROM about";
    $queryexec = mysqli_query($conn, $query);
    if (mysqli_num_rows($queryexec)) {
      while ($row = mysqli_fetch_array($queryexec)) {
        $judul = $row["judul"];
        $konten = htmlspecialchars_decode($row["konten"], ENT_QUOTES);
    ?>
        <section class="tentang-kami">
          <h3><?php echo $judul; ?></h3>
          <p><?php echo nl2br($konten); ?></p>
        </section>
    <?php
      }
    } else {
      echo 'Belum ada konten';
    }
    ?>
  </div>

  <div class="peta">
    <h3 style="text-align: center; color: white;">Lokasi Warung</h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.315039781485!2d109.2483559841311!3d-7.430347254050838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655f636669ad0f%3A0xb31ec5340965dd91!2sWarung%20Murtini!5e0!3m2!1sen!2sid!4v1711535239366!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</main>