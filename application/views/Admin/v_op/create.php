<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-6">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Data Objek Retribusi</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="box box-warning">
						<div class="box-body">
							<form class="" action="<?php echo site_url('Admin/Op/save') ?>" method="post">
								<div class="modal-body">
									<input type="hidden" name="id_objek" value="<?php echo $dataobjek->id_objek ?>" class="form-control">
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

										<input type="hidden" name="nama" id="nama" class="form-control">
										<input type="hidden" name="id_jenis" id="id_jenis" class="form-control">
										<!--  <input type="text" name="id_wajib_pajak" id="id_wajib_pajak" 
        <?php foreach ($datawp as $key) { ?>
        value="<?= $key->id_wajib_pajak ?>" <?= $key->nama ?> class="form-control" >
        <?php } ?> -->
										<div class="col-md-6">
											<label>NPWRD</label><br>
											<input type="text" name="npwrd" id="npwrd" class="form-control" readonly>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>NIK</label><br>
											<input type="text" name="nik" id="nik" class="form-control" readonly>
										</div>
										<div class="col-md-6">
											<label>Alamat</label><br>
											<input type="text" name="alamat" id="alamat" class="form-control" readonly>
										</div>
									</div>
									<input type="hidden" name="id_kios" id="id_kios" class="form-control">
									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>Nama Pasar</label><br>
											<input type="text" name="nama_pasar" id="nama_pasar" class="form-control" readonly>
										</div>
										<div class="col-md-6">

											<label>Jenis Dagangan</label><br>
											<input type="text" name="jenis_dagangan" id="jenis_dagangan" class="form-control" readonly>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>Nama Blok</label><br>
											<input type="text" name="nama_blok" id="nama_blok" class="form-control" readonly>
										</div>
										<div class="col-md-6">

											<label>No Blok</label><br>
											<input type="text" name="no_blok" id="no_blok" class="form-control" readonly>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>Jenis</label><br>
											<input type="text" name="jenis" id="jenis" class="form-control" readonly>
										</div>
										<div class="col-md-6">
											<label>No Telp</label><br>
											<input type="text" name="no_telp" id="no_telp" class="form-control" readonly>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>Email</label><br>
											<input type="text" name="email" id="email" class="form-control" readonly>
										</div>
										<div class="col-md-6">
											<label>Tanggal Terdaftar</label><br>
											<input type="date" name="tgl_daftar" id="tgl_daftar" class="form-control" required="">
										</div>
									</div>

									<input type="hidden" name="pas_foto" id="pas_foto" class="form-control" required="">

									<a href="<?php echo site_url('Admin/Objek/detail') ?>"><button value="Simpan" type="submit" class="btn btn-primary">Submit</button></a>
									<button type="reset" name="reset" class="btn btn-danger">Reset</button>
									<a href="<?php echo site_url('Admin/Objek/detail/' . $dataobjek->id_objek) ?>"><button type="button" name="button" class="btn btn-warning">Cencel</button>
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
				url: '<?php echo base_url('Admin/Op/getPengajuan'); ?>',
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
						$("#nik").val(response[0].nik);
						$("#alamat").val(response[0].alamat);
						$("#nama_pasar").val(response[0].nama_pasar);
						$("#jenis_dagangan").val(response[0].jenis_dagangan);
						$("#nama_blok").val(response[0].jenis + ' ' + response[0].nama_blok);
						$("#no_blok").val(response[0].no_blok);
						$("#jenis").val(response[0].jenis);
						$("#no_telp").val(response[0].no_telp);
						$("#email").val(response[0].email);
						$("#id_kios").val(response[0].id_kios);
						$("#id_jenis").val(response[0].id_jenis);
						$("#pas_foto").val(response[0].pas_foto);


					} else {
						$("#nama").val('');
						$("#npwrd").val('');
						$("#nik").val('');
						$("#alamat").val('');
						$("#nama_pasar").val('');
						$("#jenis_dagangan").val('');
						$("#nama_blok").val('');
						$("#no_blok").val('');
						$("#jenis").val('');
						$("#no_telp").val('');
						$("#email").val('');
						$("#id_kios").val('');
						$("#id_jenis").val('');
						$("#pas_foto").val('');
					}
				},
				error: function(xhr, status, error) {
					console.error(error);
				}
			});
		});

	});
</script>
