<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
        </div>
        <div class="card-body">

                <div class="row g-0">
                   <div class="col-md-3 mb-6 mb-sm-0">
                      <img src="<?= base_url('template/img/profile.jpg'); ?>" class="img-fluid rounded-start">
                    </div>
                     <div class="col-md-3">
                        <div class="card-body">
                            <p class="card-title">Nama Pegawai &nbsp;&nbsp;: <?php echo $datapegawai['nama_pegawai'] ?></p>
                            <p class="card-title">Level&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $datapegawai['level'] ?></p>
                            <a href="<?php echo site_url('Admin/Profile/editprofile/')?>" class="btn btn-success btn-sm"><i class="fa fa-edit">Edit Profile</i></a>
                        </div>
                    </div>
                </div>


    </div>
</div>

