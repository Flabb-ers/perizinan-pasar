<?= $this->session->flashdata('pesan') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Kios/Los</h6>
		</div>
		<div class="card-body">
			<a href="<?php echo site_url('Admin/Kios/create') ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
					Tambah Data
				</button></a>

			<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#importExcel" onclick="return confirm('Siapkan data excel dengan header: \nKode Pasar, Kode Tarif, Nama Blok, No Blok, Panjang, Lebar\nKlik Oke dan Download Kode Pasar & Kode Tarif untuk menyesuaikan Kode Pasar&Tarif dan Download Template untuk penyesuaian format yang akan diimport  ')">
				IMPORT EXCEL
			</button> <br><br>

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Pasar</th>
							<th>Tipe Pasar</th>
							<th>Jenis</th>
							<th>Letak</th>
							<th>Tarif</th>
							<th>Nama Blok</th>
							<th>No Blok</th>
							<th>Panjang</th>
							<th>Lebar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						foreach ($datakios as $key) {
						?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?= $key->nama_pasar ?></td>
								<td><?= $key->tipe_pasar ?></td>
								<td><?= $key->jenis ?></td>
								<td><?= $key->letak_kioslos ?></td>
								<td><?= $key->tarif ?></td>
								<td><?= $key->nama_blok ?></td>
								<td><?= $key->no_blok ?></td>
								<td><?= $key->panjang ?></td>
								<td><?= $key->lebar ?></td>

								<td>
									<a href="<?php echo site_url('Admin/Kios/edit/' . $key->id_kios) ?>" class="btn btn-success"><i class="fa fa-edit">Edit</i></a>
									<a href="<?php echo site_url('Admin/Kios/hapus/' . $key->id_kios) ?>" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $key->jenis; ?> <?php echo $key->nama_blok; ?> <?php echo $key->no_blok; ?>')" class="btn btn-danger"><i class="fa fa-trash">Hapus</i></a>
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
<!-- End of Content Wrapper -->

<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="<?php echo site_url('Admin/Kios/importWp'); ?>" enctype="multipart/form-data">
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
						<a class="dropdown-item" href="<?php echo site_url('Admin/Kios/download_Kpasar'); ?>" target="_blank">Kode Pasar</a>
						<a class="dropdown-item" href="<?php echo site_url('Admin/Kios/download_Ktarif'); ?>" target="_blank">Kode Tarif</a>
						<a class="dropdown-item" href="<?php echo site_url('Admin/Kios/download_template'); ?>" target="_blank">Template</a>
					</div>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="submit" class="btn btn-primary">Import</button>

				</div>
			</div>
		</form>
	</div>
</div>
