<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
}else if ($_SESSION["role_id"] == "guru") {
    echo "<script>location='/index.php'</script>";
    exit();
}

$ambil = $koneksi->query("SELECT * FROM ruangan_tujuan WHERE id_ruangan='$_GET[id_ruangan]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM ruangan_tujuan WHERE id_ruangan='$_GET[id_ruangan]'");

echo "<script>alert('Data Ruangan Terhapus!');</script>";
echo "<script>location='/data-master/ruangan-tujuan/tujuan.php'</script>";

?>