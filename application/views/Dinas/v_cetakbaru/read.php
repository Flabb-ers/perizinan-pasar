<?= $this->session->flashdata('pesan') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Cetak SIMK/SIML</h6>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td>No</td>
							<td>NPWRD</td>
							<td>Nama Wajib Pajak</td>
							<td>NIK</td>
							<td>Alamat</td>
							<td>Nama Pasar</td>
							<td>Nama Blok</td>
							<td>No Blok</td>
							<td>Jenis Dagangan</td>
							<td>Tanggal Daftar /Perpanjang</td>
							<td>Batas Berlaku</td>
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
								<td><?= $key->npwrd ?></td>
								<td><?= $key->nama ?></td>
								<td><?= $key->nik ?></td>
								<td><?= $key->alamat ?></td>
								<td><?= $key->nama_pasar ?></td>
								<td><?= $key->nama_blok ?></td>
								<td><?= $key->no_blok ?></td>
								<td><?= $key->jenis_dagangan ?></td>
								<td><?= $key->tgl_daftar ?></td>
								<td><?= $key->batas_berlaku ?></td>
								<td>
									<a href="<?= base_url('Dinas/Cetak2/print/' . $key->id_objek_pajak); ?>" target="_blank" class="btn btn-danger"><i class="fa fa-download">Cetak</i></a>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal-<?= $key->id_objek_pajak; ?>">
										<i class="fa fa-upload"></i> Upload Gambar
									</button>
								</td>
							</tr>

							<!-- Modal Upload Gambar -->
							<div class="modal fade" id="uploadModal-<?= $key->id_objek_pajak; ?>" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="uploadModalLabel">Upload Gambar</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<!-- Menampilkan NPWRD dan Nama di Modal -->
											<p><strong>NPWRD:</strong> <?= $key->npwrd ?></p>
											<p><strong>Nama Wajib Pajak:</strong> <?= $key->nama ?></p>
											<form action="<?= base_url('Dinas/Cetak2/upload/' . $key->id_objek_pajak); ?>" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
												<div class="form-group">
													<label for="foto">Pilih Gambar</label>
													<input type="file" class="form-control-file" id="foto" name="foto" required>
												</div>
												<button type="submit" class="btn btn-success">Upload</button>
											</form>
										</div>
									</div>
								</div>
							</div>

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