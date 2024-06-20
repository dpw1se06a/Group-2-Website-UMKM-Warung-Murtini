<?php

if ($_GET['mod'] == 'dashboard') {
    include "makanan/makanan.php";

} else if ($_GET['mod'] == 'makanan') {
    include "makanan/makanan.php";

} else if ($_GET['mod'] == 'hal_berita') {
    include "berita/hal_berita.php";

} else if ($_GET['mod'] == 'login') {
    include "proses-login/login.php";

} else if ($_GET['mod'] == 'technology') {

} else if ($_GET['mod'] == 'sport') {

}

?>