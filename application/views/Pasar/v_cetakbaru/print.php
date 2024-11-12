<!DOCTYPE html>
<html lang="en">
<style type="text/css">
	body {
		font-family: times-new-roman;
		font-size: 9pt;
		background-color: #fff;
		margin-right: 40px;
		margin-top: 37px;
		margin-left: 70px;
	}

	.rangkasurat {
		background-color: #fff;
		padding: 0px;
		margin-top: 20px;
	}

	table {
		padding: 0px;
	}


	.hr {
		border-bottom: 5px solid #000;
	}

	.tengah {
		text-align: center;
		line-height: 1px;
	}

	.tidaktengah {
		text-align: justify;
		margin-right: 70px;
		margin-left: 0px;
	}

	p {
		line-height: 1px;
	}

	.justify {
		text-align: justify;
	}

	.uper {
		text-transform: uppercase;
	}

	@media print {
		@page {
			size: legal;
			margin: 30px 0 0 0;
		}

		body {
			margin: 30px 40px 0 70px;
		}

		.rangkasurat {
			margin-top: 20px;
		}

		table.hr {
			margin-top: 30px;
		}
	}
</style>

<body> </body>
<div class="rangkasurat">
	<table class="hr" width="100%">
		<thead>
			<tr>
				<td></td>
				<td><img src="<?= base_url('template/img/logo.jpg'); ?>" width="60px"> </td>
				<td class="tengah">
					<p>

						PEMERINTAH KABUPATEN PURWOREJO

					<p><b>DINAS KOPERASI USAHA KECIL MENENGAH DAN PERDAGANGAN</b></p>
					<p>Jalan Jendral Sudirman Nomor : 22 Telpon ( 0275 ) 321018, 321028</p>
					<p>PURWOREJO - 54114</p>
					<p>Email : dinkukmp@purworejokab.go.id Website : www.dinkukmp.purworejokab.go.id</p>
				</td>
				<td>
					<p>NO. SERI : K</p>
				</td>
			</tr>
		</thead>
	</table>

	<h4 class="tengah uper"><u>SURAT IZIN MENEMPATI <?php echo $dataop->jenis ?></u></h4>
	<p class="tengah">NOMOR : 510 /&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/<?php echo date('Y') ?></p>

	<p>Yang bertanda tangan di bawah ini :</p>
	<table>
		<thead>
			<tr>
				<td>Nama</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>

				<?php foreach ($datapimpinan as $key) { ?>
					<td style="font-weight:bolder"> <?php echo strtoupper($key->nama_pegawai) ?> </td>
				<?php  } ?>
			</tr>
			<tr>
				<td>NIP</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
				<?php foreach ($datapimpinan as $key) { ?>
					<td> <?php echo $key->nip ?> </td>
				<?php  } ?>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
				<td>Kepala Dinas Koperasi Usaha Kecil Menengah dan Perdagangan Kabupaten Purworejo</td>
		</thead>
	</table>
	<h4 class="justify">Berdasarkan Peraturan Daerah Kabupaten Purworejo Nomor 17 Tahun 2007, Atas nama Bupati Purworejo <br>dalam hal ini bertindak untuk dan atas nama Pemerintah Daerah Kabupaten Purworejo dengan ini <br>memberikan izin kepada : </h4>
	<table>
		<thead>
			<tr>
				<td>Nama</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
				<?php foreach ($print as $key) { ?>
					<td> <?php echo $key->nama ?> </td>
				<?php  } ?>

			</tr>
			<tr>
				<td>Alamat</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
				<?php foreach ($print as $key) { ?>
					<td> <?php echo $key->alamat ?> </td>
				<?php  } ?>
			</tr>
			<tr>
				<td>NIK</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
				<?php foreach ($print as $key) { ?>
					<td> <?php echo $key->nik ?> </td>
				<?php  } ?>
			</tr>
			<tr>
				<td>NPWRD</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
				<?php foreach ($print as $key) { ?>
					<td> <?php echo $key->npwrd ?> </td>
				<?php  } ?>
			</tr>
		</thead>
	</table>
	<p>&nbsp;</p>
	<p margin-right="70px" margin-left="0px">
		Untuk menempati <?php echo $dataop->jenis ?>
		Blok <?php echo $datakios->nama_blok ?>
		Nomor : <?php echo $datakios->no_blok ?>
		dengan luas bangunan <?php echo $datakios->panjang ?>
		m x <?php echo $datakios->lebar ?>
		m yang terletak di Kompleks
		<?php foreach ($datapasar as $key) { ?>
			<?php if ($key->id_pasar == $dataop->id_pasar) { ?>
				<?php echo $key->nama_pasar ?>
		<?php }
		} ?></p>
	<p>
		untuk berjualan <?php echo $dataop->jenis_dagangan ?> dengan ketentuan : </p>
	<table class="tidaktengah">
		<thead>
			<tr>
				<td>1.</td>
				<td>Izin berlaku untuk jangka waktu 2 (dua) tahun terhitung sejak tanggal <?php echo $tgl_mulai; ?> s/d <?php echo $tgl_akhir; ?>;</td>
			</tr>
			<tr>
				<td valign="top">2.</td>
				<td>Apabila menghendaki perpanjangan ijin, pemegang ijin mengajukan permohonan perpanjangan kepada Bupati Purworejo c.q Kepala Dinas yang membidangi pengelolaan pasar paling lambat 1 (satu) bulan sebelum jangka waktu ijin berakhir dengan catatan semua kewajiban terkait dengan penempatan <?php echo $datakios->jenis ?> telah terpenuhi dan tidak ada piutang retribusi;</td>
			</tr>
			<tr>
				<td valign="top">3.</td>
				<td>Pemegang Izin wajib membayar retribusi <?php echo $datakios->jenis ?> sebesar Rp
					<?php foreach ($datatarif as $key) { ?>
						<?php if ($key->id_tarif == $datakios->id_tarif) { ?>
							<?php echo $key->tarif * $datakios->panjang * $datakios->lebar ?>
							,- /hari dan retribusi kebersihan sebesar Rp<?php echo ($key->tarif * $datakios->panjang * $datakios->lebar) / 10 ?> ,- /hari;</td>
		<?php }
					} ?>
			</tr>
			<tr>
				<td valign="top">4.</td>
				<td>Retribusi sebagaimana dimaksud dapat dibayar secara harian/bulanan dengan mengunakan kartu E-Retribusi / BKBPR / Karcis;</td>
			</tr>
			<tr>
				<td valign="top">5.</td>
				<td>Besaran retribusi dapat berubah sewaktu-waktu menyesuaikan perubahan Peraturan Daerah/Bupati yang mengatur tentang ketetapan besaran retribusi pelayanan pasar dan/atau retribusi kebersihan;</td>
			</tr>
			<tr>
				<td valign="top">6.</td>
				<td>Pemegang Izin dilarang menjual, menyewakan, memberikan dan memindahtangankan tempat berdagang di pasar secara tetap baik sebagian atau seluruhnya kepada orang lain/pihak lain; </td>
			</tr>
			<tr>
				<td valign="top">7.</td>
				<td>Pemegang Izin dilarang mengadakan perubahan-perubahan pada <?php echo $datakios->jenis ?> dan bangunan lain dalam pasar tanpa izin Kepala Dinas;</td>
			</tr>
			<tr>
				<td valign="top">8.</td>
				<td>Pemegang izin wajib mematuhi tata tertib di Pasar sesuai ketentuan yang berlaku.</td>
			</tr>
			<tr>
				<td valign="top">9.</td>
				<td>Izin Menempati <?php echo $datakios->jenis ?> dapat dicabut apabila :
			<tr>
				<td></td>
				<td>a. Pemegang izin tidak membayar retribusi sebagaimana dimaksud pada angka 3 selama 3 (tiga) bulan secara berturut-turut;</td>
			</tr>
			<tr>
				<td></td>
				<td>b. Pemegang izin tidak mempergunakan <?php echo $datakios->jenis ?> sesuai dengan peruntukannya;</td>
			</tr>
			<tr>
				<td></td>
				<td>c. Pemegang izin tidak melakukan kegiatan usaha (berjualan) selama 2 (dua) bulan secara berturut-turut;</td>
			</tr>
			</td>
			</tr>
			<tr>
				<td>10.</td>
				<td>Izin Menempati <?php echo $datakios->jenis ?> berakhir apabila :</td>
			<tr>
				<td></td>
				<td>a. Izin menempati <?php echo $datakios->jenis ?> telah berakhir jangka waktunya dan tidak diperpanjang
				</td>
			</tr>
			<tr>
				<td></td>
				<td>b. Pemegang Ijin mengundurkan diri</td>
			</tr>
			<tr>
				<td></td>
				<td>c. Izin dicabut karena hal sebagaimana tersebut pada angka 9</td>
			</tr>
			<tr>
				<td></td>
				<td>d. Pemegang Izin meninggal dunia</td>
			</tr>
			<tr>
				<td></td>
				<td>e. Tempat diperlukan/digunakan oleh Pemerintah</td>
			</tr>
			</tr>
			<tr>
				<td>11.</td>
				<td>Izin menempati <?php echo $datakios->jenis ?> tidak dapat digunakan sebagai jaminan/agunan kepada pihak lain/perbankan;</td>
			</tr>
			<tr>
				<td>12.</td>
				<td>Apabila dikemudian hari ternyata terdapat kekeliruan akan diadakan peninjauan/perbaikan kembali sebagaimana mestinya.</td>
			</tr>
			<tr>
				<td></td>
				<td>Demikian Surat Izin Menempati <?php echo $datakios->jenis ?> ini diberikan untuk dipergunakan sebagaimana mestinya</td>
			</tr>
			<tr>
			</tr>
	</table>
</div>
<table>
	<thead>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


			</td>
			<td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>PEMEGANG IZIN<br><br><br><br><br><br><br><?php foreach ($print as $key) { ?>
					<p class="uper"><?php echo $key->nama ?></p>
				<?php  } ?>
			</td>

			<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('./template/img/gambarop/' . $dataop->pas_foto); ?>" class="img-rounded" width="150px" hight="220px"></td>


			<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td align="center">PURWOREJO, <?php echo date('d-m-Y') ?> <br>A.n BUPATI PURWOREJO<br>Kepala Dinas Koperasi Usaha Kecil<br> Menengah dan Perdagangan<br> Kabupaten Purworejo <br>
				<!-- <p><img src="<?= base_url('./assets/images/' . $dataop->qrcode); ?>" class="img-rounded" width="80" height="80"></p> -->
				<p class="uper"><u><b>
							<?php foreach ($datapimpinan as $key) { ?> <?php echo $key->nama_pegawai ?><?php  } ?></b></u><br></p>
				<?php foreach ($datapimpinan as $key) { ?> <?php echo $key->golongan ?><?php  } ?><br>
					<?php foreach ($datapimpinan as $key) { ?> <?php echo $key->nip ?><?php  } ?>
		</tr>
	</thead>
</table>

</body>

</html>

<script>
	window.print()
</script>