<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
}

$ambil = $koneksi->query("SELECT * FROM barang JOIN kategori ON barang.kategori_id = kategori.id_kategori
            WHERE id_barang='$_GET[id_barang]'");
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
    <title>Poli Klinik | Data Master - Dokter</title>
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
                    <h1 class="mt-4">Informasi Data Barang</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Master</li>
                        <li class="breadcrumb-item active">Data Barang</li>
                        <li class="breadcrumb-item active">Info Barang</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold">
                            Data Dokter : <?php echo $pecah['nama']; ?>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <form class="ml-4" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>ID</label>
                                            <input type="text" class="form-control" name="id_barang" value="<?php echo $pecah['id_barang'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Kode Barang</label>
                                            <input type="text" class="form-control" name="kode_barang" value="<?php echo $pecah['kode_barang'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Nama Barang</label>
                                            <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama'] ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Stok</label>
                                            <input type="text" class="form-control" name="stok" value="<?php echo $pecah['stok'] ?>">
                                        </div>
                                    </div>
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
                                    <div class="form-group ">
                                        <a href="/data-master/data-barang/barang_ubah.php?&id_kategori=<?php echo $pecah['id_kategori']; ?>" class="btn-warning btn font-weight-bold px-3 mr-2 text-white"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="/data-master/data-barang/barang.php" class="btn btn-danger font-weight-bold px-3 mr-2"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    </div>
                                </form>


                                <?php
                                if (isset($_POST['ubah'])) {
                                    $koneksi->query("UPDATE barang SET kode_barang='$_POST[kode_barang]', kategori_id='$_POST[id_kategori]', nama='$_POST[nama]', 
                                        stok='$_POST[stok]', updated_at=NOW()
                                    WHERE id_barang='$_GET[id_barang]'");

                                    echo "<script>alert('Data Barang Telah Diubah!');</script>";
                                    echo "<script>location='/data-master/data-barang/barang.php'</script>";
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