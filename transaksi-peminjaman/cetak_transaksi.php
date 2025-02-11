<?php
include "../koneksi.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>Cetak Laporan Pembayaran</title>
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
                    <img src="../assets/img/logo.png">
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
            <th>Id Transaksi</th>
            <th>Tanggal</th>
            <th>Nama User</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Ruangan Tujuan</th>
            <th>Status</th>

        </tr>
        <tbody>
            <?php $ambil = $koneksi->query("SELECT transaksi.status_peminjaman, transaksi.jumlah, transaksi.id_transaksi,
                                            users.username, ruangan_tujuan.nama
                                            AS nama_ruangan_tujuan, barang.nama AS nama_barang, transaksi.created_at FROM transaksi
                                            LEFT JOIN users ON transaksi.user_id = users.id_users
                                            LEFT JOIN ruangan_tujuan ON transaksi.ruangan_tujuan_id = ruangan_tujuan.id_ruangan
                                            LEFT JOIN barang ON transaksi.barang_id = barang.id_barang"); ?>
            <?php while ($transaksi = $ambil->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $transaksi['id_transaksi']; ?></td>
                    <td><?php echo $transaksi['created_at']; ?></td>
                    <td><?php echo $transaksi['username']; ?></td>
                    <td><?php echo $transaksi['nama_barang']; ?></td>
                    <td><?php echo $transaksi['jumlah']; ?></td>
                    <td><?php echo $transaksi['nama_ruangan_tujuan']; ?></td>
                    <td>
                        <?php if ($transaksi['status_peminjaman'] == "ditolak") { ?>
                            <span class="badge badge-danger p-2">Ditolak</span>
                        <?php } elseif ($transaksi['status_peminjaman'] == "selesai") { ?>
                            <span class="badge badge-success p-2">Selesai</span>
                        <?php } elseif ($transaksi['status_peminjaman'] == "sedang dipinjam") { ?>
                            <span class="badge badge-primary p-2">Sedang dipinjam</span>
                        <?php } elseif ($transaksi['status_peminjaman'] == "hilang") { ?>
                            <span class="badge badge-danger p-2">Hilang</span>
                        <?php } else { ?>
                            <span class="badge badge-danger p-2">
                                Menunggu
                            </span>
                        <?php } ?>
                    </td>
                  
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>