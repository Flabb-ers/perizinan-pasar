<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-6">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kepala Dinas</h6>
</div>
<div class="card-body">  
<div class="row">
<div class="col-6">
    <div class="box box-warning">
        <div class="box-body">
        <form class="" action="<?php echo site_url ('Admin/Pimpinan/create') ?>" method="post">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <div class="modal-body"> 
        <div class="form-group">
        <label>Nama Pegawai</label>
        <select class="form-control select2bs4" name="nama_pegawai"  style="width: 100%;" required>
        <option value="" >---Pilih---</option>
        <?php foreach ($datapegawai as $key) {?>
            <option value="<?= $key->id_pegawai ?>"> <?= $key->nama_pegawai?></option>
        <?php } ?>
        </select> 
        </div> 
        <div class="form-group">
        <label>NIP</label><br>
        <input type="text" name="nip" pattern="^[0-9 ]{18,21}$"  class="form-control" required>
        </div>
        <div class="form-group">
        <label>Jabatan</label><br>
        <input type="text" name="jabatan" pattern="[A-Za-z ]+" class="form-control" required>
        </div>
        <div class="form-group">
        <label>Golongan</label><br>
        <input type="text" name="golongan" pattern="[A-Za-z .]+" class="form-control" required>
        </div>
        <div class="form-group">
        <label>Periode</label><br>
        <input type="text" name="periode" pattern="[0-9]{4}-[0-9]{4}" class="form-control" required>
        </div>
        
        
        <a href="<?php echo site_url('Admin/Pimpinan') ?>"><button name="simpan" type="submit" class="btn btn-primary">Submit</button></a>
        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        <a href="<?php echo site_url('Admin/Pimpinan') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>
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
