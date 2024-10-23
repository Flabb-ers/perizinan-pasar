
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-6">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Data Pegawai</h6>
</div>
<div class="card-body">  
<div class="row">
<div class="col-6">
    <div class="box box-warning">
        <div class="box-body">
        <form action="<?php echo site_url('Admin/pegawai/edit/'.$datapegawai->id_pegawai)?>" method="post">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
			
        <label>Nama Pegawai</label>
        <div class="form-group">
        <input type="text" name="nama_pegawai" value="<?php echo $datapegawai->nama_pegawai ?>" pattern="[A-Za-z ,.]+" class="form-control" required>
        </div>
        <div class="form-group">
        <label>Nama Pasar</label>
        <select class="form-control select2bs4" name="nama_pasar" style="width: 100%;">
        <option value="" >---Pilih---</option>
        <?php foreach ($datapasar as $key) {?>
            <option value="<?= $key->id_pasar ?>" <?php if ($key->id_pasar==$datapegawai->id_pasar) {
                echo "selected";
            }?>> <?= $key->nama_pasar?></option>
        <?php } ?>
        </select> 
        </div>
        <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $datapegawai->username ?>" pattern="^[A-Za-z0-9]{5,8}$" class="form-control" required>
        </div>
        <div class="form-group">
        <label>Level User</label>
        <select class="form-control select2bs4" name="level" style="width: 100%;" required>
        <option selected="selected"><?php echo $datapegawai->level ?></option>
        <option value="1">Admin</option>
        <option value="2">Dinas</option>
        <option value="3">Pasar</option>
        <option value="4">Kepala Dinas</option>
        </select>
        </div>

    
    
        <button type="submit" name="edit" class="btn btn-primary">Submit</button>
        <a href="<?php echo site_url('Admin/Pegawai') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>  
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
