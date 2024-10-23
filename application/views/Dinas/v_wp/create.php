<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-6">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Data Wajib Retribusi</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="box box-warning">
						<div class="box-body">
							<form class="" action="<?php echo site_url('Dinas/Wp/create') ?>" method="post">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

								<div class="modal-body">
									<input type="hidden" name="kode_wp" id="kode_wp" class="form-control" value="<?= $kode_wp ?>" readonly>

									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>Nama</label>
											<select class="form-control select2bs4" name="id_pengajuan" id="pengajuan" style="width: 100%;" required>
												<option value="">PILIH NAMA </option>
												<?php foreach ($datapengajuan as $key) { ?>
													<option value="<?= $key->id_pengajuan ?>"> <?= $key->nama ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-6">
											<label>NPWRD</label><br>
											<input type="text" name="npwrd" id="npwrd" pattern="[0-9]{14}" class="form-control">
											<input type="hidden" name="nama" id="nama" class="form-control">
											<input type="hidden" name="nama_pasar" id="nama_pasar" class="form-control">
											<input type="hidden" name="id_pasar" id="id_pasar" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>NIK</label><br>
											<input type="text" name="nik" id="nik" class="form-control" pattern="[0-9]{16}" readonly>
										</div>
										<div class="col-md-6">
											<label>Alamat</label><br>
											<input type="text" name="alamat" id="alamat" pattern="[A-Za-z ,.]+" class="form-control" readonly>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>No. Telp</label><br>
											<input type="tel" name="no_telp" id="no_telp" class="form-control" pattern="(\+62|62|0)8[1-9][0-9]{6,9}$" readonly>
										</div>
										<div class="col-md-6">

											<label>Email</label><br>
											<input type="email" name="email" id="email" class="form-control" readonly>
										</div>
									</div>


									<a href="<?php echo site_url('Dinas/Wp') ?>"><button name="simpan" type="submit" class="btn btn-primary">Submit</button></a>
									<button type="reset" name="reset" class="btn btn-danger">Reset</button>
									<a href="<?php echo site_url('Dinas/Wp') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>
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
				url: '<?php echo base_url('Dinas/Wp/getPengajuan'); ?>',
				type: 'POST',
				data: {
					id_pengajuan: id_pengajuan,
				<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'

				},
				dataType: 'json',
				success: function(response) {
					if (response.length > 0) {


						$("#nama").val(response[0].nama);
						$("#npwrd").val(response[0].npwrd);
						$("#nama_pasar").val(response[0].nama_pasar);
						$("#alamat").val(response[0].alamat);
						$("#nik").val(response[0].nik);
						$("#no_telp").val(response[0].no_telp);
						$("#email").val(response[0].email);
						$("#id_pasar").val(response[0].id_pasar);


					} else {
						$("#nama").val('');
						$("#npwrd").val('');
						$("#nama_pasar").val('');
						$("#alamat_wp").val('');
						$("#nik").val('');
						$("#no_telp").val('');
						$("#email").val('');
						$("#id_pasar").val('');
					}
				},
				error: function(xhr, status, error) {
					console.error(error);
				}
			});
		});

	});
</script>
