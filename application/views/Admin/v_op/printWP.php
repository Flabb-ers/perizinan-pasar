<!DOCTYPE html>
<html lang="en"><head>
    <title></title>
    <!-- <link href="template/css/sb-admin-2.min.css" rel="stylesheet"> -->
</head><style type="text/css">
    body{
        font-family: times-new-roman; background-color: #fff}
        .rangkasurat {width: 100%; margin: 0px; auto;background-color: #fff;  padding: 3px; }
        table{ padding: 2px}
        .hr {border-bottom: 5px solid #000;}
        .tengah {text-align: center;line-height: 5px;}
        .tengah2 {text-align: center;}
        .hd {border-collapse: collapse; }

    }

</style><body>
    <div class="rangkasurat">

        <div class="tengah">
            <h4><b><u>LAPORAN DATA Objek Retribusi</u></b></h4>
            <p>&nbsp;</p> <p></p>             
         </div></div></br><div class="tengah2"><table class="hd" border="1px" padding="3px 8px" border-color="#000" width="100%" ><thead><tr>
                         
                              <th>Kode Wajib Retribusi</th>
                              <th>Nama Wajib Retribusi</th>
                        </tr></thead>
                       
                        <?php
                         $no=1;
                         foreach ($datawp as $key) {
                         ?>
                         <tbody><tr>
                         <td><?= $key->id_wajib_pajak ?></td>
                         <td><?= $key->nama ?></td>
                         </tr></tbody>
                         <?php
                         $no++;
                         }
                         ?>
                    
                </table></div>

</body></html>