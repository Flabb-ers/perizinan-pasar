<?= $this->session->flashdata('pesan') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
		</div>
		<div class="card-body">

			<a href="<?php echo site_url('Admin/Pegawai/create') ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
					Tambah Data
				</button></a><br><br>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td>No</td>
							<td>Nama</td>
							<td>Nama Pasar</td>
							<td>Level</td>
							<td>Aksi</td>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						foreach ($datapegawai as $key) {
						?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?= $key->nama_pegawai ?></td>
								<td><?= $key->nama_pasar ?></td>
								<td><?= $key->level ?></td>
								<td>
									<a href="<?php echo site_url('Admin/Pegawai/edit/' . $key->id_pegawai) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit">Edit</i></a>
									<a href="<?php echo site_url('Admin/Pegawai/ganti/' . $key->id_pegawai) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit">Ganti Password</i></a>
									<a href="<?php echo site_url('Admin/Pegawai/hapus/' . $key->id_pegawai) ?>" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $key->nama_pegawai; ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash">Hapus</i></a>
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
