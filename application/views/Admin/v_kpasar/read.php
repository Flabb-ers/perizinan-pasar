<?= $this->session->flashdata('pesan')?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kepala Pasar</h6>
        </div>
        <div class="card-body">
        <a href="<?php echo site_url('Admin/Kpasar/create') ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                  Tambah Data
                </button></a><br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                             <td>No</td>
                             <td>Nama Pasar</td>
                             <td>Nama</td>
                             <td>NIP</td>
                             <td>Status</td>
                             <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php
                         $no=1;
                         foreach ($datakepala as $key) {
                         ?>
                         <tr>
                         <td><?php echo $no ?></td>
                         <td><?= $key->nama_pasar ?></td>
                         <td><?= $key->nama_Kpasar ?></td>
                         <td><?= $key->nip_Kpasar ?></td>
                         <td><?= $key->status ?></td>
                         <td>
                            <?php
                            if ($key->status =='Nonaktif') {
                            ?>
                                <a href="<?php echo site_url('Admin/Kpasar/status/' . $key->id_Kpasar) . '/' . 'Aktif'; ?>" title="Ubah status ke Aktif"><button class="btn btn-outline-danger">Aktif</button></a>
                            <?php
                            } else if ($key->status =='Aktif') {
                            ?>
                                <a href="<?php echo site_url('Admin/Kpasar/status/' . $key->id_Kpasar) . '/' . 'Nonaktif'; ?>" title="Ubah status ke Nonaktif"><button class="btn btn-outline-success">Nonaktif</button></a>
                            <?php
                            }
                            ?>
                            <a href="<?php echo site_url('Admin/Kpasar/edit/'.$key->id_Kpasar)?>" class="btn btn-success"><i class="fa fa-edit">Edit</i></a>
                            <a href="<?php echo site_url('Admin/Kpasar/hapus/'.$key->id_Kpasar)?>" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $key->nama_Kpasar?>')" class="btn btn-danger"><i class="fa fa-trash">Hapus</i></a>
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
