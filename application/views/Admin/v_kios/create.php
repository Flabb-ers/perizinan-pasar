<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-6">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kios</h6>
</div>
<div class="card-body">  
<div class="row">
<div class="col-12">
    <div class="box box-warning">
        <div class="box-body">
        <form class="" action="<?php echo site_url ('Admin/Kios/create') ?>" method="post">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <div class="modal-body">
            <div class="form-group row">
                <div class="col-md-6 mb-6 mb-sm-0">
                    <label>Nama Pasar</label>
                    <select class="form-control select2bs4" name="id_pasar" style="width: 100%;" required>
                    <option value="" >---Pilih---</option>
                    <?php foreach ($datapasar as $key) {?>
                        <option value="<?= $key->id_pasar ?>"> <?= $key->nama_pasar?> (<?= $key->tipe_pasar?>) </option>
                    <?php } ?>
                    </select> 
                </div>
                <div class="col-md-6">
                     <label>Nama Blok</label>
                     <input type="text" name="nama_blok" pattern="[A-Za-z ]+" class="form-control" required>
                </div>
            </div>
        
            <div class="form-group row">
                <div class="col-md-6 mb-6 mb-sm-0">
                     <label>No</label>
                     <input type="text" name="no_blok" pattern="^[0-9]{1,3}$"  class="form-control" required>
                </div>
                    <div class="col-md-3 ">
                        <label>Panjang</label><br>
                        <input type="text" name="panjang" pattern="^[0-9]{1,2}$" class="form-control" required> 
                    </div>
                    <div class=" col-md-3">
                         <label>Lebar</label><br>
                         <input type="text" name="lebar" pattern="^[0-9]{1,2}$" class="form-control" required>
                    </div>
            </div>
            
                <div class="form-group row">
                <div class="col-md-6 mb-6 mb-sm-0">
                    <label>Letak</label>
                    <select class="form-control select2bs4" name="id_tarif" style="width: 100%;" required>
                    <option selected="selected">---Pilih---</option>
                    <?php foreach ($datatarif as $key) {?>
                        <option value="<?= $key->id_tarif ?>"> <?= $key->letak_kioslos?> (<?= $key->tipe_pasar?>-<?= $key->jenis?>)</option>
                    <?php } ?>
                    </select> 
                </div>
            </div>
        
               
        <a href="<?php echo site_url('Admin/Kios') ?>"><button name="simpan" type="submit" class="btn btn-primary">Submit</button></a>
        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        <a href="<?php echo site_url('Admin/Kios') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>
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
