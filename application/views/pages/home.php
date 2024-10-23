<style type="text/css">
    body {
        background: url(../template/img/menara1.jpg);
        color: #fff;
        background-size: cover;
        background-repeat: no-repeat;
        font-family: times-new-roman;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }

    #wrapper {
        flex: 1;
    }

    #footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        padding: 10px;
        box-shadow: 0px -3px 10px -8px #333;
        opacity: 0.8;
    }

    #navbar {
        opacity: 0.8;
    }

    #container {
        opacity: 0.8;
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

    <title>PERIZINAN</title>

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css'); ?> " rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href=" <?php echo base_url('template/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url('template/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg" id="navbar" style="background-color: #003366; color: #fff; padding: 9px;">
        <div class="container px-0">
            <a class="navbar-brand" href="<?= base_url('Welcome'); ?>">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ms-auto mb-1 mb-lg-0 text-white">
                    <li class="nav-item"><a class="nav-link text-white active" href="<?= base_url('Index/'); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link active text-white
                    " href="<?= base_url('Auth/'); ?>">Log In</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="container" class="container">


        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <div class="row">

                            <div class="col-lg ">
                                <div class="p-5">
                                    <div class="text-center">
                                        <table width="100%">
                                            <thead>
                                                <tr>
                                                    <td align="center">
                                                        <p><b>DINKUKMP KABUPATEN PURWOREJO</b></p>
                                                        <p>Dinas Koperasi, Usaha Kecil, Menengah dan Perdagangan Kabupaten Purworejo</p>
                                                    </td>
                                                </tr>
                                            </thead>
                                        </table><br>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <table width="100%">
                                            <thead>
                                                <tr>
                                                    <td align="center">
                                                        <p>&nbsp;</p>
                                                        <p>Dinas Koperasi, Usaha Kecil, Menengah dan Perdagangan Kabupaten Purworejo memiliki tugas membantu Bupati dalam melaksanakan urusan pemerintahan bidang koperasi, usaha kecil dan menengah serta perdagangan sesuai dengan kewenangan daerah</p>
                                                    </td>
                                                </tr>
                                            </thead>
                                        </table><br>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <!-- Footer -->
    <footer class="sticky-footer" style="background-color: #003366; color: #fff; padding: 8px;"> 
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <marquee behavior="scroll" direction="left" scrollamount="4">
                <span>Sistem Informasi Perizinan Menempati Kios dan Los Pasar Dinas Koperasi, Usaha Kecil Menengah dan Perdagangan Kabupaten Purworejo &copy; Support by Informatika POLSA</span>
            </marquee>
        </div>
    </div>
</footer>
</body>

</html>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('vendor/jquery/jquery.min.js'); ?>"></script>
<script src=" <?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src=" <?php echo base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<!-- <script src=" <?php echo base_url('template/'); ?> js/sb-admin-2.min.js"></script> -->

<!-- Page level plugins -->
<script src="<?php echo base_url('vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('vendor/datatables/dataTables.bootstrap4.min.js'); ?> "></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('template/'); ?>js/demo/datatables-demo.js"></script>
<script src="<?php echo base_url('template/'); ?> js/jquery-3.2.1.min.js "></script>

