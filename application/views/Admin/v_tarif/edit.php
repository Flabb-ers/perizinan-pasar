
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-6">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Data Tarif</h6>
</div>
<div class="card-body">  
<div class="row">
<div class="col-6">
    <div class="box box-warning">
        <div class="box-body">
        <form action="<?php echo site_url('Admin/tarif/edit/'.$datatarif->id_tarif)?>" method="post">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <div class="form-group"> 
        <label>Tipe Pasar</label>
        <select class="form-control select2bs4" name="tipe_pasar"  style="width: 100%;" required>
        <option selected="selected"><?php echo $datatarif->tipe_pasar ?></option>
        <option value="1">Tipe A</option>
        <option value="2">Tipe B</option>
        <option value="3">Tipe C</option>
        <option value="4">Tipe D</option> 
        </select> 
        </div>
        <div class="form-group"> 
        <label>Jenis</label>
        <select class="form-control select2bs4" name="jenis"  style="width: 100%;" required>
        <option selected="selected"><?php echo $datatarif->jenis ?></option>
                <option value="1">Kios</option>
                <option value="2">Los</option>
                <option value="3">Selasar</option>
        </select> 
        </div>
        <div class="form-group">
        <label>Letak Kios/Los</label>
        <input type="text" name="letak_kioslos" value="<?php echo $datatarif->letak_kioslos ?>" pattern="[A-Za-z -]+" class="form-control" required>
        </div>
        <div class="form-group">
        <label>Tarif</label>
        <input type="text" name="tarif" pattern="^[0-9]{3,4}$" value="<?php echo $datatarif->tarif ?>" class="form-control" required>
        </div>
        
    
        <button name="edit" type="submit" class="btn btn-primary">Submit</button>
        <a href="<?php echo site_url('Admin/Tarif') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>  
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
