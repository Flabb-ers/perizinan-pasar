<?= $this->session->flashdata('pesan')?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Objek Retribusi</h6>
        </div>
        <div class="card-body">
            <!-- <a href="<?php echo site_url('Dinas/Op/create') ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
              Tambah Data
            </button></a> -->
        <hr>
        <br>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                             <td>No</td>
                             <td>NPWRD</td>
                             <td>Nama Wajib Pajak</td>
                             <td>Alamat</td>
                             <td>Nama Pasar</td>
                             <td>Nama Blok</td>
                             <td>No Blok</td>
                             <td>Jenis Dagangan</td>
                             <td>Tanggal Daftar /Perpanjang</td>
                             <td>Batas Berlaku</td>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php
                         $no=1;
                         foreach ($dataop as $key) {
                         ?>
                         <tr>
                         <td><?php echo $no ?></td>
                         <td><?= $key->npwrd ?></td>
                         <td><?= $key->nama ?></td>
                         <td><?= $key->alamat ?></td>
                         <td><?= $key->nama_pasar ?></td>
                         <td><?= $key->nama_blok ?></td>
                         <td><?= $key->no_blok ?></td>
                         <td><?= $key->jenis_dagangan ?></td>
                         <td><?= $key->tgl_daftar ?></td>
                         <td><?= $key->batas_berlaku ?></td>
                         </tr>
                         <?php
                         $no++;
                         }
                         ?>
                    </tbody>
                       
                </table>

            </div>
        </div>
    </div>
</div>
