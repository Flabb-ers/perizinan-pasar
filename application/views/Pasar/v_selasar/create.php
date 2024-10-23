<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-6">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Data Selasar</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="box box-warning">
						<div class="box-body">
							<form class="" action="<?php echo site_url('Pasar/Selasar/create') ?>" method="post">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

								<div class="modal-body">
									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>Nama Pasar</label>
											<select class="form-control select2bs4" name="id_pasar" style="width: 100%;" readonly>
												<?php foreach ($datapasar as $key) { ?>
													<option value="<?= $key->id_pasar ?>"> <?= $key->nama_pasar ?> (<?= $key->tipe_pasar ?>) </option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-6">
											<label>Nama</label>
											<input type="text" name="nama" pattern="[A-Za-z ]+" class="form-control" required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>NIK</label>
											<input type="text" name="nik" pattern="[0-9]{16}" class="form-control" required>
										</div>
										<div class="col-md-6 ">
											<label>Alamat</label><br>
											<input type="text" name="alamat" pattern="[A-Za-z ,.]+" class="form-control" required>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>Jenis Dagangan</label>
											<select class="form-control select2bs4" name="id_jenis" style="width: 100%;" required>
												<option selected="selected">---Pilih---</option>
												<?php foreach ($datajenis as $key) { ?>
													<option value="<?= $key->id_jenis ?>"><?= $key->jenis_dagangan ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-3 ">
											<label>Panjang</label><br>
											<input type="text" name="panjang" pattern="^[0-9]{1,2}$" class="form-control" required>
										</div>
										<div class=" col-md-3">
											<label>Lebar</label><br>
											<input type="text" name="lebar" pattern="^[0-9]{1,2}$" class="form-control" required>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>Tarif</label>
											<select class="form-control select2bs4" name="id_tarif" style="width: 100%;" required>
												<option selected="selected">---Pilih---</option>
												<?php foreach ($datatarif as $key) { ?>
													<option value="<?= $key->id_tarif ?>"><?= $key->tipe_pasar ?> - <?= $key->tarif ?></option>
												<?php } ?>
											</select>
										</div>
									</div>


									<a href="<?php echo site_url('Pasar/Selasar') ?>"><button name="simpan" type="submit" class="btn btn-primary">Submit</button></a>
									<button type="reset" name="reset" class="btn btn-danger">Reset</button>
									<a href="<?php echo site_url('Pasar/Selasar') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>
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
