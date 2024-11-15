<?= $this->session->flashdata('pesan') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Detail Objek Retribusi</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td>No</td>
							<td>NPWRD</td>
							<td>Nama Wajib Retribusi</td>
							<td>Alamat</td>
							<td>Nama Pasar</td>
							<td>Nama Blok</td>
							<td>No Blok</td>
							<td>Jenis Dagangan</td>
							<td>Tanggal Daftar /Perpanjang</td>
							<td>Batas Berlaku</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						foreach ($dataop as $key) {
						?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?= $key->npwrd ?></td>
								<td><?= $key->nama ?></td>
								<td><?= $key->alamat ?></td>
								<td><?= $key->nama_pasar ?></td>
								<td><?= $key->nama_blok ?></td>
								<td><?= $key->no_blok ?></td>
								<td><?= $key->jenis_dagangan ?></td>
								<td><?php echo date('d-m-Y', strtotime($key->tgl_daftar)) ?></td>
								<td><?php echo date('d-m-Y', strtotime($key->batas_berlaku)) ?></td>

								<td>Aktif</td>
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

<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="<?php echo site_url('Dinas/Op/importWp'); ?>" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
				</div>
				<div class="modal-body">


					<label>Pilih file excel</label>
					<div class="form-group">
						<input type="file" name="file_excel" required="required">
					</div>

				</div>
				<div class="modal-footer">
					<button class="btn btn-info btn-sm dropdown-toggle" type="button"
						id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false"><i class="fa fa-download"></i>Download</button>
					<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?php echo site_url('Dinas/Op/download_Kios'); ?>" target="_blank">Kode Kios</a>
						<a class="dropdown-item" href="<?php echo site_url('Dinas/Op/download_Jenis'); ?>" target="_blank">Kode Jenis</a>
						<a class="dropdown-item" href="<?php echo site_url('Dinas/Op/download_template'); ?>" target="_blank">Template</a>
					</div>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="submit" class="btn btn-primary">Import</button>

				</div>
			</div>
		</form>
	</div>
</div>
