<?php
$tgl_daftar = $datapengajuan->tanggal;
$batas_berlaku = date('Y-m-d', strtotime('+2 years', strtotime($tgl_daftar)));
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			/* align-items: center; */
			/* height: 100vh; */
			margin: 0 20px;
			padding: 0;
			/* border: 1px solid black; */
		}

		tr>td {
			font-family: 'Times New Roman', Times, serif;
			font-size: 12pt;
		}

		.header {
			display: flex;
			align-items: center;
			margin-bottom: -10px;
		}

		.header-img {
			width: 80px;
			margin-right: 10px;
		}

		.header-text {
			font-weight: 100;
			font-size: 12pt;
			text-align: center;
			text-transform: uppercase;
			font-family: 'Times New Roman', Times, serif;
		}

		.link {
			text-transform: lowercase;
		}

		hr {
			height: 4px;
			background: black;
		}

		@media print {
			hr {
				border: none;
				border-top: 4px solid black;
				/* Pastikan tetap menggunakan border untuk cetak */
				margin: 20px 0;
			}
		}
	</style>
</head>

<body>
	<table>
		<tbody>
			<tr>
				<td class="header">
					<img class="header-img" src="<?= base_url('template/img/logo.jpg'); ?>" alt="logo-pasar">
					<h1 class="header-text">Pemerintah Kabupaten Purworejo <br> <b>DINAS KOPERASI USAHA KECIL MENENGAH
							DAN PERDAGANGAN</b>
						<br>Jl. Jenderal Sudirman No.22 Purworejo Kode Pos: 54114 <br>Telp: (0275) 321018, 321028<br>
						<span class="link">e-mail : <a href="mailto:dinkukmp@purworejokab.go.id" target="_blank"
								rel="noopener noreferrer">dinkukmp@purworejokab.go.id</a>
							website : <a href="http://www.dinkukmp.purworejokab.go.id" target="_blank"
								rel="noopener noreferrer">www.dinkukmp.purworejokab.go.id</a></span>
					</h1>
				</td>
			</tr>
			<tr>
				<td>
					<hr>
				</td>
			</tr>
			<tr>
				<td style="text-align: right;">Purworejo, <?php echo date('d F Y') ?></td>
			</tr>
			<tr>
				<td>
					<table>
						<tr>
							<td>No.</td>
							<td>:</td>
							<td>-</td>
						</tr>
						<tr>
							<td>Lampiran</td>
							<td>:</td>
							<td>-</td>
						</tr>
						<tr>
							<td>Perihal</td>
							<td>:</td>
							<td>Permohonan Baru Menempati Kios/Los</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					Kepada Yth <br> Kepala Dinas Koperasi Usaha Kecil Menengah dan Perdagangan <br> di Purworejo
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: justify; text-indent: 20px;">Bersama ini kami kirimkan berkas permohonan untuk mendapatkan izin menempati/berjualan di dalam kios/los <b><?php echo $datapengajuan->nama_pasar ?></b> atas nama <b><?php echo $datapengajuan->nama ?></b>. Surat Ijin berlaku selama <b>2(dua) tahun</b> mulai dari tanggal <b><?php echo date('d F Y', strtotime($datapengajuan->tanggal)) ?></b> s.d <b><?php echo date('d F Y', strtotime($batas_berlaku)) ?></b>.</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Demikian disampaikan untuk menjadikan periksa.</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<!-- <td style="width: 80%;"></td> -->

				<td>
					<table>
						<tbody>
							<tr>
								<td style="width: 28em;">
									&nbsp;
								</td>
								<td style="text-align: center; text-transform: capitalize;">
								Kepala <?php echo $datapengajuan->nama_pasar ?>
									<br>
									<br>
									<br>
									<br>
									<?php echo $datakepala->nama_Kpasar ?>
									<br>
									NIP. <?php echo $datakepala->nip_Kpasar ?>
								</td>
							</tr>
						</tbody>
					</table>
				</td>

			</tr>

		</tbody>
	</table>
</body>

</html>


<script>
	window.print()
</script>
