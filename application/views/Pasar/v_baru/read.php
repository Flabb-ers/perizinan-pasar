<?= $this->session->flashdata('pesan') ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
</head>

<body>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Permohonan Baru</h6>
            </div>
            <div class="card-body">
                <!--                 <a href="<?php echo site_url('Pasar/Baru/create/') ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                  Tambah Data
                </button></a> -->


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kios</td>
                                <td>Nama</td>
                                <td>NPWRD</td>
                                <td>Kios</td>
                                <td>Jenis Dagangan</td>
                                <td>Tanggal Pengajuan</td>
                                <td>Status Verifikasi Kepala Pasar</td>
                                <td>SP Pemohon</td>
                                <td>Surat Pernyataan</td>
                                <td>Ktp</td>
                                <td>Pas Foto</td>
                                <td>Status Permohonan</td>
                                <td>Keterangan</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            foreach ($databaru as $key) {
                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?= $key->nama_pasar ?></td>
                                    <td><?= $key->nama ?></td>
                                    <td><?= $key->npwrd ?></td>
                                    <td><?= $key->jenis ?> <?= $key->nama_blok ?> <?= $key->no_blok ?></td>
                                    <td><?= $key->jenis_dagangan ?></td>
                                    <td><?= date('d-m-Y', strtotime($key->tanggal)) ?></td>
                                    <!-- <td><img src="<?= base_url('./template/img/syarat/' . $key->sp_kepala); ?>" class="img-rounded" width="100px"></td> -->
                                    <td>
                                        <?= ($key->sp_kepala == 1) ? 'Disetujui' : 'Belum disetujui' ?>
                                    </td>
                                    <td><img src="<?= base_url('./template/img/syarat/' . $key->sp_pemilik); ?>" class="img-rounded" width="100px"></td>
                                    <td><img src="<?= base_url('./template/img/syarat/' . $key->surat_pernyataan); ?>" class="img-rounded" width="100px"></td>
                                    <td><img src="<?= base_url('./template/img/syarat/' . $key->ktp_pemilik); ?>" class="img-rounded" width="100px"></td>
                                    <td><img src="<?= base_url('./template/img/syarat/' . $key->pas_foto); ?>" class="img-rounded" width="100px"></td>
                                    <td><?= $key->status ?></td>
                                    <td><?= $key->keterangan ?></td>
                                    <td>

                                        <a href="<?php echo site_url('Pasar/Baru/edit/' . $key->id_pengajuan) ?>" class="btn btn-success">Upload</i></a>
                                        <a href="<?php echo site_url('Pasar/Baru/hapus/' . $key->id_pengajuan) ?>" onclick="javascript: return confirm('Yakin Mau dihapus <?= $key->jenis ?> <?= $key->nama_blok ?> <?= $key->no_blok ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></a>

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