<!DOCTYPE html>
<html lang="en">

<head>
	<title></title>
	<!-- <link href="template/css/sb-admin-2.min.css" rel="stylesheet"> -->
</head>
<style type="text/css">
	body {
		font-family: times-new-roman;
		background-color: #fff
	}

	.rangkasurat {
		width: 100%;
		margin: 0px;
		background-color: #fff;
		padding: 3px;
	}

	table {
		padding: 2px
	}

	.hr {
		border-bottom: 5px solid #000;
	}

	.tengah {
		text-align: center;
		line-height: 5px;
	}

	.tengah2 {
		text-align: center;
	}

	.hd {
		border-collapse: collapse;
	}
</style>

<body>
	<div class="rangkasurat">

		<div class="tengah">
			<h4><b><u>LAPORAN DATA PASAR</u></b></h4>
			<p>&nbsp;</p>
			<p></p>
		</div>
	</div></br>
	<div class="tengah2">
		<table class="hd" border="1px" padding="3px 8px" border-color="#000" width="100%">
			<thead>
				<tr>
					<th>Kode Tarif</th>
					<th>Tipe Pasar</th>
					<th>Jenis</th>
					<th>Letak Kios/Los</th>
					<th>Tarif</th>
				</tr>
			</thead>

			<?php
			$no = 1;
			foreach ($datatarif as $key) {
			?>
				<tbody>
					<tr>
						<td><?= $key->id_tarif ?></td>
						<td><?= $key->tipe_pasar ?></td>
						<td><?= $key->jenis ?></td>
						<td><?= $key->letak_kioslos ?></td>
						<td><?= $key->tarif ?></td>
					</tr>
				</tbody>
			<?php
			}
			?>

		</table>
	</div>

</body>

</html>
