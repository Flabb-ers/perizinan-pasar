<?= $this->session->flashdata('pesan') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Wajib Retribusi</h6>
		</div>
		<div class="card-body">
			<a href="<?php echo site_url('Dinas/Wp/create') ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
					Tambah Data
				</button></a><br><br>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>

							<th>No</th>
							<th>NPWRD</th>
							<th>Nama</th>
							<th>Nama Pasar</th>
							<td>Alamat</td>
							<td>NIK</td>
							<td>No. Telp</td>
							<td>Email</td>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						foreach ($datawp as $key) {
						?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?= $key->npwrd ?></td>
								<td><?= $key->nama ?></td>
								<td><?= $key->nama_pasar ?></td>
								<td><?= $key->alamat ?></td>
								<td><?= $key->nik ?></td>
								<td><?= $key->no_telp ?></td>
								<td><?= $key->email ?></td>

								<td>
									<a href="<?php echo site_url('Dinas/Wp/edit/' . $key->id_wajib_pajak) ?>" class="btn btn-success"><i class="fa fa-edit">Edit</i></a>
									<a href="<?php echo site_url('Dinas/Wp/hapus/' . $key->id_wajib_pajak) ?>" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $key->id_wajib_pajak ?>')" class="btn btn-danger"><i class="fa fa-trash">Hapus</i></a>
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
