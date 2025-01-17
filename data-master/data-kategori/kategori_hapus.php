<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
}

$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id_kategori]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM kategori WHERE id_kategori='$_GET[id_kategori]'");

echo "<script>alert('Data Kategori Terhapus!');</script>";
echo "<script>location='/data-master/data-kategori/kategori.php'</script>";

?>