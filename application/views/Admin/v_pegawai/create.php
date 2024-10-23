<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-6">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Data Pegawai</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-6">
					<div class="box box-warning">
						<div class="box-body">
							<form class="" action="<?php echo site_url('Admin/Pegawai/create') ?>" method="post">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<div class="modal-body">
									<div class="form-group">
										<label>Nama Pegawai</label><br>
										<div class="form-group">
											<input type="text" name="nama_pegawai" pattern="[A-Za-z ,.]+" class="form-control" required minlength="2">
										</div>
										<div class="form-group">
											<label>Nama Pasar</label>
											<select class="form-control select2bs4" name="nama_pasar" style="width: 100%;">
												<option value="">---Pilih---</option>
												<?php foreach ($datapasar as $key) { ?>
													<option value="<?= $key->id_pasar ?>"> <?= $key->nama_pasar ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label>Username</label><br>
											<input type="text" name="username" class="form-control" pattern="^[A-Za-z0-9]{5,8}$" required>
										</div>
										<div class="form-group">
											<label>Password</label><br>
											<input type="text" name="pass" class="form-control" pattern="^[A-Za-z0-9]{5,8}$" required>
										</div>
										<div class="form-group">
											<label>Level User</label>
											<select class="form-control select2bs4" name="level" style="width: 100%;" required>
												<option selected="selected">---Pilih---</option>
												<option value="1">Admin</option>
												<option value="2">Dinas</option>
												<option value="3">Pasar</option>
												<option value="4">Kepala Dinas</option>
											</select>
										</div>


										<a href="<?php echo site_url('Admin/Pegawai') ?>"><button name="simpan" type="submit" class="btn btn-primary">Submit</button></a>
										<button type="reset" name="reset" class="btn btn-danger">Reset</button>
										<a href="<?php echo site_url('Admin/Pegawai') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>
									</div>
							</form>
						</div>
					</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
