<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["jabatan"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
}

$ambil = $koneksi->query("SELECT * FROM tb_obat WHERE id_obat='$_GET[id_obat]'");
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
    <title>Poli Klinik | Data Master - Obat</title>
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link href="../../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="../../assets/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
<?php include '../../includes/navbar.php'; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
        <?php include '../../includes/sidebar.php'; ?>
        </div>
        <div id="layoutSidenav_content" class="bg-white text-dark">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Informasi Obat</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Master</li>
                        <li class="breadcrumb-item active">Data Obat</li>
                        <li class="breadcrumb-item active">Info Obat</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold">
                            Data Obat : <?php echo $pecah['nm_obat']; ?>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <form class="ml-4" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>ID Obat</label>
                                            <input type="text" class="form-control" name="id_obat" value="<?php echo $pecah['id_obat']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Kode Obat</label>
                                            <input type="text" class="form-control" name="kd_obat" value="<?php echo $pecah['kd_obat']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Nama Obat</label>
                                            <input type="text" class="form-control" name="nm_obat" value="<?php echo $pecah['nm_obat']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Jenis Obat</label>
                                            <input type="text" class="form-control" name="jenis_obat" value="<?php echo $pecah['jenis_obat']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Stok Obat</label>
                                            <input type="text" class="form-control" name="stok" value="<?php echo $pecah['stok']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Harga</label>
                                            <input type="text" class="form-control" name="harga_obat" value="<?php echo $pecah['harga_obat']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Expired Obat</label>
                                            <input type="date" class="form-control" name="exp_obat" value="<?php echo $pecah['exp_obat']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <a href="obat_ubah.php?&id_obat=<?php echo $pecah['id_obat']; ?>" class="btn-warning btn font-weight-bold px-3 mr-2 text-white"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="obat.php" class="btn btn-danger font-weight-bold px-3 mr-2"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    </div>
                                </form>

                                <?php
                                if (isset($_POST['ubah'])) {
                                    $koneksi->query("UPDATE tb_obat SET nm_obat='$_POST[nm_obat]', jenis_obat='$_POST[jenis_obat]', 
                                        stok='$_POST[stok]', harga_obat='$_POST[harga_obat]', exp_obat='$_POST[exp_obat]'
                                    WHERE id_obat='$_GET[id_obat]'");

                                    echo "<script>alert('Data Obat Telah Diubah!');</script>";
                                    echo "<script>location='obat.php'</script>";
                                }
                                ?>

                            </div>
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