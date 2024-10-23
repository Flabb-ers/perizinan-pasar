<?= $this->session->flashdata('pesan') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Selasar</h6>
		</div>
		<div class="card-body">
			<a href="<?php echo site_url('Admin/Selasar/create') ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
					Tambah Data
				</button></a>
			<br>
			<br>

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Pasar</th>
							<th>Nama</th>
							<th>NIK</th>
							<th>Alamat</th>
							<th>Jenis Dagangan</th>
							<th>Panjang</th>
							<th>Lebar</th>
							<th>Luas</th>
							<th>Total Tarif</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						foreach ($dataselasar as $key) {
						?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?= $key->nama_pasar ?></td>
								<td><?= $key->nama ?></td>
								<td><?= $key->nik ?></td>
								<td><?= $key->alamat ?></td>
								<td><?= $key->jenis_dagangan ?></td>
								<td><?= $key->panjang ?></td>
								<td><?= $key->lebar ?></td>
								<td><?= $key->panjang * $key->lebar ?></td>
								<td><?= $key->panjang * $key->lebar * $key->tarif ?></td>

								<td>
									<a href="<?php echo site_url('Admin/Selasar/edit/' . $key->id_selasar) ?>" class="btn btn-success"><i class="fa fa-edit">Edit</i></a>
									<a href="<?php echo site_url('Admin/Selasar/hapus/' . $key->id_selasar) ?>" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $key->nama ?>')" class="btn btn-danger"><i class="fa fa-trash">Hapus</i></a>
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
</div>
