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
                    <h1 class="mt-4">Tambah Data Ruangan Tujuan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Master</li>
                        <li class="breadcrumb-item active">Data Ruangan Asal</li>
                        <li class="breadcrumb-item active">Tambah Data Ruangan Tujuan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold">
                            Data Ruangan Tujuan
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="form-group row">
                                    <div class="btn-block disabled mx-4">
                                        <?php $ambil = mysqli_query($koneksi, "SELECT * FROM ruangan_tujuan ORDER BY id_ruangan DESC LIMIT 1"); ?>
                                        <?php $data = $ambil->fetch_assoc(); ?>
                                        <!-- <label>Data Terakhir</label>
                                        <input type="text" class="form-control text-center" value="<?php echo $data['id_ruangan'] ?>" readonly> -->
                                    </div>
                                </div>
                                <form class="ml-4" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>ID Ruangan</label>
                                            <input type="text" class="form-control" name="id_ruangan" value="-" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Nama Ruangan</label>
                                            <input type="text" class="form-control" name="nama" value="R-" required>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Jenis Obat</label>
                                            <select class="custom-select" name="jenis_obat">
                                                <option value="" disabled selected>Pilih Jenis Obat</option>
                                                <option value="Pil">Pil</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Sirup">Sirup</option>
                                                <option value="Salep">Salep</option>
                                                <option value="Kaplet">Kaplet</option>
                                                <option value="Extract">Extract</option>
                                                <option value="Tetes Mata">Tetes Mata</option>
                                                <option value="Kapsul">Kapsul</option>
                                                <option value="Puyer">Puyer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Stok Obat</label>
                                            <input type="text" class="form-control" name="stok" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Harga</label>
                                            <input type="text" class="form-control" name="harga_obat" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Expired Obat</label>
                                            <input type="date" class="form-control" name="exp_obat" required>
                                        </div>
                                    </div> -->
                                    <div class="form-group ">
                                        <button class="btn btn-success font-weight-bold px-3 mr-2" name="save"><i class="far fa-save"></i> Simpan</button>
                                        <a href="/data-master/ruangan-tujuan/tujuan.php" class="btn btn-danger font-weight-bold px-3 mr-2"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    </div>
                                </form>

                                <?php
                                if (isset($_POST['save'])) {
                                    if ($_POST['id_ruangan'] == 0) {
                                        echo "<script>alert('Pilih Ruangan dengan Benar!');</script>";
                                    } else {
                                        $koneksi->query("INSERT INTO ruangan_tujuan (nama) 
                                        VALUES ('$_POST[nama]')");

                                        echo "<script>alert('Data Ruangan Tersimpan!');</script>";
                                        echo "<script>location='/data-master/ruangan-tujuan/tujuan.php'</script>";
                                    }
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