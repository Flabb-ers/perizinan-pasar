<?= $this->session->flashdata('pesan')?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Wajib Retribusi <?= $this->session->userdata('nama_pasar') ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                             <th>No</th>
                             <th>Kode WP</th>
                             <th>NPWRD</th>
                             <th>Nama</th>
                             <th>Nama Pasar</th>
                             <td>Alamat</td>
                             <td>NIK</td>
                             <td>No. Telp</td>
                             <td>Email</td>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php
                         $no=1;
                         foreach ($datawp as $key) {
                         ?>
                         <tr>
                         <td><?php echo $no ?></td>
                         <td><?= $key->kode_wp ?></td>
                         <td><?= $key->npwrd ?></td>
                         <td><?= $key->nama ?></td>
                         <td><?= $key->nama_pasar ?></td>
                         <td><?= $key->alamat ?></td>
                         <td><?= $key->nik ?></td>
                         <td><?= $key->no_telp ?></td>
                         <td><?= $key->email ?></td>
                        
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
