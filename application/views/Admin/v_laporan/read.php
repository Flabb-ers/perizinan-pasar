<?= $this->session->flashdata('pesan') ?>

<div class="container-fluid">
	<div class="card shadow mb-12">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Laporan Permohonan Baru</h6>
		</div>

		<div class="card-body">
			<div class="form-group row ">
				<label class="control-label col-md-2 col-sm-2">Periode</label>
				<div class="col-md-3 col-sm-3 ">
					<input type="date" name="tgl_awal" id="tgl_awal" value="<?php echo $tgl_awal ?>" class="form-control" required>
				</div>
				<label class="control-label col-md-1 col-sm-1 ">S/D</label>
				<div class="col-md-3 col-sm-3 ">
					<input type="date" name="tgl_akhir" id="tgl_akhir" value="<?php echo $tgl_akhir ?>" class="form-control" required>
				</div>
			</div>

			<div class="item form-group row">
				<label class="control-label col-md-2 col-sm-2">Nama Pasar</label>
				<div class="col-md-7 col-sm-7">
					<select class="form-control" name="id_pasar" id="id_pasar">
						<option value="Pilih Pasar">Semua Pasar</option>
						<?php
						foreach ($pasar as $key) {
						?>
							<option value="<?= $key->id_pasar ?>" <?php if ($key->id_pasar == $key->id_pasar) {
																		echo "selected";
																	} ?>> <?= $key->nama_pasar ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-sm-6  offset-md-6">
					<button type="submit" name="cari" id="cari" class="btn btn-success">Cari</button>
					<a href="<?php echo site_url('Admin/Laporan/laporansemua') ?>" class="btn btn-secondary ">Reset</a>
				</div>
			</div>

			<!-- <button id="export-btn" class="btn btn-success">Export to Excel</button>  -->
			<div class="row">
				<div class="col-xl-6 col-md-6 mb-4" align="left">
					<button id="export-btn" class="btn btn-success" style="display: none;">Export to Excel</button>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td>No</td>
							<td>Nama Pasar</td>
							<td>Nama</td>
							<td>NIK</td>
							<td>Alamat</td>
							<td>No Telp</td>
							<td>Email</td>
							<td>Pekerjaan</td>
							<td>Jenis Dagangan</td>
							<td>Tanggal</td>
							<td>Status</td>
							<td>Keterangan</td>
						</tr>
					</thead>
					<tbody id="pengajuan-list">
						<!-- Data pengajuan akan ditampilkan di sini -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<script src="<?php echo base_url('template/js/jquery-3.2.1.min.js') ?>"></script>
<script>
	$(document).ready(function() {
		$("#cari").click(function() {
			var tgl_awal = $("#tgl_awal").val();
			var tgl_akhir = $("#tgl_akhir").val();
			var id_pasar = $("#id_pasar").val();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url('Admin/Laporan/filterPengajuan'); ?>",
				data: {
					tgl_awal: tgl_awal,
					tgl_akhir: tgl_akhir,
					id_pasar: id_pasar

				},
				dataType: "json",
				success: function(response) {
					if (response.pengajuan.length > 0) {
						var pengajuanList = "";

						for (var i = 0; i < response.pengajuan.length; i++) {
							var no = i + 1; // Hitung nomor urut

							pengajuanList += "<tr>";
							pengajuanList += "<td>" + no + "</td>";
							pengajuanList += "<td>" + response.pengajuan[i].nama_pasar + "</td>";
							pengajuanList += "<td>" + response.pengajuan[i].nama + "</td>";
							pengajuanList += "<td>" + response.pengajuan[i].nik + "</td>";
							pengajuanList += "<td>" + response.pengajuan[i].alamat + "</td>";
							pengajuanList += "<td>" + response.pengajuan[i].no_telp + "</td>";
							pengajuanList += "<td>" + response.pengajuan[i].email + "</td>";
							pengajuanList += "<td>" + response.pengajuan[i].pekerjaan + "</td>";
							pengajuanList += "<td>" + response.pengajuan[i].jenis_dagangan + "</td>";
							pengajuanList += "<td>" + response.pengajuan[i].tanggal + "</td>";;
							pengajuanList += "<td>" + response.pengajuan[i].status + "</td>";
							pengajuanList += "<td>" + response.pengajuan[i].keterangan + "</td>";
							pengajuanList += "</tr>";
						}

						$("#pengajuan-list").html(pengajuanList);
						$("#export-btn").show();
					} else {
						$("#pengajuan-list").html("<tr><td colspan='11'>Tidak ada data permohonan</td></tr>");
						$("#export-btn").hide();
					}
				}
			});
		});

		$("#export-btn").click(function() {
			var tgl_awal = $("#tgl_awal").val();
			var tgl_akhir = $("#tgl_akhir").val();
			var id_pasar = $("#id_pasar").val();

			// Redirect ke URL exportPengajuan dengan parameter tanggal
			window.location.href = "<?php echo base_url('Admin/Laporan/exportLaporanPasar'); ?>" + "?tgl_awal=" + tgl_awal + "&tgl_akhir=" + tgl_akhir + "&id_pasar=" + id_pasar;
		});
	});
</script>
