<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../login/index.php'</script>";
    exit();
}

$ambil = $koneksi->query("SELECT barang.nama AS nama_barang, barang.id_barang, barang.stok, barang.kode_barang, 
kategori.nama AS nama_kategori, ruangan_asal.nama AS nama_ruangan FROM barang 
JOIN kategori ON kategori.id_kategori = barang.kategori_id
JOIN ruangan_asal ON ruangan_asal.id_ruangan_asal = barang.ruangan_asal_id
            WHERE id_barang='$_GET[id_barang]'");
$barang = $ambil->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Poli Klinik | Data Master - Obat</title>
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link href="../../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="../../assets/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php include '../includes/navbar.php'; ?>
    <div class="container" style="margin-top: 100px;">
        <div class="card" style="widh: 100%;">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $barang['kode_barang']; ?> - <?php echo $barang['nama_barang']; ?></h5>
                <p class="card-text"><?php echo $barang['nama_kategori']; ?></p>
                <p class="card-text">Stok: <?php echo $barang['stok']; ?></p>
                <p class="card-text">Ruangan Asal: <?php echo $barang['nama_barang']; ?></p>

                <form class="ml-4" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label>Jumlah Barang</label>
                            <input type="text" class="form-control" name="jumlah" placeholder="1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label>Ruangan Tujuan</label>
                            <select class="custom-select" name="id_ruangan">
                                <option value="0" disabled selected>Pilih Ruangan Tujuan</option>
                                <?php
                                $ambil2 = $koneksi->query("SELECT * FROM ruangan_tujuan");
                                $pecah2 = $ambil2->fetch_assoc();
                                ?>

                                <?php foreach ($ambil2 as $poli) : ?>
                                    <option value="<?php echo $poli['id_ruangan']; ?>"><?php echo $poli['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <a href="/index.php" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-success font-weight-bold px-3 mr-2" name="pinjam">Pinjam</button>
                </form>
                <?php
                if (isset($_POST['pinjam'])) {
                    if ($_POST['id_ruangan'] == 0) {
                        echo "<script>alert('Barang Tujuan Belum Dipilih!');</script>";
                    } else {
                        $koneksi->query("INSERT INTO transaksi (barang_id, user_id, status_peminjaman, jumlah, ruangan_tujuan_id, created_at)
                                        VALUES ('$barang[id_barang]', '$_SESSION[user_id]', 'menunggu', '$_POST[jumlah]', '$_POST[id_ruangan]', now())");

                        echo "<script>alert('Data Mengajukan Peminjaman!');</script>";
                        echo "<script>location='/index.php'</script>";
                    }
                }

                ?>
            </div>
        </div>
        <script src="../../assets/js/jquery-3.5.1.slim.min.js"></script>
        <script src="../../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../../assets/js/scripts.js"></script>
        <script src="../../assets/js/Chart.min.js"></script>
        <script src="../../assets/demo/chart-area-demo.js"></script>
        <script src="../../assets/demo/chart-bar-demo.js"></script>
        <script src="../../assets/js/jquery.dataTables.min.js"></script>
        <script src="../../assets/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../assets/demo/datatables-demo.js"></script>
</body>

</html>