<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='login/index.php'</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Poli Klinik | Dashboard</title>
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="assets/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php include 'includes/navbar.php'; ?>

    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-sm d-flex flex-wrap">
                <?php
                $barang = $koneksi->query("SELECT barang.nama AS nama_barang, barang.id_barang , 
            barang.stok, barang.kode_barang, kategori.nama AS nama_kategori FROM barang JOIN kategori ON kategori.id_kategori = barang.kategori_id");
                ?>
                <?php while ($data = $barang->fetch_assoc()) { ?>
                    <div class="card mr-3 mb-3" style="width: 16rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data['kode_barang']; ?> - <?php echo $data['nama_barang']; ?></h5>
                            <p class="card-text"><?php echo $data['nama_kategori']; ?></p>
                            <p class="card-text">Stok: <?php echo $data['stok']; ?></p>
                            <a href="/transaksi-peminjaman/transaksi_tambah.php?id_barang=<?php echo $data['id_barang']; ?>" class="btn btn-primary">Pinjam</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/Chart.min.js"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>