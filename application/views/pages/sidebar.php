        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" >
                <div class="">
                    <img class="img-profile" src="<?= base_url('template/img/atas.png'); ?>" class="img-rounded" width="50px">
                </div>
                <div class="sidebar-brand-text mx-3">DINKUKMP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Admin/Welcome') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                
            </div>
            <!-- Nav Item - Dashboard -->

            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Admin/Pegawai') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pegawai</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Admin/Pimpinan') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Kepala Dinas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Admin/Kpasar') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Kepala Pasar</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Admin/Pasar') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pasar</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Admin/Tarif') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Tarif</span></a>
            </li>

        
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages9"
                    aria-expanded="true" aria-controls="collapsePages9">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Kios/Los</span>
                </a>
                <div id="collapsePages9" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Permohonan Baru:</h6> -->
                        <a class="collapse-item" href="<?php echo site_url('Admin/Kios') ?>">Kios/Los</a>
                        <!-- <h6 class="collapse-header">Permohonan Perpanjang:</h6> -->
                        <a class="collapse-item" href="<?php echo site_url('Admin/Kios_takhuni') ?>">Kios/Los Tak Huni</a>
                        
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Admin/Selasar') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Selasar</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Admin/Jenis') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Jenis Dagangan</span></a>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Admin/Wp') ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Wajib Retribusi</span></a>
            </li>
<!--             <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo site_url('Admin/Op') ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Objek Retribusi</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo site_url('Admin/Objek') ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Objek Retribusi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo site_url('Admin/Riwayat') ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Riwayat Objek Retribusi</span>
                </a>
            </li>
            <!-- Divider -->
             <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Form Pengajuan
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages5"
                    aria-expanded="true" aria-controls="collapsePages5">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Form Pengajuan</span>
                </a>
                <div id="collapsePages5" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Permohonan Baru:</h6> -->
                        <a class="collapse-item" href="<?php echo site_url('Admin/Persyaratan') ?>">Baru</a>
                        <!-- <h6 class="collapse-header">Permohonan Perpanjang:</h6> -->
                        <a class="collapse-item" href="<?php echo site_url('Admin/Persyaratan2') ?>">Perpanjang</a>
                        
                    </div>
                </div>
            </li>
        </hr>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Pengajuan
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Permohonan</span>
                </a>
                <div id="collapsePages" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Permohonan Baru:</h6> -->
                        <a class="collapse-item" href="<?php echo site_url('Admin/Baru') ?>">Baru</a>
                        <!-- <h6 class="collapse-header">Permohonan Perpanjang:</h6> -->
                        <a class="collapse-item" href="<?php echo site_url('Admin/Pengajuan') ?>">Perpanjang</a>
                        
                    </div>
                </div>
            </li>
        </hr>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Cetak Surat Izin
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Cetak Surat Izin</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                     <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cetak SIMK dan SIML:</h6>
                        <a class="collapse-item" href="<?php echo site_url('Admin/Cetak2') ?>">Cetak Surat Izin</a>
                       
                    </div>
                </div>
            </li>


            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true"
                    aria-controls="collapsePages1">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <h6 class="collapse-header">Laporan:</h6>
                        
                        <a class="collapse-item" href="<?= base_url('Admin/LaporanWP/laporansemua'); ?>">Laporan Wajib Retribusi</a>                       
                        <a class="collapse-item" href="<?= base_url('Admin/LaporanOP/laporansemua'); ?>">Laporan Objek Retribusi</a>
                        <a class="collapse-item" href="<?= base_url('Admin/LaporanOpnonaktif/laporansemua'); ?>">Lap Riwayat Objek Retribusi</a>
                        <a class="collapse-item" href="<?= base_url('Admin/LaporanKios/laporansemua'); ?>">Laporan Kios & Los</a>
                        <a class="collapse-item" href="<?= base_url('Admin/LaporanKiosTakhuni/laporansemua'); ?>">Laporan Kios&Los Takhuni</a>
                    </div>
                </div>
            </li>


        
            
        </ul>
        <!-- End of Sidebar -->