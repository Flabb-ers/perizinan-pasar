<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-6">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Data Permohonan Perpanjang</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="box box-warning">
						<div class="box-body">
							<form class="" action="<?php echo site_url('Admin/Pengajuan/create') ?>" method="post" enctype="multipart/form-data">
								<div class="modal-body">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>Nama Pasar</label>
											<select class="form-control" name="id_pengajuan" id="pengajuan" style="width: 100%;" required>
												<option value="">---Pilih Data Perpanjangan---</option>
												<?php
												foreach ($datapengajuan as $key) {
												?>
													<option value="<?= $key->id_pengajuan ?>" required><?php echo $key->nama . ' -- ' . $key->nama_pasar . ' ' . $key->jenis . ' ' . $key->nama_blok . ' No ' . $key->no_blok ?></option>
												<?php } ?>
											</select>
											<input type="hidden" name="nama" id="nama" class="form-control">
											<input type="hidden" name="id_kios" id="id_kios" class="form-control">
											<input type="hidden" name="id_jenis" id="id_jenis" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>NIK</label>
											<input type="text" name="nik" id="nik" class="form-control" readonly>
										</div>
										<div class="col-md-6">
											<label>NPWRD</label>
											<input type="text" name="npwrd" id="npwrd" class="form-control" readonly>

										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>Pekerjaan</label>
											<input type="text" name="pekerjaan" id="pekerjaan" class="form-control" readonly>
										</div>
										<div class="col-md-6">
											<label>Alamat</label>
											<input type="text" name="alamat" id="alamat" class="form-control" readonly>

										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>No Telp</label>
											<input type="text" name="no_telp" id="no_telp" class="form-control" readonly>
										</div>
										<div class="col-md-6">
											<label>Email</label>
											<input type="text" name="email" id="email" class="form-control" readonly>

										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>Jenis Dagangan</label>
											<input type="text" name="jenis_dagangan" id="jenis_dagangan" class="form-control" readonly>
										</div>
										<div class="col-md-6">
											<label>Tanggal Habis Surat Izin</label>
											<input type="date" name="tanggal" id="tanggal" class="form-control" required>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>SP Kepala</label><br>
											<input type="file" name="sp_kepala" class="form-control" required>
										</div>
										<div class="col-md-6">
											<label>SP Pemilik</label><br>
											<input type="file" name="sp_pemilik" class="form-control" required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>Surat Pernyataan</label><br>
											<input type="file" name="surat_pernyataan" class="form-control" required>
										</div>
										<div class="col-md-6">
											<label>KTP Pemilik</label><br>
											<input type="file" name="ktp_pemilik" class="form-control" required>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>Pas Foto</label><br>
											<input type="file" name="pas_foto" class="form-control" required>
										</div>
										<div class="col-md-6">
											<label class=" text-danger">Keterangan:<br>1. Semua persyaratan wajib diisi<br>2. Format yang digunakan adalah jpeg/jpg/png</label>
										</div>
									</div>


									<a href="<?php echo site_url('Admin/Baru') ?>"><button name="simpan" type="submit" class="btn btn-primary">Submit</button></a>
									<button type="reset" name="reset" class="btn btn-danger">Reset</button>
									<a href="<?php echo site_url('Admin/Baru') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>
								</div>
							</form>
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
		// Menangani perubahan pada elemen dropdown pengajuan
		$('#pengajuan').on('change', function() {
			var id_pengajuan = $(this).val();

			// Melakukan AJAX untuk memeriksa status file
			$.ajax({
				url: '<?php echo base_url('Admin/Pengajuan/getPengajuan'); ?>',
				type: 'POST',
				data: {
					id_pengajuan: id_pengajuan,
					<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'

				},
				dataType: 'json',
				success: function(response) {
					if (response.length > 0) {


						$("#nama").val(response[0].nama);
						$("#id_kios").val(response[0].id_kios);
						$("#id_jenis").val(response[0].id_jenis);
						$("#npwrd").val(response[0].npwrd);
						$("#nik").val(response[0].nik);
						$("#alamat").val(response[0].alamat);
						$("#pekerjaan").val(response[0].pekerjaan);
						$("#jenis_dagangan").val(response[0].jenis_dagangan);
						$("#no_telp").val(response[0].no_telp);
						$("#email").val(response[0].email);



					} else {
						$("#nama").val('');
						$("#npwrd").val('');
						$("#nik").val('');
						$("#alamat").val('');
						$("#pekerjaan").val('');
						$("#jenis_dagangan").val('');
						$("#no_telp").val('');
						$("#email").val('');
						$("#id_kios").val('');
						$("#id_jenis").val('');
					}
				},
				error: function(xhr, status, error) {
					console.error(error);
				}
			});
		});

	});
</script>
