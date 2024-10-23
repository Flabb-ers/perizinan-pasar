<?= $this->session->flashdata('pesan')?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Objek Pajak</h6>
        </div>
        <div class="card-body">
 <!--                <form class="form-inline mr-auto w-100 navbar-search">
                    <label>No Kios/Los</label>
                    <div class="input-group input-group-md col-sm-4 mb-3 mb-sm-2">
                        <input type="text" class="form-control form-control-user small" name="nama_pasar" autocomplete="off">
                    </div>
                </form>
                <form class="form-inline mr-auto w-100 navbar-search">
                    <label>Nama Pasar</label>
                    <div class="input-group input-group-md col-sm-4">
                        <input type="text" class="form-control form-control-user small" name="no_kioslos" autocomplete="off">
                            
                    </div>

                     <div class="input-group-append float-right">
                        <button class="btn btn-info" type="submit">
                            <i class="fas fa-search fa-sm"> Cari </i>
                        </button>
                    </div> 
                    <div class="input-group-append float-right">
                        <a href="<?= site_url('Admin/Kios') ?>"><button class="btn btn-warning" type="submit">
                             Reset 
                        </button></a>
                    </div>   
                </form> -->

        <br>
        <br>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                             <th>No</th>
                             <th>Nama Pasar</th>
                             <th>Tipe Pasar</th>
                             <th>Jenis</th>
                             <th>Letak</th>
                             <th>Tarif</th>
                             <th>Nama Blok</th>
                             <th>No Blok</th>
                             <th>Panjang</th>
                             <th>Lebar</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php
                         $no=1;
                         foreach ($datakios as $key) {
                         ?>
                         <tr>
                         <td><?php echo $no ?></td>
                         <td><?= $key->nama_pasar ?></td>
                         <td><?= $key->tipe_pasar ?></td>
                         <td><?= $key->jenis ?></td>
                         <td><?= $key->letak_kioslos ?></td>
                         <td><?= $key->tarif ?></td>
                         <td><?= $key->nama_blok ?></td>
                         <td><?= $key->no_blok ?></td>
                         <td><?= $key->panjang ?></td>
                         <td><?= $key->lebar ?></td>

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
