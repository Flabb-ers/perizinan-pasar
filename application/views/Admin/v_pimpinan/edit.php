
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-6">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Data Kepala Dinas</h6>
</div>
<div class="card-body">  
<div class="row">
<div class="col-6">
    <div class="box box-warning">
        <div class="box-body">
        <form action="<?php echo site_url('Admin/pimpinan/edit/'.$datapimpinan->id_pimpinan)?>" method="post">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <div class="form-group">
        <label>Nama Pimpinan</label>
        <select class="form-control select2bs4" name="nama_pegawai" style="width: 100%;" required>
        <option value="" >---Pilih---</option>
        <?php foreach ($datapegawai as $key) {?>
            <option value="<?= $key->id_pegawai ?>" <?php if ($key->id_pegawai==$datapimpinan->id_pegawai) {
                echo "selected";
            }?>> <?= $key->nama_pegawai?></option>
        <?php } ?>
        </select> 
        </div>
        <div class="form-group">
        <label>NIP</label>
        <input type="text" name="nip" value="<?php echo $datapimpinan->nip ?>" pattern="[0-9 ]{21}" class="form-control" required>
        </div>
        <div class="form-group">
        <label>Jabatan</label>
        <input type="text" name="jabatan" value="<?php echo $datapimpinan->jabatan ?>" pattern="[A-Za-z ]+" class="form-control" required>
        </div>
        <div class="form-group">
        <label>Golongan</label>
        <input type="text" name="golongan" value="<?php echo $datapimpinan->golongan ?>" pattern="[A-Za-z .]+" class="form-control" required>
        </div>
        <div class="form-group">
        <label>Periode</label>
        <input type="text" name="periode" value="<?php echo $datapimpinan->periode ?>" pattern="[0-9]{4}-[0-9]{4}" class="form-control" required>
        </div>
    
        <button type="submit" name="edit" class="btn btn-primary">Submit</button>
        <a href="<?php echo site_url('Admin/Pimpinan') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>  
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
