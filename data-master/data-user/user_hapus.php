<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='login/index.php'</script>";
    exit();
}

$ambil = $koneksi->query("SELECT * FROM users WHERE id_users='$_GET[id_users]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM users WHERE id_users='$_GET[id_users]'");

echo "<script>alert('Data User Terhapus!');</script>";
echo "<script>location='/data-master/data-user/user.php'</script>";

?>