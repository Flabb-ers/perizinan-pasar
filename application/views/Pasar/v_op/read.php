<?= $this->session->flashdata('pesan') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Objek Retribusi</h6>
		</div>
		<div class="card-body">
			<!-- <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#importExcel2" onclick="return confirm('Siapkan data excel dengan header: \nKode Wajib Retribusi\nKlik Oke dan Download Kode Wajib Retibusi untuk menyesuaikan Kode Wajib Ret dan Download Template untuk penyesuaian format yang akan diimport  ')">
				IMPORT OBJEK RETRIBUSI
			</button>
			<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#importExcel" onclick="return confirm('Siapkan data excel dengan header: \nKode Wajib Ret, Kode Kios, Kode Jenis, Nama Pasar, NPWRD, Nama, Alamat, No. Telepon, Email, Jenis, Nama Blok, No Blok, Tgl Daftar, Batas Berlaku, Status = Sudah\nKlik Oke dan Download Kode Objek Retribusi untuk menyesuaikan Kode Objek Ret dan Download Template untuk penyesuaian format yang akan diimport  ')">
				IMPORT DETAIL OBJEK RETRIBUSI
			</button> -->
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td>No</td>
							<td>NPWRD</td>
							<td>Nama Wajib Retribusi</td>
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
								<td><?= $key->npwrd ?></td>
								<td><?= $key->nama ?></td>

								<td>
									<a href="<?php echo site_url('Pasar/Op/detail/' . $key->id_objek) ?>" class="btn btn-warning"><i class="fa fa-edit"> Detail</i></a>
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

<!-- <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="<?php echo site_url('Dinas/Op/importOp'); ?>" enctype="multipart/form-data">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
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
						<a class="dropdown-item" href="<?php echo site_url('Dinas/Op/download_OP'); ?>" target="_blank">Kode Objek Retribusi</a>
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


<div class="modal fade" id="importExcel2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="<?php echo site_url('Dinas/Op/importWp'); ?>" enctype="multipart/form-data">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
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
						<a class="dropdown-item" href="<?php echo site_url('Dinas/Op/download_WP'); ?>" target="_blank">Kode Wajib Retribusi</a>
						<a class="dropdown-item" href="<?php echo site_url('Dinas/Op/download_templateWP'); ?>" target="_blank">Template</a>
					</div>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="submit" class="btn btn-primary">Import</button>
				</div>
			</div>
		</form>
	</div>
</div> -->