<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION["role_id"])) {
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
    <title>Poli Klinik | Data Pemeriksaan</title>
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
                    <h1 class="mt-4">Data Transaksi Peminjaman</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Transaksi Peminjaman</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-9">
                                    <i class="fas fa-table mr-1 mt-2"></i>
                                    Tabel Data Transaksi
                                </div>
                                <div class="col-md-3">
                                    <a href="pemeriksaan_tambah.php" class="btn-success btn px-3 font-weight-bold ml-5">
                                        <i class="fas fa-plus"></i> Tambah Data Transaksi
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Nama User</th>         
                                            <th>Nama Barang</th>
                                            <th>Jumlah Barang</th>
                                            <th>Ruangan Asal</th>
                                            <th>Ruangan Tujuan</th>
                                            <th>Aksi</th>
                                            <th>Status</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $ambil = $koneksi->query("SELECT transaksi.status, transaksi.jumlah, transaksi.id_transaksi,
                                            users.username, ruangan_asal.nama AS nama_ruangan_asal, ruangan_tujuan.nama
                                            AS nama_ruangan_tujuan, barang.nama AS nama_barang, transaksi.created_at FROM transaksi
                                            LEFT JOIN users ON transaksi.user_id = users.id_users
                                            LEFT JOIN ruangan_asal ON transaksi.ruangan_asal_id = ruangan_asal.id_ruangan_asal
                                            LEFT JOIN ruangan_tujuan ON transaksi.ruangan_tujuan_id = ruangan_tujuan.id_ruangan
                                            LEFT JOIN barang ON transaksi.barang_id = barang.id_barang"); ?>
                                        <?php while ($transaksi = $ambil->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $transaksi['id_transaksi']; ?></td>
                                                <td><?php echo $transaksi['created_at']; ?></td>
                                                <td><?php echo $transaksi['username']; ?></td>
                                                <td><?php echo $transaksi['nama_barang']; ?></td>      
                                                <td><?php echo $transaksi['jumlah']; ?></td>
                                                <td><?php echo $transaksi['nama_ruangan_asal']; ?></td>
                                                <td><?php echo $transaksi['nama_ruangan_tujuan']; ?></td>
                                                <td>
                                                    <?php if ($transaksi['status'] == "gagal") { ?>
                                                        <a href="pemeriksaan_view.php?&id_transaksi=<?php echo $transaksi['id_transaksi']; ?>" class="btn-primary btn-sm btn">
                                                            <i class="fas fa-eye"></i></i>
                                                        </a>
                                                    <?php } elseif ($transaksi['status'] == "selesai") { ?>
                                                        <a href="pemeriksaan_view.php?&id_transaksi=<?php echo $transaksi['id_transaksi']; ?>" class="btn-primary btn-sm btn">
                                                            <i class="fas fa-eye"></i></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="#" class="btn-secondary btn-sm btn">
                                                            <i class="fas fa-minus"></i>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($transaksi['status'] == "gagal") { ?>
                                                        <span class="badge badge-danger p-2">Gagal</span>
                                                    <?php } elseif ($transaksi['status'] == "selesai") { ?>
                                                        <span class="badge badge-success p-2">Selesai</span>
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