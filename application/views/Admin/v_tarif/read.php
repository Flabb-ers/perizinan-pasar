<?= $this->session->flashdata('pesan')?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tarif</h6>
        </div>
        <div class="card-body">
            <a href="<?php echo site_url('Admin/Tarif/create') ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
              Tambah Data
            </button></a>
            <div class="float-sm-right">
            <a href="<?= base_url('Admin/Tarif/print/'); ?>" target="_blank">
                <button type="button" name="button" title="untuk menambah data" class="btn btn-success btn-sm "><i class="fa fa-print"></i> EXPORT</button>
            </a>
            </div><br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                             <td>No</td>
                             <td>Tipe Pasar</td>
							 <td>Jenis</td>
							 <td>Letak Kios/Los</td>
							 <td>Tarif</td>
							 <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php
                         $no=1;
                         //$read yang diambil dari control function index
                         foreach ($datatarif as $key) {
                         ?>
                         <tr>
                         <td><?php echo $no ?></td>
                         <td><?= $key->tipe_pasar ?></td>
                         <td><?= $key->jenis?></td>
                         <td><?= $key->letak_kioslos ?></td>
                         <td><?= $key->tarif ?></td>
                         <td>
                            <a href="<?php echo site_url('Admin/Tarif/edit/'.$key->id_tarif)?>" class="btn btn-success"><i class="fa fa-edit">Edit</i></a>
                            <a href="<?php echo site_url('Admin/Tarif/hapus/'.$key->id_tarif)?>" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $key->jenis;?> <?php echo $key->letak_kioslos; ?>')" class="btn btn-danger"><i class="fa fa-trash">Hapus</i></a>
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
