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

		/* table {
			text-align: center;
		} */

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
	<table style="margin: 10px 20px;">
		<tbody>
			<tr>
				<td class="header">
					<img class="header-img" src="http://perizinanpasar.test/template/img/atas.png" alt="logo-pasar">
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
				<td>Dengan Hormat,</td>
			</tr>
			<tr>
				<td>Yang bertanda tangan dibawah ini:</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					<table>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><?php echo $datapengajuan->nama ?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?php echo $datapengajuan->pekerjaan ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?php echo $datapengajuan->alamat ?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td><?php echo $datapengajuan->nik ?></td>
						</tr>
						<tr>
							<td>NPWRD</td>
							<td>:</td>
							<td><?php echo $datapengajuan->npwrd != '' ? $datapengajuan->npwrd : '-' ?></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: justify; text-indent: 20px;">Bersama ini kami mengajukan Permohonan Baru untuk
					menempati/ berjualan di <?php echo $datapengajuan->nama_pasar ?> dalam <?php echo $datapengajuan->jenis ?> Nomor <?php echo $datapengajuan->no_blok ?> Blok <?php echo $datapengajuan->nama_blok ?> dengan ukuran <?php echo $datapengajuan->panjang ?> M x <?php echo $datapengajuan->lebar ?> M. Sebagai bahan
					pertimbangan kami lampirkan : </td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-indent: 20px;">1. Surat Pernyataan kesanggupan dengan materai Rp 10.000,-</td>
			</tr>
			<tr>
				<td style="text-indent: 20px;">2. Foto KTP sebanyak 1 (satu)</td>
			</tr>
			<tr>
				<td style="text-indent: 20px;">3. Pas foto 3 x 4 sebanyak 1 (satu)</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: justify; text-indent: 20px;">Demikian untuk menjadikan periksa dan atas
					terkabulnya permohonan ini di ucapkan
					terima kasih.
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					<table>
						<tbody>
							<tr style="text-align: center;">
								<td style="text-align: center;">
									Mengetahui
									<br>
									Kepala <?php echo $datapengajuan->nama_pasar ?>
									<br>
									<br>
									<br>
									<br>
									<?php echo $datakepala->nama_Kpasar ?>
									<br>
									NIP.  <?php echo $datakepala->nip_Kpasar ?>
								</td>
								<td style="width: 20em;">
									&nbsp;
								</td>
								<td style="text-align: center;">
									<br>
									Pemohon
									<br>
									<br>
									<br>
									<br>
									<?php echo $datapengajuan->nama ?>
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
