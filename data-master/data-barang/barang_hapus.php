<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
}

$ambil = $koneksi->query("SELECT * FROM barang WHERE id_barang='$_GET[id_barang]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM barang WHERE id_barang='$_GET[id_barang]'");

echo "<script>alert('Data Barang Terhapus!');</script>";
echo "<script>location='/data-master/data-barang/barang.php'</script>";

?>