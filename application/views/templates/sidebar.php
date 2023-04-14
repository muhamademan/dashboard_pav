<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <!-- <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/') ?>img/logo-jne.png" class="img-profile" alt="" width="70">
        </div> -->
        <div class="sidebar-brand-text mx-1">DASHBOARD PAV</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if ($user['ROLE'] == 'SUPER_USER') { ?>
    <div class="sidebar-heading">
        Home
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('home') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>
    <?php } else { ?>
    <div class="sidebar-heading">
        Home
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kepala_cabang') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if ($user['ROLE'] == 'SUPER_USER') { ?>
    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Approval Merchandise Kacab-->
    <?php if ($user['ROLE'] == 'BRANCH_OPS') { ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(''); ?>">
            <i class="fas fa-fw fa-solid fa-truck"></i>
            <span>Approval Merchandise</span></a>
    </li>
    <?php } ?>
    <!-- end Approval Merchandise Kacab -->

    <!-- Nav Item - Form Pendaftaran -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-solid fa-truck"></i>
            <span>Form Pendaftaran</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold" href="<?= base_url('form_pendaftaran/data_vendor') ?>">FP Data
                    Vendor</a>
                <a class="collapse-item font-weight-bold" href="<?= base_url('form_pendaftaran/data_cabang') ?>">FP Data
                    Cabang</a>
                <a class="collapse-item font-weight-bold" href="<?= base_url('form_pendaftaran/data_team_pav') ?>">FP
                    Data Team PAV</a>
                <a class="collapse-item font-weight-bold"
                    href="<?= base_url('form_pendaftaran/tools_marketing') ?>">Tools &
                    Marketing</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Master Data -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-place-of-worship"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold" href="<?= base_url('master_data/md_vendor') ?>">Vendor</a>
                <a class="collapse-item font-weight-bold" href="<?= base_url('master_data/md_merchanHarga') ?>">
                    Merchandise & Harga</a>
                <a class="collapse-item font-weight-bold" href="<?= base_url('master_data/md_cabang') ?>">Cabang</a>
                <a class="collapse-item font-weight-bold" href="<?= base_url('master_data/md_teamPAV') ?>">Team
                    PAV</a>
                <a class="collapse-item font-weight-bold" href="<?= base_url('master_data/md_toolsMarketing') ?>">Tools
                    & Marketing</a>
                <a class="collapse-item font-weight-bold" href="<?= base_url('master_data/md_data_barang') ?>">Master
                    Data Barang</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Form Permintaan -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#toolofSales" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-sharp fa-solid fa-universal-access"></i>
            <span>Form Permintaan</span>
        </a>
        <div id="toolofSales" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold" href="<?= base_url('form_permintaan') ?>">FP Merchandise</a>
            </div>
        </div>
    </li> -->

    <!-- Nav Item - Approval -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#officeTools" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-solid fa-toolbox"></i>
            <span>Approval</span>
        </a>
        <div id="officeTools" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold" href="<?= base_url('approval_merchandise') ?>">Approval
                    Merchandise</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Update Status POD -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#panduanCbd" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-duotone fa-book"></i>
            <span>Update Status POD</span>
        </a>
        <div id="panduanCbd" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold"
                    href="<?= base_url('update_status_pod/status_pod_spsm') ?>">Status POD SPSM</a>
                <!-- <a class="collapse-item font-weight-bold"
                    href="<?= base_url('update_status_pod/update_dokumentasi') ?>">Dokumentasi</a> -->
            </div>
        </div>
    </li>

    <!-- Nav Item - Status POD -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#statusPOD" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-duotone fa-book"></i>
            <span>Status POD</span>
        </a>
        <div id="statusPOD" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold" href="<?= base_url('status_pod_distribusi') ?>">Status POD
                    Distribusi</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Report -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#report" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-duotone fa-book"></i>
            <span>Report</span>
        </a>
        <div id="report" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold" href="<?= base_url('report_pav/report') ?>">Report Dashboard
                    Pav</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Stok Barang/Merchandise -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#stok" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-duotone fa-book"></i>
            <span>Stok Barang/Merchan</span>
        </a>
        <div id="stok" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold"
                    href="<?= base_url('stok_barangMerchan/stok_merchandise') ?>">Stok
                    Merchandise</a>
                <a class="collapse-item font-weight-bold" href="<?= base_url('stok_barangMerchan/stok_opname') ?>">Stok
                    Opname</a>
                <a class="collapse-item font-weight-bold"
                    href="<?= base_url('stok_barangMerchan/report_stok_opname') ?>">Report Stok
                    Opname</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Upload Data -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#uploadData" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-duotone fa-book"></i>
            <span>Upload Data</span>
        </a>
        <div id="uploadData" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold" href="<?= base_url('upload_data/barang_masuk') ?>">Barang
                    Masuk</a>
                <!-- <a class="collapse-item font-weight-bold" href="<?= base_url('#') ?>">Uplaod Data
                    Distribusi</a> -->
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php } ?>



    <!-- ==================================== MENU KEPALA CABANG ==================================== -->
    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Approval Merchandise Kacab-->
    <?php if ($user['ROLE'] == 'BRANCH_OPS') { ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kepala_cabang/approval_merchan'); ?>">
            <i class="fas fa-fw fa-solid fa-truck"></i>
            <span>Approval Merchandise</span></a>
    </li>
    <!-- end Approval Merchandise Kacab -->

    <!-- Nav Item - Update Status POD kacab -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#eventkacab" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-duotone fa-book"></i>
            <span>Update Status POD</span>
        </a>
        <div id="eventkacab" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold"
                    href="<?= base_url('update_status_pod/update_dokumentasi') ?>">Update Dokumentasi / Event</a>
            </div>
        </div>
    </li> -->
    <!-- End status POD Kacab -->

    <!-- Nav Item - Status POD Kacab-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#statusPODkacab" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-duotone fa-book"></i>
            <span>Status POD</span>
        </a>
        <div id="statusPODkacab" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold" href="<?= base_url('status_pod_distribusi') ?>">Status POD
                    Distribusi</a>
            </div>
        </div>
    </li>
    <!-- end status POD Kacab -->

    <!-- Nav Item - Report Kacab-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reportKacab" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-duotone fa-book"></i>
            <span>Report</span>
        </a>
        <div id="reportKacab" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold" href="<?= base_url('report_pav/report') ?>">Report Dashboard
                    Pav</a>
            </div>
        </div>
    </li>
    <!-- end report kacab -->
    <?php } ?>
    <!-- ==================================== END MENU KEPALA CABANG ==================================== -->


    <!-- ==================================== MENU USER PAV ==================================== -->

    <!-- Heading -->
    <?php if ($user['ROLE'] == 'BPN_OPS3') { ?>

    <!-- Nav Item - Form Permintaan USER -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#permintaanMerchan"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-sharp fa-solid fa-universal-access"></i>
            <span>Form Permintaan</span>
        </a>
        <div id="permintaanMerchan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold" href="<?= base_url('form_permintaan') ?>">Form Merchandise</a>
            </div>
        </div>
    </li>
    <!-- end user permintaan user -->

    <!-- Nav Item - Update Status POD user -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#eventuser" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-duotone fa-book"></i>
            <span>Update Status POD</span>
        </a>
        <div id="eventuser" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold"
                    href="<?= base_url('update_status_pod/update_dokumentasi') ?>">Update Dokumentasi</a>
            </div>
        </div>
    </li>
    <!-- End status POD user -->

    <!-- Nav Item - Status POD user-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#statusPODuser" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-duotone fa-book"></i>
            <span>Status POD</span>
        </a>
        <div id="statusPODuser" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold" href="<?= base_url('status_pod_distribusi') ?>">Status POD
                    Distribusi</a>
            </div>
        </div>
    </li>
    <!-- end status POD user -->

    <!-- Nav Item - Report user-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reportuser" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-duotone fa-book"></i>
            <span>Report</span>
        </a>
        <div id="reportuser" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu:</h6>
                <a class="collapse-item font-weight-bold" href="<?= base_url('report_pav/report') ?>">Report Dashboard
                    Pav</a>
            </div>
        </div>
    </li>
    <!-- end report user -->
    <?php } ?>
    <!-- ==================================== END MENU USER PAV ==================================== -->



    <!-- Nav Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    <!-- end logout -->



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->