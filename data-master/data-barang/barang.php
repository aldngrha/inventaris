<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
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
    <title>Poli Klinik | Data Master - Dokter</title>
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link href="../../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="../../assets/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php include '../../includes/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php include "../../includes/sidebar.php"; ?>
        <div id="layoutSidenav_content" class="bg-white text-dark">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Data Dokter</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Master</li>
                        <li class="breadcrumb-item active">Data Dokter</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Tabel Data Dokter
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Stok</th>
                                            <th>Kode Barang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>
                                        <?php $ambil = $koneksi->query("SELECT barang.nama AS nama_barang, barang.id_barang , barang.stok, barang.kode_barang, kategori.nama AS nama_kategori FROM barang JOIN kategori ON kategori.id_kategori = barang.kategori_id"); ?>
                                        <?php while ($barang = $ambil->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $nomor; ?></td>
                                                <td><?php echo $barang['id_barang']; ?></td>
                                                <td><?php echo $barang['nama_barang']; ?></td>
                                                <td><?php echo $barang['nama_kategori']; ?></td>
                                                <td><?php echo $barang['stok']; ?></td>
                                                <td><?php echo $barang['kode_barang']; ?></td>
                                                <td>
                                                    <a href="/dokter_view.php?&id_dokter=<?php echo $barang['id_barang']; ?>" class="btn-primary btn-sm btn">
                                                        <i class="fas fa-eye"></i></i>
                                                    </a>
                                                    <a href="dokter_ubah.php?&id_dokter=<?php echo $pecah['id_dokter']; ?>" class="btn-warning btn-sm btn">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="dokter_hapus.php?&id_dokter=<?php echo $pecah['id_dokter']; ?>" class="btn-danger btn-sm btn">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $nomor++; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="dokter_tambah.php" class="btn-success btn px-3 font-weight-bold"><i class="fas fa-plus "></i> Tambah Data Barang</a>
                        </div>
                    </div>
                </div>
            </main>
            <?php include '../../includes/footer.php'; ?>
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