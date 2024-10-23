<?= $this->session->flashdata('pesan') ?>
<?php
if ($this->session->flashdata('message')) {
	echo $this->session->flashdata('message');
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Wajib Retribusi</h6>
		</div>
		<div class="card-body">
			<a href="<?php echo site_url('Admin/Wp/create') ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
					Tambah Data
				</button></a>
			<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#importExcel" onclick="return confirm('Siapkan data excel dengan header: \nKode Pasar, Nama Pasar, NPWRD, Nama, NIK, Alamat, No. Telepon, Email\nKlik Oke dan Download Kode Pasar untuk menyesuaikan Kode Pasar dan Download Template untuk penyesuaian format yang akan diimport  ')">
				IMPORT EXCEL
			</button><br><br>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode WP</th>
							<th>NPWRD</th>
							<th>Nama</th>
							<th>Nama Pasar</th>
							<td>Alamat</td>
							<td>NIK</td>
							<td>No. Telp</td>
							<td>Email</td>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						foreach ($datawp as $key) {
						?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?= $key->kode_wp ?></td>
								<td><?= $key->npwrd ?></td>
								<td><?= $key->nama ?></td>
								<td><?= $key->nama_pasar ?></td>
								<td><?= $key->alamat ?></td>
								<td><?= $key->nik ?></td>
								<td><?= $key->no_telp ?></td>
								<td><?= $key->email ?></td>

								<td>
									<a href="<?php echo site_url('Admin/Wp/edit/' . $key->id_wajib_pajak) ?>" class="btn btn-success"><i class="fa fa-edit">Edit</i></a>
									<a href="<?php echo site_url('Admin/Wp/hapus/' . $key->id_wajib_pajak) ?>" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $key->nama ?>')" class="btn btn-danger"><i class="fa fa-trash">Hapus</i></a>
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
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="<?php echo site_url('Admin/Wp/importWp'); ?>" enctype="multipart/form-data">
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
						<a class="dropdown-item" href="<?php echo site_url('Admin/Wp/download_Kpasar'); ?>" target="_blank">Kode Pasar</a>
						<a class="dropdown-item" href="<?php echo site_url('Admin/Wp/download_template'); ?>" target="_blank">Template</a>
					</div>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="submit" class="btn btn-primary">Import</button>

				</div>
			</div>
		</form>
	</div>
</div>
