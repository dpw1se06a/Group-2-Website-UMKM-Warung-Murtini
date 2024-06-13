<?php
include '_component/header.php';

// Set $mod value and retrieve it from URL
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home'; // Set default value for $mod

switch ($mod) {
        // CASE Navbar
    case 'paketan':
        include 'paketan/paketan.php';
        break;

    case 'about':
        include 'about/about.php';
        break;
        // Add new case here
        // .................
        // .................

}

include '_component/footer.php';
