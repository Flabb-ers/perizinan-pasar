<?= $this->session->flashdata('pesan') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Objek Pajak</h6>
		</div>
		<div class="card-body">

			<a href="<?php echo site_url('Admin/op/create/' . $dataobjek->id_objek) ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
					Tambah Data
				</button></a>

			<hr>
			<br>


			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td>No</td>
							<td>NPWRD</td>
							<td>Nama Wajib Pajak</td>
							<td>Alamat</td>
							<td>Nama Pasar</td>
							<td>Nama Blok</td>
							<td>No Blok</td>
							<td>Jenis Dagangan</td>
							<td>Tanggal Daftar /Perpanjang</td>
							<td>Batas Berlaku</td>
							<td>Status</td>
							<td>Aksi</td>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						foreach ($dataop as $key) {
						?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?= $key->npwrd ?></td>
								<td><?= $key->nama ?></td>
								<td><?= $key->alamat ?></td>
								<td><?= $key->nama_pasar ?></td>
								<td><?= $key->nama_blok ?></td>
								<td><?= $key->no_blok ?></td>
								<td><?= $key->jenis_dagangan ?></td>
								<td><?php echo date('d-m-Y', strtotime($key->tgl_daftar)) ?></td>
								<td><?php echo date('d-m-Y', strtotime($key->batas_berlaku)) ?></td>

								<td>Aktif</td>

								<td>
									<a href="<?php echo site_url('Admin/Op/edit/' . $key->id_objek_pajak) ?>" class="btn btn-success"><i class="fa fa-edit">Edit</i></a>
									<!-- <a href="<?php echo site_url('Admin/Op/proses/' . $key->id_objek_pajak) ?>" class="btn btn-warning">Proses</a> -->

									<a href="<?php echo site_url('Admin/Op/hapus/' . $key->id_objek_pajak) ?>" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $key->nama ?>')" class="btn btn-danger"><i class="fa fa-trash">Hapus</i></a>
								</td>

							</tr>
						<?php
							$no++;
						}
						?>
					</tbody>

				</table>

			</div>
		</div>
	</div>
	</form>
</div>
