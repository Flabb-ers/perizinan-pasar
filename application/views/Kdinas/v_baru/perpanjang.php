<?php
$tanggal = new DateTime($dataop->tanggal);
$tanggal->modify('+2 years');
$batasBerlaku = $tanggal->format('Y-m-d');
?>
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-6">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Proses Data Pengajuan</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="box box-warning">
						<div class="box-body">
							<?php echo form_open_multipart('Kdinas/Pengajuan/generatePerpanjang/' . $dataop->id_objek_pajak) ?>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<input type="hidden" name="pas_foto" value="<?=$dataop->pas_foto?>" id="pas_foto">
							<div class="modal-body">
								<div class="form-group row">
									<label class="col-md-3 col-sm-3">Nama </label>
									<div class="col-md-9 col-sm-9">
										<input type="text" name="nama" id="nama" value="<?php echo $dataop->nama ?>" class="form-control" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 col-sm-3">Kios</label>
									<div class="col-md-9 col-sm-9">
										<input type="text" name="id_kios" id="id_kios" value="<?php echo $dataop->nama_pasar ?>(<?php echo $dataop->jenis ?> No <?php echo $dataop->nama_blok ?> <?php echo $dataop->no_blok ?>)" class="form-control" readonly>
										<input type="hidden" name="nama_pasar" id="nama_pasar" value="<?php echo $dataop->nama_pasar ?>" class="form-control" readonly>
										<input type="hidden" name="nama_blok" id="nama_blok" value="<?php echo $dataop->nama_blok ?>" class="form-control" readonly>
										<input type="hidden" name="no_blok" id="no_blok" value="<?php echo $dataop->no_blok ?>" class="form-control" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 col-sm-3">NIK</label>
									<div class="col-md-9 col-sm-9">
										<input type="text" name="nik" id="nik" value="<?php echo $dataop->nik ?>" class="form-control" readonly>
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
									<label class="col-md-3 col-sm-3">Jenis Dagangan</label>
									<div class="col-md-9 col-sm-9">
										<input type="text" name="id_jenis" id="id_jenis" value="<?php echo $dataop->jenis_dagangan ?>" class="form-control" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-3 col-sm-3">Tanggal Pengajuan</label>
									<div class="col-md-9 col-sm-9">
										<input type="date" name="tgl_daftar" id="tgl_daftar" value="<?php echo $dataop->tanggal ?>" class="form-control" readonly>
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-md-3 col-sm-3">Batas Berlaku</label>
									<div class="col-md-9 col-sm-9">
										<input type="date" name="batas_berlaku" id="batas_berlaku" value="<?php echo $batasBerlaku;  ?>" class="form-control" readonly>
										<input type="hidden" name="id_pengajuan" id="id_pengajuan" value="<?php echo $dataop->id_pengajuan ?>" class="form-control" readonly>
									</div>
								</div>


								<button name="simpan" type="submit" id="tombolSubmit" class="btn btn-primary">Generate</button>
								<a href="<?php echo site_url('Kdinas/Pengajuan') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>
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
</div>
