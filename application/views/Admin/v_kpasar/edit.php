
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-6">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Data Kepala Pasar</h6>
</div>
<div class="card-body">  
<div class="row">
<div class="col-6">
    <div class="box box-warning">
        <div class="box-body">
        <form action="<?php echo site_url('Admin/Kpasar/edit/'.$datakepala->id_Kpasar)?>" method="post">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <div class="form-group">
        <label>Nama Pasar</label>
        <select class="form-control select2bs4" name="nama_pasar" style="width: 100%;">
        <option value="" >---Pilih---</option>
        <?php foreach ($datapasar as $key) {?>
            <option value="<?= $key->id_pasar ?>" <?php if ($key->id_pasar==$datakepala->id_pasar) {
                echo "selected";
            }?>> <?= $key->nama_pasar?></option>
        <?php } ?>
        </select>
        </div>
        <div class="form-group">
        <label>Nama Pegawai</label>
         <input type="text" name="nama_Kpasar" value="<?php echo $datakepala->nama_Kpasar ?>" pattern="[A-Za-z .,]+"  class="form-control" required>
        </div> 
        <div class="form-group">
        <label>NIP</label><br>
        <input type="text" name="nip_Kpasar" value="<?php echo $datakepala->nip_Kpasar ?>" pattern="^[0-9 ]{18,21}$"  class="form-control" required>
        </div>
    
        <button type="submit" name="edit" class="btn btn-primary">Submit</button>
        <a href="<?php echo site_url('Admin/Kpasar') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>  
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
