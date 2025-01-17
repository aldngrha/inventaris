<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
}

$ambil = $koneksi->query("SELECT * FROM ruangan_asal WHERE id_ruangan_asal='$_GET[id_ruangan_asal]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM ruangan_asal WHERE id_ruangan_asal='$_GET[id_ruangan_asal]'");

echo "<script>alert('Data Ruangan Terhapus!');</script>";
echo "<script>location='/data-master/ruangan-asal/asal.php'</script>";

?>