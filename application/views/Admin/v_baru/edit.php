<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-6">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Data Permohonan Baru</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="box box-warning">
						<div class="box-body">
							<?php echo form_open_multipart('Admin/Baru/update/' . $databaru->id_pengajuan) ?>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

							<div class="modal-body">
								<div class="form-group row">
									<div class="col-md-6 mb-6 mb-sm-0">
										<label>Nama Pasar</label>
										<select class="form-control" name="id_kios" id="id_kios" style="width: 100%;" readonly>
											<option value="">---Pilih Kios---</option>
											<?php foreach ($datakios as $key) { ?>
												<option value="<?= $key->id_kios ?>" <?php if ($key->id_kios == $databaru->id_kios) {
																							echo "selected";
																						} ?>><?php echo $key->nama_pasar ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-md-6">
										<label>Kios</label>
										<select class="form-control" name="id_kios" id="id_kios" style="width: 100%;" readonly>
											<option value="">---Pilih Kios---</option>
											<?php foreach ($datakios as $key) { ?>
												<option value="<?= $key->id_kios ?>" <?php if ($key->id_kios == $databaru->id_kios) {
																							echo "selected";
																						} ?>><?php echo $key->jenis . ' ' . $key->nama_blok . ' No ' . $key->no_blok ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<!-- Similar field structures as in 'Pasar' form, including images and file upload fields -->
								<div class="form-group row">
									<div class="col-md-6 mb-6 mb-sm-0">
										<label>Pas Foto</label><br>
										<?php if (!empty($databaru->pas_foto)) { ?>
											<img src="<?= base_url('./template/img/syarat/' . $databaru->pas_foto); ?>" class="img-rounded" width="100px">
										<?php } ?>
										<input type="file" name="pas_foto" class="form-control">
										<input type="hidden" name="pas_foto_lama" value="<?php echo $databaru->pas_foto ?>" class="form-control">
									</div>
									<div class="col-md-6">
										<label>Surat Permohonan Pemohon</label><br>
										<?php if (!empty($databaru->sp_pemilik)) { ?>
											<img src="<?= base_url('./template/img/syarat/' . $databaru->sp_pemilik); ?>" class="img-rounded" width="100px">
										<?php } ?>
										<input type="file" name="sp_pemilik" class="form-control">
										<input type="hidden" name="sp_pemilik_lama" value="<?php echo $databaru->sp_pemilik ?>" class="form-control">
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-6 mb-6 mb-sm-0">
										<label>Surat Pernyataan</label><br>
										<?php if (!empty($databaru->surat_pernyataan)) { ?>
											<img src="<?= base_url('./template/img/syarat/' . $databaru->surat_pernyataan); ?>" class="img-rounded" width="100px">
										<?php } ?>
										<input type="file" name="surat_pernyataan" class="form-control">
										<input type="hidden" name="surat_pernyataan_lama" value="<?php echo $databaru->surat_pernyataan ?>" class="form-control">
									</div>
									<div class="col-md-6">
										<label>KTP Pemilik</label><br>
										<?php if (!empty($databaru->ktp_pemilik)) { ?>
											<img src="<?= base_url('./template/img/syarat/' . $databaru->ktp_pemilik); ?>" class="img-rounded" width="100px">
										<?php } ?>
										<input type="file" name="ktp_pemilik" class="form-control">
										<input type="hidden" name="ktp_pemilik_lama" value="<?php echo $databaru->ktp_pemilik ?>" class="form-control">
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<label class=" text-danger">Keterangan:<br>1. Semua persyaratan wajib diisi<br>2. Format yang digunakan adalah jpeg/jpg/png</label>
									</div>
								</div>

								<a href="<?php echo site_url('Admin/Baru') ?>"><button name="simpan" type="submit" class="btn btn-primary">Submit</button></a>
								<button type="reset" name="reset" class="btn btn-danger">Reset</button>
								<a href="<?php echo site_url('Admin/Baru') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>
							</div>
							<?php echo form_close(); ?>
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