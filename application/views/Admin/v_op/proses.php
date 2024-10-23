
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-6">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Permohonan Perpanjang</h6>
</div>
<div class="card-body">  
<div class="row">
<div class="col-12">
    <div class="box box-warning">
        <div class="box-body">
        <form action="<?php echo site_url('Admin/op/proses/'.$dataop->id_objek_pajak)?>" method="post">
         <div class="modal-body"> 
        <div class="form-group row">
                <div class="col-md-6 mb-6 mb-sm-0">
                        <label>Nama</label>
                        <select class="form-control select2bs4" name="id_pengajuan" id="pengajuan" style="width: 100%;" required>
                        <option value="" >PILIH NAMA </option>
                        <?php foreach ($datapengajuan as $key) {?>
                            <option value="<?= $key->id_pengajuan ?>"> <?= $key->nama?></option>
                        <?php } ?>
                        </select> 
                </div>
        <input type="hidden" name="nama" id="nama" class="form-control" >
        <div class="col-md-6">
        <label>NPWRD</label><br>
        <input type="text" name="npwrd" id="npwrd" class="form-control" readonly>
                </div>
            </div>
         <input type="hidden" name="id_kios" id="id_kios" class="form-control" >
        <div class="form-group row">
        <div class="col-md-6 mb-6 mb-sm-0">
        <label>Nama Pasar</label><br>
        <input type="text" name="nama_pasar" id="nama_pasar" class="form-control" readonly>
        </div>
        <div class="col-md-6">
        <label>Nama Blok</label><br>
        <input type="text" name="nama_blok" id="nama_blok" class="form-control" readonly>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6 mb-6 mb-sm-0">
         <label>No Blok</label><br>
        <input type="text" name="no_blok" id="no_blok" class="form-control" readonly>
        <input type="hidden" name="tgl_daftar" value="<?php echo $dataop->tgl_daftar?>"  class="form-control" readonly>
        </div>
    </div>
    <input type="hidden" name="pas_foto" id="pas_foto" class="form-control" required="">
    <input type="hidden" name="pas_foto_lama" value="<?php echo $dataop->pas_foto?>" class="form-control" >

        <button type="submit" name="proses" class="btn btn-primary">Submit</button>
        <a href="<?php echo site_url('Admin/Objek/detail/'.$dataop->id_objek) ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>  
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


<script src="<?php echo base_url('template/js/jquery-3.2.1.min.js') ?>"></script>
<script type="text/javascript">
 $(document).ready(function() {
    // Menangani perubahan pada elemen dropdown pengajuan
    $('#pengajuan').on('change', function() {
        var id_pengajuan = $(this).val();

        // Melakukan AJAX untuk memeriksa status file
        $.ajax({
            url: '<?php echo base_url('Admin/Op/getPengajuan'); ?>',
            type: 'POST',
            data: {id_pengajuan: id_pengajuan},
            dataType: 'json',
            success: function(response) {
                if (response.length > 0) {


                    $("#nama").val(response[0].nama);
                    $("#npwrd").val(response[0].npwrd);
                    $("#nama_pasar").val(response[0].nama_pasar);
                    $("#nama_blok").val(response[0].jenis+' '+response[0].nama_blok);
                    $("#no_blok").val(response[0].no_blok);
                    $("#tanggal").val(response[0].tanggal);
                    $("#pas_foto").val(response[0].pas_foto);


                    } else {
                            $("#nama").val('');
                            $("#npwrd").val('');
                            $("#nama_pasar").val('');
                            $("#nama_blok").val('');
                            $("#no_blok").val('');
                            $("#tanggal").val('');
                            $("#pas_foto").val('');
                    }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

});

</script>