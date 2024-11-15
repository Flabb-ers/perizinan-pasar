<?php
$hariIndonesia = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
$hariIni = $hariIndonesia[date('w')];
$bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
$tanggal = date('j') . ' ' . $bulanIndonesia[date('n') - 1] . ' ' . date('Y');
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
			margin: 0 20px;
			padding: 0;
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
			font-family: 'Times New Roman', Times, serif;
		}

		.link {
			text-transform: lowercase;
		}

		hr {
			height: 4px;
			background: black;
		}

		.ijin-menempati {
			text-align: center;
			position: relative;
		}

		.nomor-ijin {
			padding-left: 200px;
		}

		.indent {
			padding-left: 70px;
		}

		@media print {
			hr {
				border: none;
				border-top: 4px solid black;
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
					<h1 class="header-text"><b>PEMERINTAH KABUPATEN PURWOREJO
							<br> DINAS KOPERASI USAHA KECIL MENENGAH DAN
							<br>PERDAGANGAN
							<br><span>Jl. Jend Sudirman No.22, Telp. (0275) 321028 KodePos: 54114 </span>
							<br>PURWOREJO</b>
						<br>
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
				<td style="text-align:center">BERITA ACARA PENUNJUKAN</td>
			</tr>
			<tr>
				<td class="ijin-menempati">IJIN MENEMPATI <?= strtoupper($databaru->nama_pasar) ?></td>
			</tr>
			<tr>
				<td class="nomor-ijin">NOMOR :</td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>Pada hari ini, <?= $hariIni ?> tanggal <?= $tanggal ?></td>
			</tr>
			<tr>
				<td>masing - masing yang bertanda tangan dibawah ini : </td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td class="indent">Nama 	<span style="margin-left:30px">:</span><?=$datakepala->nama_Kpasar?></td>
			</tr>
			<tr>
				<td class="indent">NIP 		<span style="margin-left:43px">:</span> <?=$datakepala->nip_Kpasar?></td>
			</tr>
			<tr>
				<td class="indent">Jabatan 	<span style="margin-left:20px">:</span> Kepala <?=$databaru->nama_pasar?></td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>Menunjuk untuk menempati Los/Kios/Selsasar Blok: <?= $databaru->nama_blok ?> Nomor : <?= $databaru->no_blok ?> </td>
			</tr>
			<tr>
				<td>dari Dinas Koperasi Usaha kecil Menengah dan Perdagangan Kabupaten Purworejo</td>
			</tr>
			<tr>
				<td>melalui Kepala Pasar kepada pedagang : </td>
			</tr>
			<tr>
				<td class="indent">Nama 	<span style="margin-left:30px">:</span> <?= $databaru->nama ?> </td>
			</tr>
			<tr>
				<td class="indent">Alamat 	<span style="margin-left:22px">:</span> <?= $databaru->alamat ?> </td>
			</tr>
			<tr>
				<td>dengan keutuhan sanggup mematuhi peraturan yang telah di tetapkan.</td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>Dengan Berita Acara Serah Terima ini dibuat untuk digunakan sebagiamana mestinya.</td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>
					<table width="100%">
						<tr>
							<td width="50%"></td>
							<td width="50%" style="text-align: center;">Purworejo, <?= $tanggal ?></td>
						</tr>
						<tr>
							<td style="text-align: center;">Yang Menyerahkan,</td>
							<td style="text-align: center;">Yang Menerima,</td>
						</tr>
						<tr>
							<td style="text-align: center;">Kepala <?= $databaru->nama_pasar ?></td>
							<td></td>
						</tr>
						<tr>
							<td height="110"></td>
							<td></td>
						</tr>
						<tr>
							<td style="text-align: center;"><u><?=$datakepala->nama_Kpasar?></u></td>
							<td style="text-align: center;"><u>(<?= $databaru->nama ?>)</u></td>
						</tr>
						<tr>
							<td style="text-align: center;">NIP. <?=$datakepala->nip_Kpasar?></td>
							<td></td>
						</tr>
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