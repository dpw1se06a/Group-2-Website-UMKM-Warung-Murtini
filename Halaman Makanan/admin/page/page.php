<?php

if ($_GET['mod'] == 'pengguna') {
    include "pengguna/pengguna.php";

} else if ($_GET['mod'] == 'tambah_pengguna') {
    include "pengguna/tambah_pengguna.php";

} else if ($_GET['mod'] == 'hal_berita') {
    include "berita/hal_berita.php";

} else if ($_GET['mod'] == 'dashboard') {
    include "dashboard/dashboard.php";

} else if ($_GET['mod'] == 'tambah_user') {
    include "user/tambah_user.php";

} else if ($_GET['mod'] == 'data_user') {
    include "user/data_user.php";

} else if ($_GET['mod'] == 'makanan') {
    include "menu_utama/makanan/makanan.php";

} else if ($_GET['mod'] == 'paketan') {
    include "user/data_user.php";

} else if ($_GET['mod'] == 'makanan1') {
    include "../../makanan.php";

}

?>