        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        	<!-- Sidebar - Brand -->
        	<a class="sidebar-brand d-flex align-items-center justify-content-center">
        		<div class="">
        			<img class="img-profile" src="<?= base_url('template/img/atas.png'); ?>" class="img-rounded" width="50px">
        		</div>
        		<div class="sidebar-brand-text mx-3">DINKUKMP</div>
        	</a>

        	<!-- Divider -->
        	<hr class="sidebar-divider my-0">

        	<!-- Nav Item - Dashboard -->
        	<li class="nav-item">
        		<a class="nav-link" href="<?php echo site_url('Dinas/Welcome') ?>">
        			<i class="fas fa-fw fa-tachometer-alt"></i>
        			<span>Home</span></a>
        	</li>

        	<hr class="sidebar-divider">
        	<div class="sidebar-heading">

        	</div>
        	<!-- Nav Item - Dashboard -->
        	<li class="nav-item">
        		<a class="nav-link" href="<?php echo site_url('Dinas/Kios') ?>">
        			<i class="fas fa-fw fa-table"></i>
        			<span>Data Kios/Los</span></a>
        	</li>
        	<li class="nav-item">
        		<a class="nav-link" href="<?php echo site_url('Dinas/Kios_takhuni') ?>">
        			<i class="fas fa-fw fa-table"></i>
        			<span>Data Kios/Los Tak Huni</span></a>
        	</li>

        	<hr class="sidebar-divider">
        	<div class="sidebar-heading">

        	</div>
        	<li class="nav-item">
        		<a class="nav-link" href="<?php echo site_url('Dinas/Wp') ?>">
        			<i class="fas fa-fw fa-folder"></i>
        			<span>Data Wajib Retribusi</span></a>
        	</li>
        	<li class="nav-item">
        		<a class="nav-link collapsed" href="<?php echo site_url('Dinas/Objek') ?>">
        			<i class="fas fa-fw fa-folder"></i>
        			<span>Data Objek Retribusi</span>
        		</a>
        	</li>
        	<li class="nav-item">
        		<a class="nav-link collapsed" href="<?php echo site_url('Dinas/Riwayat') ?>">
        			<i class="fas fa-fw fa-folder"></i>
        			<span>Riwayat Objek Retribusi</span>
        		</a>
        	</li>
        	<!-- Divider -->
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
        				<a class="collapse-item" href="<?php echo site_url('Dinas/Baru') ?>">Baru</a>
        				<!-- <h6 class="collapse-header">Permohonan Perpanjang:</h6> -->
        				<a class="collapse-item" href="<?php echo site_url('Dinas/Pengajuan') ?>">Perpanjang</a>

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
        				<a class="collapse-item" href="<?php echo site_url('Dinas/Cetak2') ?>">Cetak Surat Izin</a>

        			</div>
        		</div>
        	</li>


        	<hr class="sidebar-divider d-none d-md-block">

        	<!-- Sidebar Toggler (Sidebar) -->
        	<div class="text-center d-none d-md-inline">
        		<button class="rounded-circle border-0" id="sidebarToggle"></button>
        	</div>

        </ul>
        <!-- End of Sidebar -->