<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-6">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Data Objek Pajak</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="box box-warning">
						<div class="box-body">
							<form class="" action="<?php echo site_url('Admin/Objek/create') ?>" method="post">
								<div class="modal-body">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>NPWRD</label>
											<select class="form-control select2bs4" name="id_wajib_pajak" id="pengajuan" style="width: 100%;" required>
												<option value="">PILIH NPWRD </option>
												<?php foreach ($datapengajuan as $key) { ?>
													<option value="<?= $key->id_wajib_pajak ?>"> <?= $key->npwrd ?></option>
												<?php } ?>
											</select>
										</div>
										<input type="hidden" name="id_wajib_pajak" id="id_wajib_pajak" class="form-control">

										<div class="col-md-6">
											<label>Nama</label><br>
											<input type="text" name="nama" id="nama" class="form-control" readonly>
										</div>
									</div>

									<button name="simpan" type="submit" class="btn btn-primary">Submit</button>
									<button type="reset" name="reset" class="btn btn-danger">Reset</button>
									<a href="<?php echo site_url('Admin/Objek') ?>"><button type="button" name="button" class="btn btn-warning">Cencel</button>
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
			var id_wajib_pajak = $(this).val();

			// Melakukan AJAX untuk memeriksa status file
			$.ajax({
				url: '<?php echo base_url('Admin/Objek/getPengajuan'); ?>',
				type: 'POST',
				data: {
					id_wajib_pajak: id_wajib_pajak,
					<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
				},
				dataType: 'json',
				success: function(response) {
					if (response.length > 0) {

						// console.log(response);

						$("#nama").val(response[0].nama);
						$("#npwrd").val(response[0].npwrd);
						$("#id_wajib_pajak").val(response[0].id_wajib_pajak);

					} else {
						$("#nama").val('');
						$("#npwrd").val('');
						$("#id_wajib_pajak").val('');
					}
				},
				error: function(xhr, status, error) {
					console.error(error);
				}
			});
		});

	});
</script>
