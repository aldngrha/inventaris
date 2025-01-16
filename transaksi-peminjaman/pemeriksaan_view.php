<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION["jabatan"])) {
    echo "<script>location='../login/index.php'</script>";
    exit();
}

$ambil = $koneksi->query("SELECT * FROM tb_pemeriksaan a JOIN tb_pendaftaran b ON a.id_pendaftaran = b.id_pendaftaran
            JOIN tb_pasien c ON b.id_pasien = c.id_pasien
            JOIN tb_poli d ON b.id_poli = d.id_poli
            JOIN tb_dokter e ON b.id_dokter = e.id_dokter WHERE id_pemeriksaan='$_GET[id_pemeriksaan]'");
$pecah = $ambil->fetch_assoc();

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
        <?php include '../includes/sidbar.php'; ?>
        </div>
        <div id="layoutSidenav_content" class="bg-white text-dark">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Informasi Pemeriksaan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Pemeriksaan</li>
                        <li class="breadcrumb-item active">Info Pemeriksaan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header mt-1">
                            <div class="row">
                                <div class="col-md-9 font-weight-bold">
                                    Data Pemeriksaan : <?php echo $pecah['kd_pemeriksaan']; ?>
                                </div>
                                <div class="col-md-3 font-weight-bold">
                                    <label class="ml-5">Status : </label>
                                    <?php if ($pecah['status_periksa'] == 0) { ?>
                                        <span class="badge badge-danger p-2">Belum Menerima Resep</span>
                                    <?php } elseif ($pecah['status_periksa'] == 1) { ?>
                                        <span class="badge badge-success p-2">Sudah Menerima Resep</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger p-2">
                                            <i class="fas fa-minus"></i>
                                        </span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <form class="ml-4" method="post" class="pemeriksaan" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Kode Pemeriksaan</label>
                                            <input type="text" class="form-control" name="kd_pemeriksaan" value="<?php echo $pecah['kd_pemeriksaan']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Nama Pasien</label>
                                            <input type="text" class="form-control" name="nm_pasien" value="<?php echo $pecah['nm_pasien']; ?>" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Kode Pendaftaran</label>
                                            <input type="text" class="form-control" name="kd_pendaftaran" value="<?php echo $pecah['kd_pendaftaran']; ?>" id="kd_pendaftaran" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Nama Dokter</label>
                                            <input type="text" class="form-control" name="nm_dokter" value="<?php echo $pecah['nm_dokter']; ?>" id="nm_dokter" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">

                                        </div>
                                        <div class="col-sm-4">
                                            <label>Poli</label>
                                            <input type="text" class="form-control" name="nm_poli" value="<?php echo $pecah['nm_poli']; ?>" id="nm_poli" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Tanggal Daftar</label>
                                            <input type="date" class="form-control" name="tgl_pendaftaran" value="<?php echo $pecah['tgl_pendaftaran']; ?>" id="tgl_pendaftaran" readonly>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Keluhan</label>
                                            <textarea class="form-control" name="keluhan" rows="3" readonly><?php echo $pecah['keluhan']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Diagnosa</label>
                                            <textarea class="form-control" name="diagnosa" rows="3" readonly><?php echo $pecah['diagnosa']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Tanggal Pemeriksaan</label>
                                            <input type="date" class="form-control" name="tgl_pemeriksaan" value="<?php echo $pecah['tgl_pemeriksaan']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <a href="pemeriksaan.php" class="btn btn-danger font-weight-bold px-3 mr-2"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    </div>
                                </form>

                            </div>
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