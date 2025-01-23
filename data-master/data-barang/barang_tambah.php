<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
}  else if ($_SESSION["role_id"] == "guru") {
    echo "<script>location='/index.php'</script>";
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
                    <h1 class="mt-4">Tambah Data Barang</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Master</li>
                        <li class="breadcrumb-item active">Data Barang</li>
                        <li class="breadcrumb-item active">Tambah Data Barang</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold">
                            Data Barang
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="form-group row">
                                    <div class="btn-block disabled mx-4">
                                        <?php $ambil = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id_barang DESC LIMIT 1"); ?>
                                        <?php $data = $ambil->fetch_assoc(); ?>
                                        <label>Data Terakhir</label>
                                        <input type="text" class="form-control text-center" value="<?php echo $data['id_barang'] ?>" readonly>
                                    </div>
                                </div>
                                <form class="ml-4" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Kode Barang</label>
                                            <input type="text" class="form-control" name="kode_barang" value="PRJ-" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Nama Barang</label>
                                            <input type="text" class="form-control" name="nama" value="" required>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Kategori</label>
                                            <input type="text" class="form-control" name="spesialis_dokter" required>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Kategori</label>
                                            <select class="custom-select" name="id_kategori">
                                                <option value="0" disabled selected>Pilih Kategori</option>
                                                <?php
                                                $ambil2 = $koneksi->query("SELECT * FROM kategori");
                                                $pecah2 = $ambil2->fetch_assoc();
                                                ?>

                                                <?php foreach ($ambil2 as $poli) : ?>
                                                    <option value="<?php echo $poli['id_kategori']; ?>"><?php echo $poli['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Stok Barang</label>
                                            <input type="text" class="form-control" name="stok" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <button class="btn btn-success font-weight-bold px-3 mr-2" name="save"><i class="far fa-save"></i> Simpan</button>
                                        <a href="/data-master/data-barang/barang.php" class="btn btn-danger font-weight-bold px-3 mr-2"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    </div>
                                </form>

                                <?php
                                if (isset($_POST['save'])) {
                                    if ($_POST['id_kategori'] == 0) {
                                        echo "<script>alert('Kategori Belum Dipilih!');</script>";
                                    } else {
                                        $koneksi->query("INSERT INTO barang (nama, stok, kode_barang, kategori_id)
                                        VALUES ('$_POST[nama]', '$_POST[stok]', '$_POST[kode_barang]', '$_POST[id_kategori]')");

                                        echo "<script>alert('Data Berhasil Tersimpan!');</script>";
                                        echo "<script>location='/data-master/data-barang/barang.php'</script>";
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