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
                            <?php echo form_open_multipart('Admin/Baru/update/' . $databaru->id_pengajuan) ?>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col-md-6 mb-6 mb-sm-0">
                                        <label>Nama Pasar</label>
                                        <select class="form-control" name="id_kios" id="id_kios" style="width: 100%;" readonly>
                                            <option value="">---Pilih Kios---</option>
                                            <?php
                                            foreach ($datakios as $key) {
                                            ?>

                                                <option value="<?= $key->id_kios ?>" <?php if ($key->id_kios == $databaru->id_kios) {
                                                                                            echo "selected";
                                                                                        } ?>><?php echo $key->nama_pasar ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Kios</label>
                                        <select class="form-control" name="id_kios" id="id_kios" style="width: 100%;" readonly>
                                            <option value="">---Pilih Kios---</option>
                                            <?php
                                            foreach ($datakios as $key) {
                                            ?>

                                                <option value="<?= $key->id_kios ?>" <?php if ($key->id_kios == $databaru->id_kios) {
                                                                                            echo "selected";
                                                                                        } ?>><?php echo $key->jenis . ' ' . $key->nama_blok . ' No ' . $key->no_blok ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 mb-6 mb-sm-0">
                                        <label>Nama Wajib Pajak</label>
                                        <input type="text" value="<?php echo $databaru->nama ?>" name="nama" pattern="[A-Za-z ]+" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label>NPWRD</label>
                                        <input type="text" value="<?php echo $databaru->npwrd ?>" name="npwrd" pattern="[A-Za-z ]+" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-6 mb-6 mb-sm-0">
                                        <label>NIK</label>
                                        <input type="text" name="nik" pattern="[0-9]{16}" value="<?php echo $databaru->nik ?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" value="<?php echo $databaru->alamat ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 mb-6 mb-sm-0">
                                        <label>No Telp</label>
                                        <input type="text" name="no_telp" value="<?php echo $databaru->no_telp ?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?php echo $databaru->email ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 mb-6 mb-sm-0">
                                        <label>Jenis Dagangan</label>
                                        <input type="text" name="id_jenis" value="<?php echo $databaru->jenis_dagangan ?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tanggal Pengajuan</label>
                                        <input type="text" name="tanggal" value="<?php echo $databaru->tanggal ?>" class="form-control" readonly>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <!-- <div class="col-md-6 mb-6 mb-sm-0">
                 <label>SP Kepala</label><br>
                 <img src="<?= base_url('./template/img/syarat/' . $databaru->sp_kepala); ?>" class="img-rounded" width="100px">
                 <input type="file" name="sp_kepala" class="form-control" >
                 <input type="hidden" name="sp_kepala_lama" value="<?php echo $databaru->sp_kepala ?>" class="form-control" >   
            </div> -->
                                    <div class="col-md-6 mb-6 mb-sm-0">
                                        <label>Pas Foto</label><br>
                                        <img src="<?= base_url('./template/img/syarat/' . $databaru->pas_foto); ?>" class="img-rounded" width="100px">
                                        <input type="file" name="pas_foto" class="form-control">
                                        <input type="hidden" name="pas_foto_lama" value="<?php echo $databaru->pas_foto ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>SP Pemilik</label><br>
                                        <img src="<?= base_url('./template/img/syarat/' . $databaru->sp_pemilik); ?>" class="img-rounded" width="100px">
                                        <input type="file" name="sp_pemilik" class="form-control">
                                        <input type="hidden" name="surat_pemilik_lama" value="<?php echo $databaru->sp_pemilik ?>" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 mb-6 mb-sm-0">
                                        <label>Surat Pernyataan</label><br>
                                        <img src="<?= base_url('./template/img/syarat/' . $databaru->surat_pernyataan); ?>" class="img-rounded" width="100px">
                                        <input type="file" name="surat_pernyataan" class="form-control">
                                        <input type="hidden" name="surat_pernyataan_lama" value="<?php echo $databaru->surat_pernyataan ?>" class="form-control">

                                    </div>
                                    <div class="col-md-6">
                                        <label>KTP Pemilik</label><br>
                                        <img src="<?= base_url('./template/img/syarat/' . $databaru->ktp_pemilik); ?>" class="img-rounded" width="100px">
                                        <input type="file" name="ktp_pemilik" class="form-control">
                                        <input type="hidden" name="ktp_pemilik_lama" value="<?php echo $databaru->ktp_pemilik ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 mb-6 mb-sm-0">
                                        <label>Berita Acara Penunjukan</label><br>
                                        <img src="<?= base_url('./template/img/syarat/' . $databaru->ba_penunjukan); ?>" class="img-rounded" width="100px">
                                        <input type="file" name="ba_penunjukan" class="form-control">
                                        <input type="hidden" name="ba_penunjukan" value="<?php echo $databaru->ba_penunjukan ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-6 mb-sm-0">
                                        <label>Status Verifikasi Kepala Pasar</label>
                                        <div class="form-control" style="min-height: 45px; display: flex; align-items: center;margin-top:20px">
                                            <div style="display: flex; align-items: center; gap: 8px;">
                                                <input type="checkbox" name="sp_kepala" value="1"
                                                    style="width: 18px; height: 18px;"
                                                    <?php echo ($databaru->sp_kepala ? 'checked' : ''); ?>>
                                                <label for="sp_kepala" style="margin-bottom: 0;">
                                                    Setujui
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class=" text-danger">Keterangan:<br>1. Semua persyaratan wajib diisi<br>2. Format yang digunakan adalah jpeg/jpg/png</label>
                                    </div>
                                </div>
                                <a href="<?php echo site_url('Pasar/Baru') ?>"><button name="simpan" type="submit" class="btn btn-primary">Submit</button></a>
                                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                                <a href="<?php echo site_url('Admin/Baru') ?>"><button type="button" name="button" class="btn btn-warning">Cancel</button>
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
</div>
<script src="<?php echo base_url('template/js/jquery-3.2.1.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        const status_npwrd = document.getElementById("status_npwrd");
        const npwrd = document.getElementById("npwrd");

        status_npwrd.addEventListener("change", function() {
            if (status_npwrd.value === "Sudah") {
                npwrd.style.display = "block";
            } else {
                npwrd.style.display = "none";
            }
        });


    });
</script>