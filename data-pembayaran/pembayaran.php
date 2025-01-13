<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION["jabatan"])) {
    echo "<script>location='../login/index.php'</script>";
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
    <title>Poli Klinik | Kasir Pembayaran</title>
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
        <div id="layoutSidenav_content" class="bg-white text-dark">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Data Kasir Pembayaran</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Kasir Pembayaran</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-9">
                                    <i class="fas fa-table mr-1 mt-2"></i>
                                    Tabel Kasir Pembayaran
                                </div>
                                <div class="col-md-3">
                                    <a href="pembayaran_tambah.php" class="btn-success btn px-3 font-weight-bold ml-5">
                                        <i class="fas fa-plus"></i> Tambah Pembayaran
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Bayar</th>
                                            <th>Nama</th>
                                            <th>Kode Resep</th>
                                            <th>Total</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Kembalian</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $ambil = $koneksi->query("SELECT * FROM tb_pembayaran a
                                            JOIN tb_resep b ON a.id_resep = b.id_resep
                                            JOIN tb_pemeriksaan c ON b.id_pemeriksaan = c.id_pemeriksaan
                                            JOIN tb_pendaftaran d ON c.id_pendaftaran = d.id_pendaftaran
                                            JOIN tb_pasien e ON d.id_pasien = e.id_pasien"); ?>
                                        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $pecah['kd_pembayaran']; ?></td>
                                                <td><?php echo $pecah['nama_pasien']; ?></td>
                                                <td><?php echo $pecah['kd_resep']; ?></td>
                                                <td><?php echo $pecah['total_pembayaran']; ?></td>
                                                <td><?php echo $pecah['jumlah_bayar']; ?></td>
                                                <td><?php echo $pecah['kembalian']; ?></td>
                                                <td><?php echo $pecah['tgl_pembayaran']; ?></td>
                                                <td>
                                                    <?php if ($pecah['status_pembayaran'] == 0) { ?>
                                                        <span class="badge badge-danger p-2"></span>
                                                    <?php } elseif ($pecah['status_pembayaran'] == 1) { ?>
                                                        <span class="badge badge-success p-2">Lunas</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-danger p-2">
                                                            <i class="fas fa-minus"></i>
                                                        </span>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form class="mb-2" action="cetak_pembayaran.php" method="POST">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Dari</label>
                                        <input type="date" class="form-control" name="tanggal_1">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Sampai</label>
                                        <input type="date" class="form-control" name="tanggal_2">
                                    </div>  
                                    <button type="submit" class="btn btn-primary font-weight-bold" style="height: 37px; margin-top: 33px;"> Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
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