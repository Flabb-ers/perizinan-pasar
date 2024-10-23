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
        		<a class="nav-link" href="<?php echo site_url('Kdinas/Welcome') ?>">
        			<i class="fas fa-fw fa-tachometer-alt"></i>
        			<span>Home</span></a>
        	</li>

        	<!-- Divider -->
        	<hr class="sidebar-divider">
        	<div class="sidebar-heading">
        		Pengajuan
        	</div>
        	<li class="nav-item">
        		<a class="nav-link" href="<?php echo site_url('Kdinas/Pengajuan') ?>">
        			<i class="fas fa-fw fa-folder"></i>
        			<span>Pengajuan</span></a>
        	</li>
        	</hr>

        	<hr class="sidebar-divider">
        	<li class="nav-item">
        		<a class="nav-link" href="<?php echo site_url('Kdinas/Kios') ?>">
        			<i class="fas fa-fw fa-table"></i>
        			<span>Data Kios</span></a>
        	</li>
        	<li class="nav-item">
        		<a class="nav-link" href="<?php echo site_url('Kdinas/Kios_takhuni') ?>">
        			<i class="fas fa-fw fa-table"></i>
        			<span>Data Kios Tak Huni</span></a>
        	</li>
        	<li class="nav-item">
        		<a class="nav-link" href="<?php echo site_url('Kdinas/Op') ?>">
        			<i class="fas fa-fw fa-table"></i>
        			<span>Data Objek Retribusi</span></a>
        	</li>
        	<li class="nav-item">
        		<a class="nav-link" href="<?php echo site_url('Kdinas/Riwayat') ?>">
        			<i class="fas fa-fw fa-table"></i>
        			<span>Riwayat Objek Retribusi</span></a>
        	</li>
        	</hr>


        	<hr class="sidebar-divider d-none d-md-block">

        	<!-- Sidebar Toggler (Sidebar) -->
        	<div class="text-center d-none d-md-inline">
        		<button class="rounded-circle border-0" id="sidebarToggle"></button>
        	</div>

        </ul>
        <!-- End of Sidebar -->