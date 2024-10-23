<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-6">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jenis Dagangan</h6>
</div>
<div class="card-body">  
<div class="row">
<div class="col-12">
    <div class="box box-warning">
        <div class="box-body">
        <form class="" action="<?php echo site_url ('Admin/Jenis/create') ?>" method="post">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <div class="modal-body">
        <div class="form-group row">
                <div class="col-md-6 mb-6 mb-sm-0">
                     <label>Jenis Dagangan</label>
                     <input type="text" name="jenis_dagangan" pattern="[A-Za-z ]+"  class="form-control" required>
                </div>
            </div>
        
               
        <a href="<?php echo site_url('Admin/Jenis') ?>"><button name="simpan" type="submit" class="btn btn-primary">Submit</button></a>
        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        <a href="<?php echo site_url('Admin/Jenis') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>
      </div>
  </form>
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
