<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <link href=" <?php echo base_url('template/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<style type="text/css">
    body{
        font-family: times-new-roman; background-color: #ccc}
        .rangkasurat {width: 1055px; margin: 0px; auto;background-color: #fff; height: 2000px; padding: 12px; }
        table{ padding: 2px}
        .hr {border-bottom: 5px solid #000;}
        .tengah {text-align: center;line-height: 5px;}
    }
</style>

<body>
    <div class="rangkasurat">
    <table class="hr" width="100%">
        <thead><tr>
            <td></td>
                <td width="10%"><img src="<?= base_url('template/img/logo.jpg'); ?>" width="80px"> </td>
                <td width="90%" align="center">
                    <p>
                        
                        PEMERINTAH  KABUPATEN  PURWOREJO
                    
                    <p><b>DINAS KOPERASI  USAHA KECIL MENENGAH DAN PERDAGANGAN</b></p>
                    <p>Jalan Jendral Sudirman Nomor  :  22  Telpon ( 0275 ) 321018, 321028</p>
                    <p>PURWOREJO - 54114</p>
                    <p>Email : dinkukmp@purworejokab.go.id  Website : www.dinkukmp.purworejokab.go.id</p>
                </td>
            </tr></thead></table>

    </br>
        <div class="tengah">
            <h5><b><u>Laporan Data Pasar</u></b></h5>
        </div></br>
            <table class="table table-bordered" border-color="#000" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>No</td>
                           <td>Nama</td>
                           <td>Jenis</td>
                           <td>Nama Blok</td>
                           <td>No Blok</td>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php
                         $no=1;
                         foreach ($dataop as $key) {
                         ?>
                         <tr>
                         <td><?php echo $no ?></td>
                           <td><?= $key->nama ?></td>
                           <td><?= $key->jenis ?></td>
                           <td><?= $key->nama_blok ?></td>
                           <td><?= $key->no_blok ?></td>
                         </tr>
                         <?php
                         $no++;
                         }
                         ?>
                    </tbody>
                </table>

                <table width="100%"><thead><tr>
         <td width="50%" align="center">
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <br><br><br>
                 
            <p>&nbsp;</p>
            </td>
            <td width="50%" align="center">
    
                <p>Purworejo, <?php echo date('d M Y') ?></p>
                <br><br><br>
                 
            <p><?= $this->session->userdata('nama_pegawai') ?></p>
            </td> 
           
        </tr></thead></table>
        <script type="text/javascript">
            window.print();
        </script>
</body>
</html>