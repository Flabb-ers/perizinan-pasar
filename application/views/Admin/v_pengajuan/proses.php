<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-6">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Proses Data Permohonan Perpanjang</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="box box-warning">
						<div class="box-body">
							<?php echo form_open_multipart('Admin/Pengajuan/UpdateProses/' . $datapengajuan->id_pengajuan) ?>
							<div class="modal-body">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">


								<div class="form-group row">
									<label class="col-md-3 col-sm-3">Nama Pasar</label>
									<div class="col-md-9 col-sm-9">
										<input type="text" name="id_kios" id="id_kios" value="<?php echo $datapengajuan->nama_pasar ?>" class="form-control" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 col-sm-3">Kios</label>
									<div class="col-md-9 col-sm-9">
										<input type="text" name="id_kios" id="id_kios" value="<?php echo $datapengajuan->jenis ?> No <?php echo $datapengajuan->nama_blok ?> <?php echo $datapengajuan->no_blok ?>" class="form-control" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 col-sm-3">Nama Wajib Pajak</label>
									<div class="col-md-9 col-sm-9">
										<input type="text" value="<?php echo $datapengajuan->nama ?>" name="nama" class="form-control" disabled>
									</div>
								</div>
								<div class="form-group row">

									<label class="col-md-3 col-sm-3">NPWRD</label>
									<div class="col-md-9 col-sm-9">
										<input type="text" name="npwrd" pattern="[A-Za-z ]+" value="<?php echo $datapengajuan->npwrd ?>" class="form-control" disabled>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 col-sm-3">NIK</label>
									<div class="col-md-9 col-sm-9">
										<input type="text" name="nik" pattern="[0-9]{16}" value="<?php echo $datapengajuan->nik ?>" class="form-control" disabled>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 col-sm-3">Alamat</label>
									<div class="col-md-9 col-sm-9">
										<input type="text" name="alamat" value="<?php echo $datapengajuan->alamat ?>" class="form-control" disabled>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-sm-3">No Telp</label>
									<div class="col-md-9 col-sm-9">
										<input type="text" name="no_telp" value="<?php echo $datapengajuan->no_telp ?>" class="form-control" disabled>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 col-sm-3">Email</label>
									<div class="col-md-9 col-sm-9">
										<input type="text" name="email" value="<?php echo $datapengajuan->email ?>" class="form-control" disabled>
									</div>
								</div>
								<div class="form-group row">

									<label class="col-md-3 col-sm-3">Jenis Dagangan</label>
									<div class="col-md-9 col-sm-9">
										<input type="text" name="id_jenis" pattern="[A-Za-z ]+" value="<?php echo $datapengajuan->jenis_dagangan ?>" class="form-control" disabled>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 col-sm-3">Surat Permohonan Kepala Pasar</label><br>
									<div class="col-md-3 col-sm-3">
										<img src="<?= base_url('./template/img/syarat2/' . $datapengajuan->sp_kepala); ?>" class="img-rounded" width="100px">
									</div>

									<label class="col-md-3 col-sm-3">KTP Pemilik</label><br>
									<div class="col-md-3 col-sm-3">
										<img src="<?= base_url('./template/img/syarat2/' . $datapengajuan->ktp_pemilik); ?>" class="img-rounded" width="100px">
									</div>
								</div>


								<div class="form-group row">
									<label class="col-md-3 col-sm-3">Surat Pernyataan</label><br>
									<div class="col-md-3 col-sm-3">
										<img src="<?= base_url('./template/img/syarat2/' . $datapengajuan->surat_pernyataan); ?>" class="img-rounded" width="100px">
									</div>
									<label class="col-md-3 col-sm-3">Pas Foto</label><br>
									<div class="col-md-3 col-sm-3">
										<img src="<?= base_url('./template/img/syarat2/' . $datapengajuan->pas_foto); ?>" class="img-rounded" width="100px">

									</div>
								</div>

								<div class="form-group row">

									<label class="col-md-3 col-sm-3">Surat Permohonan Pemohon</label><br>
									<div class="col-md-3 col-sm-3">
										<img src="<?= base_url('./template/img/syarat2/' . $datapengajuan->sp_pemilik); ?>" class="img-rounded" width="100px">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 col-sm-3">Status</label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control select2bs4" name="status" style="width: 100%;" required>
											<option selected="selected"><?php echo $datapengajuan->status ?></option>
											<option value="Proses">Proses</option>
											<option value="Menunggu TTD">Menunggu TTD</option>
											<option value="Selesai">Selesai</option>
											<option value="Gagal">Gagal</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-sm-3">Keterangan</label>
									<div class="col-md-9 col-sm-9">
										<input type="text" name="keterangan" value="<?php echo $datapengajuan->keterangan ?>" class="form-control">
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
	</div>
	<!-- End of Content Wrapper -->

	<!-- Begin Page Content -->

</div>

<script src="<?php echo base_url('template/js/jquery-3.2.1.min.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		const status = document.getElementById("status");
		const perbarui = document.getElementById("perbarui");

		status.addEventListener("change", function() {
			if (status.value === "Selesai") {
				perbarui.style.display = "block";
			} else {
				perbarui.style.display = "none";
			}
		});


	});
</script>
