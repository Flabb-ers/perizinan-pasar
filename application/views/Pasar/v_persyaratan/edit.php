
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-6">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Data Permohonan Baru</h6>
</div>
<div class="card-body">  
<div class="row">
<div class="col-12">
    <div class="box box-warning">
    <div class="box-body"> 
        <?php echo form_open_multipart ('Pasar/Persyaratan/update/'.$databaru->id_pengajuan) ?>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <div class="form-group row">
                <div class="col-md-12 mb-12 mb-sm-0">
                <label>Nama Pasar</label>
               <input type="text" name="nama_pasar" value="<?= $this->session->userdata('nama_pasar') ?>" class="form-control" readonly >
            </div>
        </div>
                <div class="form-group row">
                <div class="col-md-6 mb-6 mb-sm-0">

                <label>Nama Pasar</label>
                <select class="form-control" name="id_kios" id="id_kios" style="width: 100%;" required>
                    <option value="">---Pilih Kios---</option>
                    <?php
                        foreach ($datakios as $key) {
                    ?>

                    <option value="<?= $key->id_kios ?>" <?php if ($key->id_kios==$databaru->id_kios) {
                    echo "selected";
                    }?>><?php echo $key->jenis.' '.$key->nama_blok.' No '.$key->no_blok ?></option>

                    <?php } ?>
                </select>
            </div>

            <div class="col-md-6">
                <label>Nama Wajib Pajak</label>
                <input type="text" value="<?php echo $databaru->nama ?>" name="nama" pattern="[A-Za-z ]+" class="form-control" required >
            </div>
        </div>

        <div class="form-group row">

            <div class="col-md-6 mb-6 mb-sm-0">
                <label>NIK</label>
                <input type="text" name="nik" pattern="[0-9]{16}"  value="<?php echo $databaru->nik ?>" class="form-control" required >
            </div>
            <div class="col-md-6">
                <label>Alamat</label>
                <input type="text" name="alamat" pattern="[A-Za-z ,.]+" value="<?php echo $databaru->alamat ?>" class="form-control" required > 
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mb-6 mb-sm-0">
                <label>No Telp</label>
                <input type="text" name="no_telp"  value="<?php echo $databaru->no_telp ?>" pattern="(\+62|62|0)8[1-9][0-9]{6,9}$" class="form-control" required > 
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="email"  value="<?php echo $databaru->email ?>" class="form-control" required >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mb-6 mb-sm-0">
                <label>Status NPWRD</label>
            <select class="form-control" name="status_npwrd" id="status_npwrd" style="width: 100%;" required>
                <option value="Belum">Belum Memiliki</option>
                <option value="Sudah">Sudah Memiliki</option>
            </select> 
            </div>
            <div class="col-md-6">
                <label>Jenis Dagangan</label>
                <select class="form-control select2bs4" name="id_jenis" style="width: 100%;" required>
                    <?php foreach ($datajenis as $key) {?>
                    <option value="<?= $key->id_jenis ?>" <?php if ($key->id_jenis==$databaru->id_jenis) {
                        echo "selected";
                    }?>> <?= $key->jenis_dagangan?></option>
                    <?php } ?>
                    </select>
            </div>
        </div>


        <div class="form-group" id="npwrd" style="display: none;">
            <div class="col-md-6 mb-6 mb-sm-0">
            <label>NPWRD</label><br>
            <div class="form-group">
                <input type="text" name="npwrd"  value="<?php echo $databaru->npwrd ?>" pattern="[0-9]{14}" class="form-control">
            </div>
        </div>
    </div>
            
        <button type="submit" value="Simpan" class="btn btn-primary">Submit</button>
        <a href="<?php echo site_url('Pasar/Persyaratan') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>  
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

<script src="<?php echo base_url('template/js/jquery-3.2.1.min.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    const status_npwrd = document.getElementById("status_npwrd");
    const npwrd = document.getElementById("npwrd");

    status_npwrd.addEventListener("change", function () {
        if (status_npwrd.value === "Sudah") {
            npwrd.style.display = "block";
        } else {
            npwrd.style.display = "none";
        }
    });

      
});


</script>
