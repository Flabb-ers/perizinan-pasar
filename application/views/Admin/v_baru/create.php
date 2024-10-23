

<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-6">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Permohonan Baru</h6>
</div>
<div class="card-body">  
<div class="row">
<div class="col-12">
    <div class="box box-warning">
        <div class="box-body">
        <?php echo form_open_multipart ('Dinas/Baru/UpdateProses/'.$databaru->id_pengajuan) ?>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <div class="modal-body">
                <div class="form-group row">
                <div class="col-md-6 mb-6 mb-sm-0">
                <label>Nama Pasar</label>
                 <input type="text" name="nama_pasar" id="nama_pasar" class="form-control" readonly="" >
            </div>
            <div class="col-md-6">
                <label>Nama Wajib Pajak</label>
                <input type="text" name="nama" id="nama" class="form-control" readonly="" >
                <input type="hidden" name="id_kios" id="id_kios" class="form-control" readonly="" >
                <input type="hidden" name="id_jenis" id="id_jenis" class="form-control" readonly="" >
            </div>
        </div>
            <div class="form-group row">
            <div class="col-md-6 mb-6 mb-sm-0">
                <label>NIK</label>
                <input type="text" name="nik" id="nik" class="form-control" readonly="" >
            </div>
            <div class="col-md-6">
                <label>Alamat</label>
                <input type="text" name="alamat"  id="alamat" class="form-control" readonly="" > 
               
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mb-6 mb-sm-0">
                <label>No Telp</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" readonly="" >
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input type="text" name="email" id="email"  class="form-control" readonly="" > 
               
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mb-6 mb-sm-0">
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" readonly="" >
            </div>
            <div class="col-md-6">
                <label>Jenis Dagangan</label>
                <input type="text" name="jenis_dagangan" id="jenis_dagangan"  class="form-control" readonly="" > 
               
            </div>
        </div>
        <div class="modal-body">
                <div class="form-group row">
                <div class="col-md-6 mb-6 mb-sm-0">
                <label>Nama Blok</label>
                 <input type="text" name="nama_blok" id="nama_blok" class="form-control" readonly="" >
            </div>
            <div class="col-md-6">
                <label>No Blok</label>
                <input type="text" name="no_blok" id="no_blok" class="form-control" readonly="" >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mb-6 mb-sm-0">
                <label>Tanggal Daftar</label>
                <input type="text" name="tanggal" id="tanggal" class="form-control" readonly="" >
            </div>
            <div class="col-md-6">
                <label>NPWRD</label>
                <input type="text" name="npwrd" id="npwrd" class="form-control" readonly="" >
            </div>
        </div>



        <div class="form-group row">
            <div class="col-md-6 mb-6 mb-sm-0">
                <label>Surat Permohonan Kepala Pasar</label><br>
                <input type="file" name="sp_kepala" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Surat Permohonan Pemohon</label><br>
                <input type="file" name="sp_pemilik" class="form-control" required>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-md-6 mb-6 mb-sm-0">
                 <label>Surat Pernyataan</label><br>
                 <input type="file" name="surat_pernyataan" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>KTP Pemilik</label><br>
                <input type="file" name="ktp_pemilik" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 mb-6 mb-sm-0">
                <label>Pas Foto</label><br>
                <input type="file" name="pas_foto" class="form-control" required>
            </div>
            <div class="col-md-6" >
                <label class=" text-danger">Keterangan:<br>1. Semua persyaratan wajib diisi<br>2. Format yang digunakan adalah jpeg/jpg/png</label>
            </div>
        </div>

               
        <a href="<?php echo site_url('Pasar/Baru') ?>"><button name="simpan" type="submit" class="btn btn-primary">Submit</button></a>
        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        <a href="<?php echo site_url('Pasar/Baru') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>
      </div>
 <?php echo form_close(); ?> 
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
