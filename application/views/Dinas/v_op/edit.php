<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-6">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Edit Data Objek Retribusi</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="box box-warning">
						<div class="box-body">
							<form action="<?php echo site_url('Dinas/op/update/' . $dataop->id_objek_pajak) ?>" method="post">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

								<div class="modal-body">
									<div class="form-group row">
										<label class="col-md-3 col-sm-3">Nama Wajib Pajak</label>
										<div class="col-md-9 col-sm-9">
											<input type="text" name="nama" id="nama" value="<?php echo $dataop->nama ?>" class="form-control" readonly>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-3 col-sm-3">NPWRD</label>
										<div class="col-md-9 col-sm-9">
											<input type="text" name="npwrd" id="npwrd" value="<?php echo $dataop->npwrd ?>" class="form-control" readonly>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-3 col-sm-3">Alamat</label>
										<div class="col-md-9 col-sm-9">
											<input type="text" name="alamat" id="alamat" value="<?php echo $dataop->alamat ?>" class="form-control" readonly>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-3 col-sm-3">Nama Pasar</label>
										<div class="col-md-9 col-sm-9">
											<input readonly type="text" name="nama_pasar" id="nama_pasar" class="form-control" value="<?= $dataop->nama_pasar ?>">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-3 col-sm-3">Jenis Dagangan</label>
										<div class="col-md-9 col-sm-9">
											<input type="text" name="id_jenis" id="id_jenis" value="<?php echo $dataop->jenis_dagangan ?>" class="form-control" readonly>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-3 col-sm-3">Nama Blok</label>
										<div class="col-md-9 col-sm-9">
											<input type="text" name="nama_blok" id="nama_blok" class="form-control" readonly value="<?= $dataop->nama_blok ?>">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-3 col-sm-3">Nomor Blok</label>
										<div class="col-md-9 col-sm-9">
											<input type="text" name="no_blok" id="no_blok" class="form-control" readonly value="<?= $dataop->no_blok ?>">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-3 col-sm-3">Tanggal Terdaftar/Perpanjang</label>
										<div class="col-md-9 col-sm-9">
											<input type="date" name="tgl_daftar" id="tgl_daftar" value="<?php echo $dataop->tgl_daftar ?>" class="form-control" required="">
										</div>
									</div>

									<button type="submit" name="edit" class="btn btn-primary">Submit</button>
									<a href="<?php echo site_url('Dinas/Objek/detail/' . $dataop->id_objek) ?>"><button type="button" name="button" class="btn btn-warning">Cencel</button>
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
