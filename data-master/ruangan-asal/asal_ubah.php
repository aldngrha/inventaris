<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
}

$ambil = $koneksi->query("SELECT * FROM ruangan_asal WHERE id_ruangan_asal='$_GET[id_ruangan_asal]'");
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
                    <h1 class="mt-4">Ubah Data Ruangan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Master</li>
                        <li class="breadcrumb-item active">Data Ruangan Asal</li>
                        <li class="breadcrumb-item active">Ubah Data Ruangan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold">
                            Data Ruangan : <?php echo $pecah['nama']; ?>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <form class="ml-4" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>ID</label>
                                            <input type="text" class="form-control" name="id_ruangan_asal" value="<?php echo $pecah['id_ruangan_asal']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Nama Ruangan</label>
                                            <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama']; ?>">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Nama Obat</label>
                                            <input type="text" class="form-control" name="nm_obat" value="<?php echo $pecah['nm_obat']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Jenis Obat</label>
                                            <select class="custom-select" name="jenis_obat">
                                                <option value="<?php echo $pecah['jenis_obat']; ?>"><?php echo $pecah['jenis_obat']; ?></option>
                                                <option value="Pil">Pil</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Sirup">Sirup</option>
                                                <option value="Salep">Salep</option>
                                                <option value="Kaplet">Kaplet</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Stok Obat</label>
                                            <input type="text" class="form-control" name="stok" value="<?php echo $pecah['stok']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Harga</label>
                                            <input type="text" class="form-control" name="harga_obat" value="<?php echo $pecah['harga_obat']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Expired Obat</label>
                                            <input type="date" class="form-control" name="exp_obat" value="<?php echo $pecah['exp_obat']; ?>" required>
                                        </div>
                                    </div> -->
                                    <div class="form-group ">
                                        <button class="btn btn-success font-weight-bold px-3 mr-2" name="ubah"><i class="fas fa-save"></i> Simpan</button>
                                        <a href="/data-master/ruangan-asal/asal.php" class="btn btn-danger font-weight-bold px-3 mr-2"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    </div>
                                </form>

                                <?php
                                if (isset($_POST['ubah'])) {
                                    $koneksi->query("UPDATE ruangan_asal SET nama='$_POST[nama]'
                                    WHERE id_ruangan_asal='$_GET[id_ruangan_asal]'");

                                    echo "<script>alert('Data Obat Telah Diubah!');</script>";
                                    echo "<script>location='/data-master/ruangan-asal/asal.php'</script>";
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