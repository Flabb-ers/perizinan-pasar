
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-6">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Cek Data Permohonan Baru</h6>
</div>
<div class="card-body">  
<div class="row">
<div class="col-12">
    <div class="box box-warning">
        <div class="box-body"> 
        <?php echo form_open_multipart ('Admin/Baru/UpdateProses/'.$databaru->id_pengajuan) ?>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

            <div class="form-group row">
            <label class="col-md-3 col-sm-3">Nama Pasar</label>
            <div class="col-md-9 col-sm-9">
            <select class="form-control select2bs4" disabled name="id_kios" style="width: 100%;">
            
                    <?php
                        foreach ($datakios as $key) {
                    ?>

                    <option value="" <?php if ($key->id_kios==$databaru->id_kios) {
                    echo "selected";
                    }?>><?php echo $key->nama_pasar ?></option>

                    <?php } ?>
            </select> 
            </div>
        </div>
         <div class="form-group row">
            <label class="col-md-3 col-sm-3">Kios</label>
            <div class="col-md-9 col-sm-9">
            <select class="form-control select2bs4" disabled name="id_kios" style="width: 100%;">
            
                    <?php
                        foreach ($datakios as $key) {
                    ?>

                    <option value="" <?php if ($key->id_kios==$databaru->id_kios) {
                    echo "selected";
                    }?>><?php echo $key->jenis.' '.$key->nama_blok.' No '.$key->no_blok ?></option>

                    <?php } ?>
            </select> 
            </div>
        </div>

            <div class="form-group row" > 
                <label class="col-md-3 col-sm-3">Nama Wajib Pajak</label>
                <div class="col-md-9 col-sm-9">
                    <input type="text" value="<?php echo $databaru->nama ?>" name="nama" class="form-control" disabled >    
                </div>
            </div>
                        <div class="form-group row"> 
                
                <label class="col-md-3 col-sm-3">NPWRD</label>
                <div class="col-md-9 col-sm-9">
                <input type="text" name="npwrd" pattern="[A-Za-z ]+" value="<?php echo $databaru->npwrd ?>" class="form-control" disabled >
            </div>
        </div>

        <div class="form-group row"> 
                <label class="col-md-3 col-sm-3">NIK</label>
                <div class="col-md-9 col-sm-9">
                <input type="text" name="nik" pattern="[0-9]{16}" value="<?php echo $databaru->nik ?>" class="form-control" disabled >
            </div>
            </div>

        <div class="form-group row"> 
                <label class="col-md-3 col-sm-3">Alamat</label>
                <div class="col-md-9 col-sm-9">
                <input type="text" name="alamat" value="<?php echo $databaru->alamat ?>" class="form-control" disabled > 
            </div>
            </div>
         <div class="form-group row"> 
                <label class="col-md-3 col-sm-3">No Telp</label>
                <div class="col-md-9 col-sm-9">
                <input type="text" name="no_telp" value="<?php echo $databaru->no_telp ?>" class="form-control" disabled > 
            </div>
            </div>

            <div class="form-group row"> 
                <label class="col-md-3 col-sm-3">Email</label>
                <div class="col-md-9 col-sm-9">
                <input type="text" name="email"  value="<?php echo $databaru->email ?>" class="form-control" disabled >
            </div>
            </div>
            <div class="form-group row"> 
                
                <label class="col-md-3 col-sm-3">Jenis Dagangan</label>
                <div class="col-md-9 col-sm-9">
                <input type="text" name="id_jenis" pattern="[A-Za-z ]+" value="<?php echo $databaru->jenis_dagangan ?>" class="form-control" disabled >
            </div>
        </div>

            <div class="form-group row"> 
                <label class="col-md-3 col-sm-3">Surat Permohonan Kepala Pasar</label><br>
                <div class="col-md-3 col-sm-3">
                <img src="<?= base_url('./template/img/syarat/'.$databaru->sp_kepala); ?>" class="img-rounded" width="100px">
            </div>

                 <label class="col-md-3 col-sm-3">KTP Pemilik</label><br>
                <div class="col-md-3 col-sm-3">
                <img src="<?= base_url('./template/img/syarat/'.$databaru->ktp_pemilik); ?>" class="img-rounded" width="100px">
            </div>
        </div>


        <div class="form-group row">
                 <label class="col-md-3 col-sm-3">Surat Pernyataan</label><br>
                 <div class="col-md-3 col-sm-3">
                 <img src="<?= base_url('./template/img/syarat/'.$databaru->surat_pernyataan); ?>" class="img-rounded" width="100px">
            </div>
            <label class="col-md-3 col-sm-3">Pas Foto</label><br>
                <div class="col-md-3 col-sm-3">
                <img src="<?= base_url('./template/img/syarat/'.$databaru->pas_foto); ?>" class="img-rounded" width="100px">
               
            </div>
        </div>

        <div class="form-group row">
                
                <label class="col-md-3 col-sm-3">Surat Permohonan Pemohon</label><br>
                <div class="col-md-3 col-sm-3">
                <img src="<?= base_url('./template/img/syarat/'.$databaru->sp_pemilik); ?>" class="img-rounded" width="100px">
            </div>
        </div>
        <div class="form-group row"> 
             <label class="col-md-3 col-sm-3">Status</label>
             <div class="col-md-9 col-sm-9">
                <select class="form-control select2bs4" name="status"  style="width: 100%;" required>
                <option selected="selected"><?php echo $databaru->status ?></option>
                <option value="Proses">Proses</option>
                <option value="Gagal">Gagal</option>
                <option value="Selesai">Selesai</option>
                <option value="Menunggu TTD">Menunggu TTD</option>
                </select> 
            </div>
        </div>
        <div class="form-group row"> 
                <label class="col-md-3 col-sm-3">Keterangan</label>
                <div class="col-md-9 col-sm-9">
                <input type="text" name="keterangan" value="<?php echo $databaru->keterangan ?>" pattern="[A-Za-z -]+"  class="form-control"  >
            </div>
        </div>


        <button type="submit" name="button" class="btn btn-primary">Submit</button>
        <a href="<?php echo site_url('Admin/Baru') ?>"><button type="button" name="button" class="btn btn-warning">Cencel</button>  
        <?php echo form_close(); ?> 
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
