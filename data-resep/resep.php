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
    <title>Poli Klinik | Resep Obat</title>
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
                    <h1 class="mt-4">Data Resep Obat</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Resep Obat</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-9">
                                    <i class="fas fa-table mr-1 mt-2"></i>
                                    Tabel Resep Obat
                                </div>
                                <div class="col-md-3">
                                    <a href="resep_tambah.php" class="btn-success btn px-3 font-weight-bold ml-5">
                                        <i class="fas fa-plus"></i> Tambah Resep Obat
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Resep</th>
                                            <th>Kode Pemeriksaan</th>
                                            <th>Nama Pasien</th>
                                            <th>Poli</th>
                                            <th>Tanggal Resep</th>
                                            <th>Aksi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $ambil = $koneksi->query("SELECT * FROM tb_resep a
                                            JOIN tb_pemeriksaan b ON a.id_pemeriksaan = b.id_pemeriksaan
                                            JOIN tb_pendaftaran c ON b.id_pendaftaran = c.id_pendaftaran
                                            JOIN tb_poli d ON c.id_poli = d.id_poli
                                            JOIN tb_pasien e ON c.id_pasien = e.id_pasien"); ?>
                                        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $pecah['kd_resep']; ?></td>
                                                <td><?php echo $pecah['kd_pemeriksaan']; ?></td>
                                                <td><?php echo $pecah['nm_pasien']; ?></td>
                                                <td><?php echo $pecah['nm_poli']; ?></td>
                                                <td><?php echo $pecah['tgl_resep']; ?></td>
                                                <td>
                                                    <?php if ($pecah['status_periksa'] == 0) { ?>
                                                        <a href="resep_view.php?&id_resep=<?php echo $pecah['id_resep']; ?>" class="btn-primary btn-sm btn">
                                                            <i class="fas fa-eye"></i></i>
                                                        </a>
                                                    <?php } elseif ($pecah['status_periksa'] == 1) { ?>
                                                        <a href="resep_view.php?&id_resep=<?php echo $pecah['id_resep']; ?>" class="btn-primary btn-sm btn">
                                                            <i class="fas fa-eye"></i></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="#" class="btn-secondary btn-sm btn">
                                                            <i class="fas fa-minus"></i>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($pecah['status_rsp'] == 0) { ?>
                                                        <span class="badge badge-danger p-2">Belum Bayar</span>
                                                    <?php } elseif ($pecah['status_rsp'] == 1) { ?>
                                                        <span class="badge badge-success p-2">Terbayar</span>
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

                        </div>
                    </div>
                </div>
            </main>
            <?php include '../includes/sidebar.php'; ?>
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