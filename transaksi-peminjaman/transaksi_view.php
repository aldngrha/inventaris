<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../login/index.php'</script>";
    exit();
}

$ambil = $koneksi->query("SELECT transaksi.status_peminjaman, transaksi.jumlah, transaksi.id_transaksi,
users.username, ruangan_tujuan.nama
AS nama_ruangan_tujuan, barang.nama AS nama_barang, transaksi.created_at FROM transaksi
LEFT JOIN users ON transaksi.user_id = users.id_users
LEFT JOIN ruangan_tujuan ON transaksi.ruangan_tujuan_id = ruangan_tujuan.id_ruangan
LEFT JOIN barang ON transaksi.barang_id = barang.id_barang");

$pecah = $ambil->fetch_assoc()

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inventaris | Data Transaksi Peminjaman</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="../assets/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php include '../includes/navbar.php'; ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include '../includes/sidebar.php'; ?>
        </div>
        <div id="layoutSidenav_content" class="bg-white container">
            <div class="card mt-5 ml-5" style="width: 100%;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Detail Peminjaman</h5>
                    <div class="d-flex flex-row">
                        <p class="mr-2">Tanggal Pinjam</p>
                        <p class="mr-2"></p>
                        <p class="card-text"><?php echo $pecah['created_at']; ?></p>
                    </div>
                    <div class="d-flex flex-row">
                        <p class="mr-2">Nama Barang</p>
                        <p class="mr-2"></p>
                        <p class="card-text"><?php echo $pecah['nama_barang']; ?></p>
                    </div>
                    <div class="d-flex flex-row">
                        <p class="mr-2">Nama Peminjam</p>
                        <p class="mr-2"></p>
                        <p class="card-text"><?php echo $pecah['username']; ?></p>
                    </div>
                    <div class="d-flex flex-row">
                        <p class="mr-2">Jumlah</p>
                        <p class="mr-2"></p>
                        <p class="card-text"><?php echo $pecah['jumlah']; ?></p>
                    </div>
                    <div class="d-flex flex-row">
                        <p class="mr-2">Ruangan Tujuan</p>
                        <p class="mr-2"></p>
                        <p class="card-text"><?php echo $pecah['nama_ruangan_tujuan']; ?></p>
                    </div>
                    <td>
                        <?php if ($pecah['status_peminjaman'] == "ditolak") { ?>
                            <span class="badge badge-danger p-2">Ditolak</span>
                        <?php } elseif ($pecah['status_peminjaman'] == "selesai") { ?>
                            <span class="badge badge-success p-2">Selesai</span>
                        <?php } elseif ($pecah['status_peminjaman'] == "sedang dipinjam") { ?>
                            <span class="badge badge-primary p-2">Sedang dipinjam</span>   
                        <?php } elseif ($pecah['status_peminjaman'] == "hilang") { ?>
                            <span class="badge badge-danger p-2">Hilang</span> 
                        <?php } else { ?>
                            <span class="badge badge-danger p-2">
                                Menunggu
                            </span>
                        <?php } ?>
                    </td>
                </div>
                <?php
                    if($pecah['status_peminjaman'] == "menunggu") { ?>
                    <form method="post" enctype="multipart/form-data">
                        <button class="btn btn-success" name="terima">Terima</button>
                        <button class="btn btn-danger" name="tolak">Tolak</button>
                    </form>  
                   <?php } else if($pecah['status_peminjaman'] == "sedang dipinjam") { ?>
                    <form method="post" enctype="multipart/form-data">
                        <button class="btn btn-success" name="selesai">Selesai</button>
                        <button class="btn btn-danger" name="hilang">Hilang</button>
                    </form>  
                    <?php } ?>
                <?php
                if (isset($_POST['terima'])) {
                    $koneksi->query("UPDATE transaksi SET status_peminjaman='sedang dipinjam', update_at=now()
                      WHERE id_transaksi='$_GET[id_transaksi]'");
                      echo "<script>alert('Peminjaman Di Terima');</script>";
                      echo "<script>location='/transaksi-peminjaman/transaksi.php'</script>";
                } else if(isset($_POST['tolak'])){
                    $koneksi->query("UPDATE transaksi SET status_peminjaman='ditolak', update_at=now()
                      WHERE id_transaksi='$_GET[id_transaksi]'");
                      echo "<script>alert('Peminjaman Di Tolak');</script>";
                      echo "<script>location='/transaksi-peminjaman/transaksi.php'</script>";
                } else if(isset($_POST['selesai'])){
                    $koneksi->query("UPDATE transaksi SET status_peminjaman='selesai', update_at=now()
                      WHERE id_transaksi='$_GET[id_transaksi]'");
                      echo "<script>alert('Barang Sudah Dikembalikan');</script>";
                      echo "<script>location='/transaksi-peminjaman/transaksi.php'</script>";
                } else if(isset($_POST['hilang'])){
                    $koneksi->query("UPDATE transaksi SET status_peminjaman='hilang', update_at=now()
                      WHERE id_transaksi='$_GET[id_transaksi]'");
                      echo "<script>alert('Peminjaman Di Tolak');</script>";
                      echo "<script>location='/transaksi-peminjaman/transaksi.php'</script>";
                }
                ?>
            </div>
            <?php include '../includes/footer.php'; ?>
        </div>
    </div>
    <script src="../assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/Chart.min.js"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/demo/datatables-demo.js"></script>

</body>

</html>