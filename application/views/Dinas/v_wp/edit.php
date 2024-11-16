<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-6">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Edit Data Wajib Retribusi</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="box box-warning">
						<div class="box-body">
							<form action="<?php echo site_url('Dinas/wp/edit/' . $datawp->id_wajib_pajak) ?>" method="post">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

								<div class="modal-body">
									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>Nama</label><br>
											<input type="text" name="nama" id="nama" value="<?php echo $datawp->nama ?>" class="form-control" readonly>
										</div>
										<div class="col-md-6">
											<label>NPWRD</label><br>
											<input type="text" name="npwrd" id="npwrd" pattern="[0-9]{14}" value="<?php echo set_value('npwrd', $datawp->npwrd) ?>" class="form-control">
											<?php if (form_error('npwrd')): ?>
												<div class="text-danger">
													<?php echo form_error('npwrd'); ?>
												</div>
											<?php endif; ?>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>NIK</label><br>
											<input type="text" name="nik" id="nik" value="<?php echo $datawp->nik ?>" class="form-control" readonly>
										</div>
										<div class="col-md-6">
											<label>Alamat</label><br>
											<input type="text" name="alamat" id="alamat" value="<?php echo $datawp->alamat ?>" class="form-control" readonly>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6 mb-6 mb-sm-0">
											<label>No. Telp</label><br>
											<input type="tel" name="no_telp" id="no_telp" value="<?php echo $datawp->no_telp ?>" class="form-control" readonly>
										</div>
										<div class="col-md-6">
											<label>Email</label><br>
											<input type="email" name="email" id="email" value="<?php echo $datawp->email ?>" class="form-control" readonly>
										</div>
									</div>
									<button type="submit" name="edit" class="btn btn-primary">Submit</button>
									<a href="<?php echo site_url('Dinas/Wp') ?>"><button type="button" class="btn btn-warning">Cancel</button></a>
								</div>
							</form>

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