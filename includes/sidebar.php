

<div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Poli Klinik</div>
                        <a class="nav-link active" href="/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <?php if ($_SESSION["role_id"] == 'admin') : ?>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data-master" aria-expanded="false" aria-controls="data-master">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="data-master" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/data-master/data-kategori/kategori.php">Data Kategori</a>
                                    <a class="nav-link" href="/data-master/data-barang/barang.php">Data Barang</a>
                                    <a class="nav-link" href="/data-master/ruangan-asal/asal.php">Data Ruangan Asal</a>
                                    <a class="nav-link" href="/data-master/ruangan-tujuan/tujuan.php">Data Ruangan Tujuan</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="/data-pendaftaran/pendaftaran.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Data Pendaftaran
                            </a>
                            <a class="nav-link" href="/data-pemeriksaan/pemeriksaan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                                Data Pemeriksaan
                            </a>
                            <a class="nav-link" href="/data-resep/resep.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-scroll"></i></div>
                                Resep Obat
                            </a>
                            <a class="nav-link" href="/data-pembayaran/pembayaran.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Kasir Pembayaran
                            </a>
                            <?php elseif ($_SESSION["role_id"] == 'admin') : ?>
                            <a class="nav-link" href="/data-master/data-user/user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Data User
                            </a>
                        <?php elseif ($_SESSION["role_id"] == '2') : ?>
                            <a class="nav-link" href="/data-master/data-pasien/pasien.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                Data Pasien
                            </a>
                            <a class="nav-link" href="/data-pendaftaran/pendaftaran.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Data Pendaftaran
                            </a>
                        <?php elseif ($_SESSION["role_id"] == '2') : ?>
                            <a class="nav-link" href="/data-pemeriksaan/pemeriksaan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                                Data Pemeriksaan
                            </a>
                            <a class="nav-link" href="/data-resep/resep.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-scroll"></i></div>
                                Resep Obat
                            </a>
                        <?php elseif ($_SESSION["role_id"] == '2') : ?>
                            <a class="nav-link" href="/data-pembayaran/pembayaran.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Kasir Pembayaran
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
