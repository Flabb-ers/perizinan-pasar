<?= $this->session->flashdata('pesan') ?>


<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
</head>

<body>

	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Data Permohonan Menempati Kios dan Los</h6>
			</div>
			<div class="card-body">

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<td>No</td>
								<td>Nama Pasar</td>
								<td>Nama</td>
								<td>NPWRD</td>
								<td>NIK</td>
								<td>Alamat</td>
								<td>Nama Kios/Los</td>
								<td>No Kios/Los</td>
								<td>Jenis Dagangan</td>
								<td>Tanggal</td>
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>

							<?php
							$no = 1;
							foreach ($dataop as $key) {
							?>
								<tr>
									<td><?php echo $no ?></td>
									<td><?= $key->nama_pasar ?></td>
									<td><?= $key->nama ?></td>
									<td><?= $key->npwrd ?></td>
									<td><?= $key->nik ?></td>
									<td><?= $key->alamat ?></td>
									<td><?= $key->jenis ?> <?= $key->nama_blok ?></td>
									<td><?= $key->no_blok ?></td>
									<td><?= $key->jenis_dagangan ?></td>
									<td><?= $key->tgl_daftar ?></td>
									<td>

										<a href="<?php echo site_url('Kdinas/Pengajuan/generate/' . $key->id_objek_pajak) ?>" class="btn btn-primary">Proses</a>
									</td>
								</tr>
							<?php
								$no++;
							}
							?>
						</tbody>

					</table>

				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url('template/js/jquery-3.2.1.min.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			const tombolSubmit = document.getElementById("tombolSubmit");

			tombolSubmit.addEventListener("click", function() {
				this.disabled = true;
			});
		});
	</script>
