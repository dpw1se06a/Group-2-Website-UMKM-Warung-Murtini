<?php
session_start();
include '../../../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id_pesanan'];

    echo $id . "<br>";
    $query = "DELETE FROM pesanan WHERE id_pesanan = $id";

    if ($conn->query($query)) {
        ?>
<script>
window.location = "../../../page.php?mod=dashboard";
</script>
<?php
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>