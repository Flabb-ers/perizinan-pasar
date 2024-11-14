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
				<h6 class="m-0 font-weight-bold text-primary">Data Permohonan Perpanjang</h6>
			</div>
			<div class="box-body">
				<form class="" action="<?php echo site_url('Pasar/Persyaratan2/create') ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="modal-body">
						<div class="form-group row">
							<div class="col-md-6 mb-6 mb-sm-0">
								<label>Kios</label>
								<select class="form-control" name="id_objek_pajak" id="pengajuan" style="width: 100%;" required>
									<option value="">---Pilih Data Perpanjangan---</option>
									<?php
									foreach ($datawp as $key) {
									?>
										<option value="<?= $key->id_objek_pajak ?>" required><?php echo $key->jenis ?> <?php echo $key->nama_blok ?> <?php echo $key->no_blok ?></option>
									<?php } ?>
								</select>
							</div>
							<input type="hidden" name="nik" id="nik" class="form-control">
							<input type="hidden" name="id_kios" id="id_kios" class="form-control">
							<input type="hidden" name="id_jenis" id="id_jenis" class="form-control">
							<div class="col-md-6">
								<label>Nama</label>
								<input type="text" name="nama" id="nama" class="form-control" readonly>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 mb-6 mb-sm-0">
								<label>NPWRD</label>
								<input type="text" name="npwrd" id="npwrd" class="form-control" readonly>

							</div>
							<div class="col-md-6">
								<label>Alamat</label>
								<input type="text" name="alamat" id="alamat" class="form-control" readonly>

							</div>
						</div>

						<input type="hidden" name="tanggal" id="tanggal" value=" <?php echo date('d-m-Y') ?>" class="form-control" readonly>
						<input type="hidden" name="no_telp" id="no_telp" class="form-control" readonly>
						<input type="hidden" name="email" id="email" class="form-control" readonly>


						<div class="form-group">
							<div class="col-md-12 col-sm-7  offset-md-10">
								<a href="<?php echo site_url('Pasar/Persyaratan2') ?>"><button name="simpan" type="submit" class="btn btn-primary">Submit</button></a>
								<button type="reset" name="reset" class="btn btn-danger">Reset</button>
							</div>
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
											<td>Kios</td>
											<td>Alamat</td>
											<td>Jenis Dagangan</td>
											<td>Tanggal</td>
											<td>Aksi</td>

										</tr>
									</thead>
									<tbody>

										<?php
										$no = 1;
										foreach ($dataP as $key) {
										?>
											<tr>
												<td><?php echo $no ?></td>
												<td><?= $key->nama_pasar ?></td>
												<td><?= $key->nama ?></td>
												<td><?= $key->npwrd ?></td>
												<td><?= $key->jenis ?> <?= $key->nama_blok ?> <?= $key->no_blok ?></td>
												<td><?= $key->alamat ?></td>
												<td><?= $key->jenis_dagangan ?></td>
												<td><?= date('d-m-Y', strtotime($key->tanggal)) ?></td>
												<td>
													<button class="btn btn-info btn-sm dropdown-toggle" type="button"
														id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
														aria-expanded="false"><i class="fa fa-download"></i>Cetak Form</button>
													<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
														<!-- <a class="dropdown-item" href="<?php echo site_url('Pasar/Persyaratan2/sp_kepala/' . $key->id_pengajuan) ?>" target="_blank">SP Kepala</a> -->
														<a class="dropdown-item" href="<?php echo site_url('Pasar/Persyaratan2/sp_pemilik/' . $key->id_pengajuan) ?>" target="_blank">SP Pemilik</a>
														<a class="dropdown-item" href="<?php echo site_url('Pasar/Persyaratan2/surat_pernyataan/' . $key->id_pengajuan) ?>" target="_blank">Surat Pernyataan</a>
													</div>
													<br>
													 <a href="<?php echo site_url('Pasar/Persyaratan2/edit/' . $key->id_pengajuan) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</a><br>
													<a href="<?php echo site_url('Pasar/Persyaratan2/hapus/' . $key->id_pengajuan) ?>" onclick="javascript: return confirm('Yakin Mau dihapus <?= $key->jenis ?> <?= $key->nama_blok ?> <?= $key->no_blok ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus</a><br>

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
			<!-- /.container-fluid -->
		</div>
		<!-- End of Main Content -->
	</div>
	<script src="<?php echo base_url('template/js/jquery-3.2.1.min.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			const status_npwrd = document.getElementById("status_npwrd");
			const npwrd = document.getElementById("npwrd");

			status_npwrd.addEventListener("change", function() {
				if (status_npwrd.value === "Sudah") {
					npwrd.style.display = "block";
				} else {
					npwrd.style.display = "none";
				}
			});


		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			// Menangani perubahan pada elemen dropdown pengajuan
			$('#pengajuan').on('change', function() {
				var id_objek_pajak = $(this).val();

				// Melakukan AJAX untuk memeriksa status file
				$.ajax({
					url: '<?php echo base_url('Pasar/Persyaratan2/getPengajuan'); ?>',
					type: 'POST',
					data: {
						id_objek_pajak: id_objek_pajak,
						<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'

					},
					dataType: 'json',
					success: function(response) {
						if (response.length > 0) {



							$("#id_kios").val(response[0].id_kios);
							$("#id_jenis").val(response[0].id_jenis);
							$("#jenis_dagangan").val(response[0].jenis_dagangan);
							$("#nama").val(response[0].nama);
							$("#npwrd").val(response[0].npwrd);
							$("#alamat").val(response[0].alamat);
							$("#pekerjaan").val(response[0].pekerjaan);
							$("#no_telp").val(response[0].no_telp);
							$("#email").val(response[0].email);
							$("#nik").val(response[0].nik);



						} else {
							$("#jenis_dagangan").val('');
							$("#id_kios").val('');
							$("#id_jenis").val('');
							$("#nama").val('');
							$("#npwrd").val('');
							$("#alamat").val('');
							$("#pekerjaan").val('');
							$("#no_telp").val('');
							$("#email").val('');
							$("#nik").val('');

						}
					},
					error: function(xhr, status, error) {
						console.error(error);
					}
				});
			});

		});
	</script>