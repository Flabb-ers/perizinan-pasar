<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-6">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Edit Data Permohonan Baru</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="box box-warning">
						<div class="box-body">
							<?php echo form_open_multipart('Pasar/Persyaratan2/update/' . $datapengajuan->id_pengajuan) ?>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

							<div class="form-group row">
								<div class="col-md-6 mb-6 mb-sm-0">
									<label>Nama Wajib Pajak</label>

									<input type="text" name="nama" id="nama" value="<?php echo $datapengajuan->nama ?>" class="form-control" readonly>
								</div>
								<div class="col-md-6">
									<label>Kios</label>
									<input type="text" name="id_kios" value="<?php $datapengajuan->id_kios ?> <?php echo $datapengajuan->nama_pasar ?>(<?php echo $datapengajuan->jenis ?> No <?php echo $datapengajuan->nama_blok ?> <?php echo $datapengajuan->no_blok ?>" class="form-control" readonly>
									<input type="hidden" name="id_kios" id="id_kios" value="<?php echo $datapengajuan->id_kios ?>" class="form-control" readonly>
								</div>


							</div>
							<div class="form-group row">
								<div class="col-md-6 mb-6 mb-sm-0">
									<label>NIK</label>
									<input type="text" name="nik" id="nik" value="<?php echo $datapengajuan->nik ?>" class="form-control" readonly>
								</div>
								<div class="col-md-6">
									<label>Jenis Dagangan</label>
									<input type="text" name="jenis_dagangan" id="jenis_dagangan" value="<?php echo $datapengajuan->jenis_dagangan ?>" class="form-control" readonly>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6 mb-6 mb-sm-0">
									<label>NPWRD</label>
									<input type="text" name="npwrd" id="npwrd" value="<?php echo $datapengajuan->npwrd ?>" class="form-control" readonly>

								</div>
								<div class="col-md-6">
									<label>Alamat</label>
									<input type="text" name="alamat" id="alamat" value="<?php echo $datapengajuan->alamat ?>" class="form-control" readonly>

								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6 mb-6 mb-sm-0">
									<label>No Telp</label>
									<input type="text" name="no_telp" id="no_telp" value="<?php echo $datapengajuan->no_telp ?>" class="form-control" readonly>
								</div>
								<div class="col-md-6">
									<label>Email</label>
									<input type="text" name="email" id="email" value="<?php echo $datapengajuan->email ?>" class="form-control" readonly>

								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6 mb-6 mb-sm-0">
									<label>Pekerjaan</label>
									<input type="text" name="pekerjaan" id="pekerjaan" value="<?php echo $datapengajuan->pekerjaan ?>" class="form-control" required>
								</div>
								<div class="col-md-6">
									<label>Tanggal Daftar</label>
									<input type="date" name="tanggal" id="tanggal" value="<?php echo $datapengajuan->tanggal ?>" class="form-control" required>
								</div>
							</div>
							<button type="submit" value="Simpan" class="btn btn-primary">Submit</button>
							<a href="<?php echo site_url('Pasar/Persyaratan2') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>
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
