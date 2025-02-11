<?php
include "../../koneksi.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>Cetak Laporan Barang</title>
    <style>
        .content img {
            width: 105px;
            height: 105px;
            float: left;
            margin-right: 10px;
        }

        .content p {
            text-align: left;
            margin-left: 20px;
        }

        .content h2 {
            text-align: left;
            margin-left: 5px;
        }

        .content h4 {
            text-align: left;
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <div class="content">
        <table border="0" width="950">
            <tr>
                <td>
                    <img src="../../assets/img/logo.png">
                    <p>
                        <span style="font-size: 16px; font-weight: bold;">INVENTARIS CEFADA </span><br>
                        <span style="font-size: 13px;">Jl. Pulau Enggano-Tirtayasa No. 99, Kel. Sukabumi, Kecamatan Sukabumi, Bandar Lampung Telp : 0721 774471
                        </span><br>
                        <span style="font-size: 12px;">Email : info@smkfarmasicefada.sch.id</span>
                    </p>
                </td>
            </tr>
        </table>
    </div>


    <table class="tabel" colspan="11" border="1" width="100%" style="border: 1px solid black; border-collapse: collapse;">
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Kode Barang</th>
          
        </tr>
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
                   
                </tr>
                <?php $nomor++; ?>
            <?php } ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>