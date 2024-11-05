<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>PERIZINAN</title>

	<!-- Custom fonts for this template -->
	<link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css'); ?> " rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href=" <?php echo base_url('template/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?php echo base_url('template/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php if ($this->session->userdata('level') == 'Admin') {
			include "sidebar.php";
		} elseif ($this->session->userdata('level') == 'Dinas') {
			include "sidebar-dinas.php";
		} elseif ($this->session->userdata('level') == 'Kdinas') {
			include "sidebar-Kdinas.php";
		} elseif ($this->session->userdata('level') == 'Pasar') {
			include "sidebar-pasar.php";
		} ?>
		<!-- End of Sidebar -->


		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<ul class="navbar-nav ml-auto">
						<?php if ($this->session->userdata('level') == 'Pasar' && (uri_string() == '' || uri_string() == 'Pasar/Welcome' || uri_string() == 'Pasar/welcome')) {
							$jumlah_notif = 0; // Inisialisasi jumlah notifikasi
							foreach ($dataop as $key) {
								$tgl_sekarang = new DateTime();
								$tgl_batas = new DateTime($key->batas_berlaku);
								$interval = $tgl_sekarang->diff($tgl_batas);
								$jarak_hari = $interval->days;
								$is_past = $interval->invert;

								// Hitung jumlah notifikasi
								if (!$is_past && $jarak_hari <= 31 && $jarak_hari >= 1) {
									$jumlah_notif++;
								}
							}
						?>
							<li class="nav-item dropdown no-arrow mx-1">
								<a class="nav-link dropdown-toggle" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-bell fa-fw"></i>
									<span class="badge badge-danger badge-counter">
										<?php echo $jumlah_notif; // Menampilkan jumlah notifikasi 
										?>
									</span>
								</a>
								<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
									<h6 class="dropdown-header">
										Pemberitahuan Batas Berlaku Surat Izin
									</h6>
									<table class="table" width="100%" cellspacing="0">
										<tbody>
											<?php
											foreach ($dataop as $key) {
												$tgl_sekarang = new DateTime();
												$tgl_batas = new DateTime($key->batas_berlaku);
												$interval = $tgl_sekarang->diff($tgl_batas);

												$jarak_hari = $interval->days;
												$is_past = $interval->invert;

												$nama = $key->nama;
												$jenis = $key->jenis;
												$nama_blok = $key->nama_blok;
												$no_blok = $key->no_blok;

												if (!$is_past && $jarak_hari <= 31 && $jarak_hari >= 1) {
											?>
													<tr>
														<td></td>
														<td>
															<?php
															if ($jarak_hari == 1) {
																echo "<a style='color:red'>" . $nama . "</a>, Masa Berlaku Surat Izin Menempati " . $jenis . " " . $nama_blok . " No " . $no_blok . " Akan Habis Besok, Mohon Segera Perpanjang!";
															} elseif ($jarak_hari <= 31 && $jarak_hari > 1) {
																echo "<a style='color:red'>" . $nama . "</a>, Masa Berlaku Surat Izin Menempati " . $jenis . " " . $nama_blok . " No " . $no_blok . " Akan Habis dalam " . $jarak_hari . " Hari, Mohon Segera Perpanjang!";
															}
															?>
														</td>
													</tr>
											<?php
												}
											}
											?>
											<tr>
												<td></td>
												<td>
													<a href="<?php echo site_url('Pasar/Download/print') ?>" target="_blank">
														<button type="button" class="btn btn-primary" data-dismiss="modal">Download</button>
													</a>
													<a href="<?php echo site_url('Pasar/Welcome') ?>">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</li>
						<?php } ?>


						<!-- Topbar -->


						<!-- Sidebar Toggle (Topbar) -->
						<!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button> -->



						<!-- Topbar Navbar -->


						<!--Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
								aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small"
											placeholder="Search for..." aria-label="Search"
											aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-3 d-none d-lg-inline text-gray-600 medium"><b><?= $this->session->userdata('nama_pegawai') ?></b></span>
								<img class="img-profile rounded-circle"
									src="<?= base_url('template/img/undraw_profile.svg'); ?>">
							</a>
							<!-- Dropdown - User Information -->
							<?php if ($this->session->userdata('level') == 'Admin') { ?>
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
									aria-labelledby="userDropdown">

									<div class="dropdown-divider"></div>
									<center><a class="dropdown-item"><b>
												DINKUKMP<br>
												<?= $this->session->userdata('level') ?>
											</b></a></center>
									<hr>
									<a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Logout
									</a>
								</div>
							<?php } elseif ($this->session->userdata('level') == 'Dinas') { ?>
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
									aria-labelledby="userDropdown">

									<div class="dropdown-divider"></div>
									<center><a class="dropdown-item"><b>
												DINKUKMP<br>
												<?= $this->session->userdata('level') ?>
											</b></a></center>
									<hr>
									<a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Logout
									</a>
								</div>
							<?php } elseif ($this->session->userdata('level') == 'Kdinas') { ?>
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
									aria-labelledby="userDropdown">

									<div class="dropdown-divider"></div>
									<center><a class="dropdown-item"><b>
												DINKUKMP<br>
												Kepala Dinas
											</b></a></center>
									<hr>
									<a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Logout
									</a>
								</div>
							<?php } elseif ($this->session->userdata('level') == 'Pasar') { ?>
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
									aria-labelledby="userDropdown">

									<div class="dropdown-divider"></div>
									<center><a class="dropdown-item"><b>
												<?= $this->session->userdata('nama_pasar') ?><br>
												<?= $this->session->userdata('level') ?>
											</b></a></center>
									<hr>
									<a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Logout
									</a>
								</div>
							<?php } ?>

						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<?= $content ?>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->


			<?php include "footer.php"; ?>

			<!-- End of Content Wrapper -->

		</div>
		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">LOGOUT?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Apakah yakin ingin logout?</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="<?php echo site_url('Auth/logout') ?>">Logout</a>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url('vendor/jquery/jquery.min.js'); ?>"></script>
	<script src=" <?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

	<!-- Core plugin JavaScript-->
	<script src=" <?php echo base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

	<!-- Custom scripts for all pages-->
	<!-- <script src=" <?php echo base_url('template/'); ?> js/sb-admin-2.min.js"></script> -->

	<!-- Page level plugins -->
	<script src="<?php echo base_url('vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('vendor/datatables/dataTables.bootstrap4.min.js'); ?> "></script>

	<!-- Page level custom scripts -->
	<script src="<?php echo base_url('template/'); ?>js/demo/datatables-demo.js"></script>
	<script src="<?php echo base_url('template/'); ?> js/jquery-3.2.1.min.js "></script>

</body>

</html>