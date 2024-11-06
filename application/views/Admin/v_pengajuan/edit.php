<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-6">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Edit Data Permohonan Perpanjang</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="box box-warning">
						<div class="box-body">
							<?php echo form_open_multipart('Admin/Pengajuan/update/' . $datapengajuan->id_pengajuan) ?>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<div class="modal-body">
								<div class="form-group row">
									<div class="col-md-6 mb-6 mb-sm-0">
										<label>Nama Pasar</label>
										<input type="text" name="id_kios" id="id_kios" value="<?php echo $datapengajuan->nama_pasar ?>" class="form-control" readonly>
									</div>
									<div class="col-md-6">
										<label>Kios</label>
										<input type="text" name="id_kios" id="id_kios" value="<?php echo $datapengajuan->jenis ?> No <?php echo $datapengajuan->nama_blok ?> <?php echo $datapengajuan->no_blok ?>" class="form-control" readonly>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-6 mb-6 mb-sm-0">
										<label>Nama</label>
										<input type="text" name="nama" id="nama" value="<?php echo $datapengajuan->nama ?>" class="form-control" readonly>
									</div>
									<div class="col-md-6">
										<label>NPWRD</label>
										<input type="text" value="<?php echo $datapengajuan->npwrd ?>" name="npwrd" pattern="[A-Za-z ]+" class="form-control" readonly>
									</div>
								</div>

								<div class="form-group row">

									<div class="col-md-6 mb-6 mb-sm-0">
										<label>NIK</label>
										<input type="text" name="nik" pattern="[0-9]{16}" value="<?php echo $datapengajuan->nik ?>" class="form-control" readonly>
									</div>
									<div class="col-md-6">
										<label>Alamat</label>
										<input type="text" name="alamat" value="<?php echo $datapengajuan->alamat ?>" class="form-control" readonly>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6 mb-6 mb-sm-0">
										<label>No Telp</label>
										<input type="text" name="no_telp" value="<?php echo $datapengajuan->no_telp ?>" class="form-control" readonly>
									</div>
									<div class="col-md-6">
										<label>Email</label>
										<input type="email" name="email" value="<?php echo $datapengajuan->email ?>" class="form-control" readonly>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6 mb-6 mb-sm-0">
										<label>Jenis Dagangan</label>
										<input type="text" name="id_jenis" value="<?php echo $datapengajuan->jenis_dagangan ?>" class="form-control" readonly>
									</div>
									<div class="col-md-6">
										<label>Tanggal Pengajuan</label>
										<input type="text" name="tanggal" value="<?php echo $datapengajuan->tanggal ?>" class="form-control" readonly>
									</div>
								</div>

								<div class="form-group row">
									<!-- <div class="col-md-6 mb-6 mb-sm-0">
										<label>SP Kepala</label><br>
										<img src="<?= base_url('./template/img/syarat2/' . $datapengajuan->sp_kepala); ?>" class="img-rounded" width="100px">
										<input type="file" name="sp_kepala" class="form-control">
										<input type="hidden" name="sp_kepala_lama" value="<?php echo $datapengajuan->sp_kepala ?>" class="form-control">
									</div> -->
									<div class="col-md-6 mb-6 mb-sm-0">
										<label>Pas Foto</label><br>
										<img src="<?= base_url('./template/img/syarat2/' . $datapengajuan->pas_foto); ?>" class="img-rounded" width="100px">
										<input type="file" name="pas_foto" class="form-control">
										<input type="hidden" name="pas_foto_lama" value="<?php echo $datapengajuan->pas_foto ?>" class="form-control">
									</div>
									<div class="col-md-6">
										<label>SP Pemilik</label><br>

										<img src="<?= base_url('./template/img/syarat2/' . $datapengajuan->sp_pemilik); ?>" class="img-rounded" width="100px">
										<input type="file" name="sp_pemilik" class="form-control">
										<input type="hidden" name="surat_pemilik_lama" value="<?php echo $datapengajuan->sp_pemilik ?>" class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6 mb-6 mb-sm-0">
										<label>Surat Pernyataan</label><br>

										<img src="<?= base_url('./template/img/syarat2/' . $datapengajuan->surat_pernyataan); ?>" class="img-rounded" width="100px">
										<input type="file" name="surat_pernyataan" class="form-control">
										<input type="hidden" name="surat_pernyataan_lama" value="<?php echo $datapengajuan->surat_pernyataan ?>" class="form-control">
									</div>
									<div class="col-md-6">
										<label>KTP Pemilik</label><br>
										<img src="<?= base_url('./template/img/syarat2/' . $datapengajuan->ktp_pemilik); ?>" class="img-rounded" width="100px">
										<input type="file" name="ktp_pemilik" class="form-control">
										<input type="hidden" name="ktp_pemilik_lama" value="<?php echo $datapengajuan->ktp_pemilik ?>" class="form-control">
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-6">
										<label class=" text-danger">Keterangan:<br>1. Semua persyaratan wajib diisi<br>2. Format yang digunakan adalah jpeg/jpg/png</label>
									</div>
								</div>


								<button type="submit" value="Simpan" class="btn btn-primary">Submit</button>
								<a href="<?php echo site_url('Admin/Pengajuan') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>
									<?php echo form_close(); ?>
							</div>
						</div>
					</div>
					</section>
				</div>

				<!-- /.container-fluid -->
			</div>
			<!-- End of Main Content -->
		</div>
		<!-- End of Content Wrapper -->

		<!-- Begin Page Content -->

	</div>
</div>