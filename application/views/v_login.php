<style type="text/css">
	body {
		background: url(../template/img/menara1.jpg);
		color: #fff;
		background-size: cover;
		background-repeat: no-repeat;
	}

	#container {
		opacity: 1;
	}
</style>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>DINKUKMP</title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css'); ?> " rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('template/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

	<div id="container" class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-6 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">

							<div class="col-lg ">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
									</div>
									<?= $this->session->flashdata('pesan') ?>
									<?= form_open('auth/prosesloginpasar') ?>
									<div class="form-group">
										<input type="text" name="username" class="form-control form-control-user"
											placeholder="Username ">
									</div>
									<div class="form-group">
										<input type="password" name="pass" class="form-control form-control-user"
											placeholder="Password">
									</div>
									<div class="form-group">
										<label>Level</label>
										<select class="form-control" name="level" id="level" style="width: 100%;" required>
											<option value="Admin">Admin</option>
											<option value="Dinas">Dinas</option>
											<option value="Pasar">Pasar</option>
											<option value="Kdinas">Kepala Dinas</option>
										</select>
									</div>
									<div class="form-group" id="nama_pasar" style="display: none;">
										<select class="form-control form-control-user select2bs4" name="nama_pasar" style="width: 100%;">
											<option value="">Nama Pasar</option>
											<?php foreach ($datapasar as $key) { ?>
												<option value="<?= $key->nama_pasar ?>"> <?= $key->nama_pasar ?></option>
											<?php } ?>
										</select>
									</div>
									<button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
									<?= form_close() ?>
									<hr>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url('template/'); ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url('template/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('template/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url('template/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>

<script src="<?php echo base_url('template/js/jquery-3.2.1.min.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		const level = document.getElementById("level");
		const nama_pasar = document.getElementById("nama_pasar");

		level.addEventListener("change", function() {
			if (level.value === "Pasar") {
				nama_pasar.style.display = "block";
			} else {
				nama_pasar.style.display = "none";
			}
		});


	});
</script>
