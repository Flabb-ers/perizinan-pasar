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
        		<a class="nav-link" href="<?php echo site_url('Pasar/Welcome') ?>">
        			<i class="fas fa-fw fa-tachometer-alt"></i>
        			<span>Home</span></a>
        	</li>

        	<hr class="sidebar-divider">
        	<div class="sidebar-heading">

        	</div>
        	<!-- Nav Item - Dashboard -->
        	<li class="nav-item">
        		<a class="nav-link" href="<?php echo site_url('Pasar/Kios') ?>">
        			<i class="fas fa-fw fa-table"></i>
        			<span>Data Kios/Los</span></a>
        	</li>
        	<li class="nav-item">
        		<a class="nav-link" href="<?php echo site_url('Pasar/Kios_takhuni') ?>">
        			<i class="fas fa-fw fa-table"></i>
        			<span>Data Kios/Los Tak Huni</span></a>
        	</li>
        	<li class="nav-item">
        		<a class="nav-link" href="<?php echo site_url('Pasar/Selasar') ?>">
        			<i class="fas fa-fw fa-table"></i>
        			<span>Data Selasar</span></a>
        	</li>

        	<hr class="sidebar-divider">
        	<div class="sidebar-heading">

        	</div>
        	<li class="nav-item">
        		<a class="nav-link" href="<?php echo site_url('Pasar/Wp') ?>">
        			<i class="fas fa-fw fa-folder"></i>
        			<span>Data Wajib Retribusi</span></a>
        	</li>
        	<li class="nav-item">
        		<a class="nav-link collapsed" href="<?php echo site_url('Pasar/Op') ?>">
        			<i class="fas fa-fw fa-folder"></i>
        			<span>Data Objek Retribusi</span>
        		</a>
        	</li>
        	<li class="nav-item">
        		<a class="nav-link collapsed" href="<?php echo site_url('Pasar/Riwayat') ?>">
        			<i class="fas fa-fw fa-folder"></i>
        			<span>Riwayat Objek Retribusi</span>
        		</a>
        	</li>
        	<hr class="sidebar-divider">
        	<div class="sidebar-heading">
        		Cetak Form Persyaratan
        	</div>
        	<!-- Nav Item - Dashboard -->
        	<li class="nav-item">
        		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
        			aria-expanded="true" aria-controls="collapsePages3">
        			<i class="fas fa-fw fa-folder"></i>
        			<span>Cetak Form Persyaratan</span>
        		</a>
        		<div id="collapsePages3" class="collapse" data-parent="#accordionSidebar">
        			<div class="bg-white py-2 collapse-inner rounded">
        				<a class="collapse-item" href="<?php echo site_url('Pasar/Persyaratan') ?>">Form Baru</a>
        				<a class="collapse-item" href="<?php echo site_url('Pasar/Persyaratan2') ?>">Form Perpanjang</a>

        			</div>
        		</div>
        	</li>
        	</hr>
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
        				<a class="collapse-item" href="<?php echo site_url('Pasar/Baru') ?>">Baru</a>
        				<!-- <h6 class="collapse-header">Permohonan Perpanjang:</h6> -->
        				<a class="collapse-item" href="<?php echo site_url('Pasar/Pengajuan') ?>">Perpanjang</a>

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
        				<a class="collapse-item" href="<?php echo site_url('Pasar/Cetak2') ?>">Cetak Surat Izin</a>

        			</div>
        		</div>
        	</li>
        </ul>
        <!-- End of Sidebar -->