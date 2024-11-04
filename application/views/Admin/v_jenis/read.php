<?= $this->session->flashdata('pesan') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jenis Dagangan</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-primary btn-sm" href="<?php echo site_url('Admin/Jenis/create') ?>">
                <i class="fa fa-plus"></i>
                Tambah Data
            </a>
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#importExcel2" onclick="return confirm('Siapkan data excel dengan header: \nJenis Dagangan\nDownload Template untuk penyesuaian format yang akan diimport  ')">
                IMPORT
            </button>
            <br>
            <br>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Dagangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($dataselasar as $key) {
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?= $key->jenis_dagangan ?></td>

                                <td>
                                    <a href="<?php echo site_url('Admin/Jenis/edit/' . $key->id_jenis) ?>" class="btn btn-success"><i class="fa fa-edit">Edit</i></a>
                                    <a href="<?php echo site_url('Admin/Jenis/hapus/' . $key->id_jenis) ?>" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $key->jenis_dagangan ?>')" class="btn btn-danger"><i class="fa fa-trash">Hapus</i></a>
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

<div class="modal fade" id="importExcel2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="<?php echo site_url('Admin/Jenis/import'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                </div>
                <div class="modal-body">
                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file_excel" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-info" href="<?php echo site_url('Admin/Jenis/download_template'); ?>" target="_blank">Download Template</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>