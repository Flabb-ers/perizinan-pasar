
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-6">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Data Pasar</h6>
</div>
<div class="card-body">  
<div class="row">
<div class="col-6">
    <div class="box box-warning">
        <div class="box-body">
        <form action="<?php echo site_url('Admin/pasar/edit/'.$datapasar->id_pasar)?>" method="post">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <div class="form-group">
        <label>Nama Pasar</label>
        <input type="text" name="nama_pasar" value="<?php echo $datapasar->nama_pasar ?>" pattern="[A-Za-z ]+" class="form-control" required>
        </div>
        <div class="form-group">
        <label>Tipe Pasar</label>
        <select class="form-control select2bs4" name="tipe_pasar"  style="width: 100%;" required>
        <option selected="selected"><?php echo $datapasar->tipe_pasar ?></option>
        <option value="1">Tipe A</option>
        <option value="2">Tipe B</option>
        <option value="3">Tipe C</option>
        <option value="4">Tipe D</option>
        </select> 
        </div>
       
    
        <button type="submit" name="edit" class="btn btn-primary">Submit</button>
        <a href="<?php echo site_url('Admin/Pasar') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>  
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
