<?= $this->session->flashdata('pesan')?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pasar</h6>
        </div>
        <div class="card-body">
                <a href="<?php echo site_url('Admin/Pasar/create') ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                  Tambah Data
                </button></a>
                <div class="float-sm-right">
                <a href="<?= base_url('Admin/Pasar/print/'); ?>" target="_blank">
                    <button type="button" name="button" title="untuk menambah data" class="btn btn-success btn-sm "><i class="fa fa-print"></i> EXPORT</button>
                </a>
            </div>
            <br><br>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                             <th>No</th>
                             <th>Nama Pasar</th>
                             <th>Tipe Pasar</th>
                             <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php
                         $no=1;
                         foreach ($datapasar as $key) {
                         ?>
                         <tr>
                         <td><?php echo $no ?></td>
                         <td><?= $key->nama_pasar ?></td>
                         <td><?= $key->tipe_pasar ?></td>
                         <td>
                            <a href="<?php echo site_url('Admin/Pasar/edit/'.$key->id_pasar)?>" class="btn btn-success"><i class="fa fa-edit">Edit</i></a>
                            <a href="<?php echo site_url('Admin/Pasar/hapus/'.$key->id_pasar)?>" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $key->nama_pasar;?>')" class="btn btn-danger"><i class="fa fa-trash">Hapus</i></a>
                         </td>
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
