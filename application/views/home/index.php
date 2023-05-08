<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                <a href="<?= base_url('master_data/md_merchanHarga') ?>">JUMLAH JENIS MERCHANDISE</a>
                            </div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $this->db->count_all('PAV_BARANGMASUK') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                <a href="<?= base_url('master_data/md_vendor') ?>">JUMLAH VENDOR</a>
                            </div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $this->db->count_all("PAV_VENDOR"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1"><a
                                    href="<?= base_url('master_data/md_cabang') ?>">JUMLAH CABANG</a>
                            </div>
                            <hr class="sidebar-divider">
                            <div class="row no-gutters align-items-center">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <?= $dataCabang = count(array($dataCabang)) ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JUMLAH CABANG YANG DI SUPPORT -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                JUMLAH CABANG YANG DI SUPPORT</div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JUMLAH PENGAJUAN SUPPORT KE CABANG -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                JUMLAH PENGAJUAN SUPPORT KE CABANG</div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TOTAL DISTRIBUSI/BULAN -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                TOTAL DISTRIBUSI / BULAN</div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TOTAL GIMMICK TERDISTRIBUSI -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                TOTAL GIMMICK YANG TERDISTRIBUSI</div>
                            <hr class="sidebar-divider">
                            </hr>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">7</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MERCHANDISE YANG BANYAK KELUAR -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                MERCHANDISE YANG BANYAK KELUAR</div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">120</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CABANG YANG BANYAK REQ MERCHANDISE -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                CABANG YANG BANYAK REQ MERCHANDISE</div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                        </div>
                        <!-- <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Heading 2 -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card shadow mt-4" style="background-color: #C3C3C3; width: 100%;">
            <h4 class=" mb-0 text-gray-800">SURAT PERMINTAAN SUPPORT MERCHANDISE</h4>
        </div>
    </div>
    <!-- end page heading 2 -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                JUMLAH CABANG YANG DI SUPPORT
                            </div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                JUMLAH PENGAJUAN SUPPORT KE CABANG
                            </div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                TOTAL DISTRIBUSI / BULAN
                            </div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                TOTAL GIMMICK YANG TERDISTRIBUSI
                            </div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                MERCHANDISE YANG BANYAK KELUAR
                            </div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">111</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                CABANG YANG BANYAK REQ MERCHANDISE
                            </div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">6</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ========================= HALAMAN HOME KEPALA CABANG ========================= -->
        <?php if ($user['ROLE'] == 'BRANCH_OPS' && $user['ROLE'] == 'BPN_OPS3') : ?>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                JUMLAH PERMINTAAN</div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">
                                JUMLAH MERCHANDISE</div>
                            <hr class="sidebar-divider">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 text-xs font-weight-bold text-dark text-uppercase mb-1">DISETUJUI
                            </div>
                            <hr class="sidebar-divider">
                            <div class="row no-gutters align-items-center">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">7</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>
</div>