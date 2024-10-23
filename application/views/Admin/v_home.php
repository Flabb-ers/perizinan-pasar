<?= $this->session->flashdata('pesan') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
		</div>
		<div class="card-body">
			<div class="card mb-3" style="max-width: 540px;">
				<div class="row g-0">
					<div class="col-md-4">
						<img src="<?= base_url('template/img/profile.jpg'); ?>" class="img-fluid rounded-start">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title"><?= $this->session->userdata('nama_pegawai') ?></h5>
						</div>
					</div>
				</div>
			</div></br></br></br>
			<div class="row ">
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Jumlah Permohonan Baru</div>

									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<h3 class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->query("SELECT * FROM tbl_pengajuan where jenis_pengajuan = 'Baru'")->num_rows() ?></h3>
									</div>

								</div>
								<div class="col-auto">
									<i class="fas fa-calendar fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Jumlah Permohonan Perpanjang</div>

									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<h3 class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->query("SELECT * FROM tbl_pengajuan where jenis_pengajuan = 'Perpanjang'")->num_rows() ?></h3>
									</div>

								</div>
								<div class="col-auto">
									<i class="fas fa-calendar fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Jumlah Objek Pajak</div>

									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<h3 class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->query("SELECT * FROM tbl_op")->num_rows() ?></h3>
									</div>

								</div>
								<div class="col-auto">
									<i class="fas fa-calendar fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Jumlah Wajib Pajak</div>

									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<h3 class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->query("SELECT * FROM tbl_wp")->num_rows() ?></h3>
									</div>

								</div>
								<div class="col-auto">
									<i class="fas fa-calendar fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row ">
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Jumlah Kios</div>

									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<h6 class="font-weight-bold text-gray-800">Jumlah Kios =
											<?php

											$total = $this->db->query("
                                        SELECT * 
                                        FROM tbl_kios 
                                        JOIN tbl_pasar ON tbl_kios.id_pasar=tbl_pasar.id_pasar 
                                        JOIN tbl_tarif ON tbl_kios.id_tarif=tbl_tarif.id_tarif 
                                        where tbl_tarif.jenis = 'Kios'
                                       ")->num_rows()
											?>
											<?= $total ?>
										</h6>
										<h6 class="font-weight-bold text-gray-800">Jumlah Kios Terpakai =
											<?php
											$tgl_sekarang = date('Y-m-d');
											$jml_terpakai = $this->db->query("
                                    SELECT * 
                                    FROM tbl_op 
                                    JOIN tbl_kios ON tbl_op.id_kios=tbl_kios.id_kios 
                                    JOIN tbl_tarif ON tbl_kios.id_tarif=tbl_tarif.id_tarif 
                                    where tbl_tarif.jenis = 'Kios'
                                    and tbl_op.batas_berlaku >= '$tgl_sekarang'
                                   ")->num_rows()
											?>
											<?= $jml_terpakai ?>
										</h6>
										<h6 class="font-weight-bold text-gray-800">Jumlah Kios Kosong =
											<?php
											$jml_kosong = $total - $jml_terpakai;
											?>
											<?= $jml_kosong ?>
										</h6>
									</div>

								</div>
								<div class="col-auto">
									<i class="fas fa-calendar fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Jumlah Los</div>

									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<h6 class="font-weight-bold text-gray-800">Jumlah Los =
											<?php
											$total = $this->db->query("
                                        SELECT * 
                                        FROM tbl_kios 
                                        JOIN tbl_pasar ON tbl_kios.id_pasar=tbl_pasar.id_pasar 
                                        JOIN tbl_tarif ON tbl_kios.id_tarif=tbl_tarif.id_tarif 
                                        where tbl_tarif.jenis = 'Los'
                                       ")->num_rows()
											?>
											<?= $total ?>
										</h6>
										<h6 class="font-weight-bold text-gray-800">Jumlah Los Terpakai =
											<?php
											$tgl_sekarang = date('Y-m-d');
											$jml_terpakai = $this->db->query("
                                    SELECT * 
                                    FROM tbl_op 
                                    JOIN tbl_kios ON tbl_op.id_kios=tbl_kios.id_kios 
                                    JOIN tbl_pasar ON tbl_kios.id_pasar=tbl_pasar.id_pasar 
                                    JOIN tbl_tarif ON tbl_kios.id_tarif=tbl_tarif.id_tarif 
                                    where tbl_tarif.jenis = 'Los'
                                    and tbl_op.batas_berlaku >= '$tgl_sekarang'
                                    ")->num_rows()
											?>
											<?= $jml_terpakai ?>
										</h6>
										<h6 class="font-weight-bold text-gray-800">Jumlah Los Kosong =
											<?php
											$jml_kosong = $total - $jml_terpakai;
											?>
											<?= $jml_kosong ?>
										</h6>
									</div>

								</div>
								<div class="col-auto">
									<i class="fas fa-calendar fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<!-- /.container-fluid -->
		</div>
		<!-- End of Main Content -->
	</div>
</div>
	<!-- End of Content Wrapper -->
