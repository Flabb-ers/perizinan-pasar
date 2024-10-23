
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-6">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
</div>
<div class="card-body">  
<div class="row">
<div class="col-6">
    <div class="box box-warning">
        <div class="box-body">
        <form action="<?php echo site_url('Admin/pegawai/ganti/'.$datapegawai->id_pegawai)?>" method="post">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <div class="box-body">
        <div class="form-group">
        <label>Password</label><br>
        <input type="text" name="pass" class="form-control" pattern="^[A-Za-z0-9]{5,8}$" required>
        </div>

    
    
        <button type="submit" name="ganti" class="btn btn-primary">Submit</button>
        <a href="<?php echo site_url('Admin/Pegawai') ?>"><button type="button" name="button" class="btn btn-warning">Cencel</button>  
        </form>  
        </div>
    </div>
    </div>
</section>
</div>

    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->

<!-- Begin Page Content -->

</div>
