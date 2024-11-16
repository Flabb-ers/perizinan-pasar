<?= $this->session->flashdata('pesan') ?>

<!-- 
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
</head>

<body> -->

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Form Pengajuan Baru</h6>
		</div>
		<div class="box-body">
			<form action="<?php echo site_url('Pasar/Persyaratan/create') ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

					<div class="form-group row">
						<label class="col-md-2 col-sm-0">Nama Pasar</label>
						<div class="col-md-10 mb-10 col-sm-">
							<input type="text" name="nama_pasar" value="<?= $this->session->userdata('nama_pasar') ?>" class="form-control" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 col-sm-2">Nama Wajib Pajak</label>
						<div class="col-md-4 mb-6 col-sm-">
							<input type="text" name="nama" value="<?= set_value('nama') ?>" pattern="[A-Za-z ]+" class="form-control" required>
							<?php echo form_error('nama', '<div class="text-danger">', '</div>'); ?>
						</div>
						<label class="col-md-2 col-sm-2">Kios/Los</label>
						<div class="col-md-4 col-sm-">
							<select class="form-control" name="id_kios" id="id_kios" style="width: 100%;" required>
								<option value="">---Pilih Kios---</option>
								<?php foreach ($datakios as $key) { ?>
									<option value="<?= $key->id_kios ?>" <?= set_select('id_kios', $key->id_kios); ?>><?php echo $key->jenis . ' ' . $key->nama_blok . ' No ' . $key->no_blok ?></option>
								<?php } ?>
							</select>
							<?php echo form_error('id_kios', '<div class="text-danger">', '</div>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 col-sm-0">NIK</label>
						<div class="col-md-4 mb-6 col-sm-">
							<input type="text" name="nik" value="<?= set_value('nik') ?>" pattern="[0-9]{16}" class="form-control" required>
							<?php echo form_error('nik', '<div class="text-danger">', '</div>'); ?>
						</div>
						<label class="col-md-2 col-sm-2">Alamat</label>
						<div class="col-md-4 col-sm-">
							<input type="text" name="alamat" value="<?= set_value('alamat') ?>" pattern="[0-9A-Za-z., ]+" class="form-control" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 col-sm-0">No Telp</label>
						<div class="col-md-4 mb-6 col-sm-">
							<input type="text" name="no_telp" value="<?= set_value('no_telp', '+62') ?>" class="form-control" required placeholder="Cth: +628">
							<?php echo form_error('no_telp', '<div class="text-danger">', '</div>'); ?>
						</div>
						<label class="col-md-2 col-sm-2">Jenis Dagangan</label>
						<div class="col-md-4 col-sm-">
							<select class="form-control select2bs4" name="id_jenis" style="width: 100%;" required>
								<option value="">---Pilih---</option>
								<?php foreach ($datajenis as $key) { ?>
									<option value="<?= $key->id_jenis ?>" <?= set_select('id_jenis', $key->id_jenis); ?>><?= $key->jenis_dagangan ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 col-sm-0">Status NPWRD</label>
						<div class="col-md-4 mb-6 col-sm-">
							<select class="form-control" name="status_npwrd" id="status_npwrd" style="width: 100%;" required>
								<option value="Belum" <?= set_select('status_npwrd', 'Belum'); ?>>Belum Memiliki</option>
								<option value="Sudah" <?= set_select('status_npwrd', 'Sudah'); ?>>Sudah Memiliki</option>
							</select>
						</div>
						<label class="col-md-2 col-sm-2">Email</label>
						<div class="col-md-4 col-sm-">
							<input type="email" name="email" value="<?= set_value('email') ?>" class="form-control" required>
							<?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 col-sm-0"></label>
						<div class="col-md-4 mb-6 col-sm-" id="npwrd" style="display: <?= set_value('status_npwrd') == 'Sudah' ? 'block' : 'none'; ?>;">
							<input type="text" name="npwrd" value="<?= set_value('npwrd') ?>" pattern="[0-9]{14}" class="form-control" placeholder="Masukkan NPWRD">
							<?php echo form_error('npwrd', '<div class="text-danger">', '</div>'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12 col-sm-7 offset-md-10">
							<button name="simpan" type="submit" class="btn btn-primary">Submit</button>
							<button type="reset" name="reset" class="btn btn-danger">Reset</button>
						</div>
					</div>
				</div>
			</form>


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
							foreach ($databaru as $key) {
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
											<!-- <a class="dropdown-item" href="<?php echo site_url('Pasar/Persyaratan/sp_kepala/' . $key->id_pengajuan) ?>" target="_blank">SP Kepala</a> -->
											<a class="dropdown-item" href="<?php echo site_url('Pasar/Persyaratan/ba_penunjukan/' . $key->id_pengajuan) ?>" target="_blank">Berita Acara Penunjukan</a>
											<a class="dropdown-item" href="<?php echo site_url('Pasar/Persyaratan/sp_pemilik/' . $key->id_pengajuan) ?>" target="_blank">SP Pemilik</a>
											<a class="dropdown-item" href="<?php echo site_url('Pasar/Persyaratan/surat_pernyataan/' . $key->id_pengajuan) ?>" target="_blank">Surat Pernyataan</a>
										</div>
										<br>
										<a href="<?php echo site_url('Pasar/Persyaratan/edit/' . $key->id_pengajuan) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</a><br>
										<a href="<?php echo site_url('Pasar/Persyaratan/hapus/' . $key->id_pengajuan) ?>" onclick="javascript: return confirm('Yakin Mau dihapus <?= $key->jenis ?> <?= $key->nama_blok ?> <?= $key->no_blok ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus</a><br>

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
<script src="<?php echo base_url('template/js/jquery-3.2.1.min.js') ?>"></script>

<script>
	document.getElementById('status_npwrd').addEventListener('change', function() {
		var npwrdField = document.getElementById('npwrd');
		var npwrdInput = npwrdField.querySelector('input');
		if (this.value == 'Sudah') {
			npwrdField.style.display = 'block';
		} else {
			npwrdField.style.display = 'none';
			npwrdInput.value = '';
		}
	});
</script>

</script>