<!DOCTYPE html>
<html lang="en"><style type="text/css">
    body{
        font-family: times-new-roman; font-size: 13pt; background-color: #fff;
            margin-right: 50px; margin-top: 40px; margin-left: 60px;
            }
        table{ padding: 1px}
        p{line-height: 5px;}
        .uper {text-transform: uppercase;}
        
    
</style><body>  </body>
    <div><table  width="100%">
        <thead><td width="100%" align="center"><p>SURAT PERNYATAAN</p></td></thead></table><br>
        
            <p>Dengan hormat,</p>
            <p>Yang bertanda tangan di bawah ini :</p>
            <table><thead><tr>
                <td>Nama</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                <td> <?php echo $databaru->nama ?> </td>
            </tr><tr>
                <td>Alamat</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                <td> <?php echo $databaru->alamat ?> </td>
            </tr><tr>
                <td>Jenis Dagangan</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                <td> <?php echo $databaru->jenis_dagangan ?> </td>
            </tr><tr>
                <td>NIK</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                <td> <?php echo $databaru->nik ?> </td>
            </tr><tr>
                <td>No NPWRD</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                <td> <?php echo $databaru->npwrd ?> </td>
            </tr><br>
            </thead></table><br>
        <table width="100%" align="justify"><thead>
       <tr width="100%" align="justify">Menyatakan bahwa saya benar - benar menggunkaan tempat <?php echo $databaru->jenis ?> yang ada di <?php echo $databaru->nama_pasar ?> Blok <?php echo $databaru->nama_blok ?> Nomor <?php echo $databaru->no_blok ?> Ukuran <?php echo $databaru->panjang ?> M x <?php echo $databaru->lebar ?> M untuk berdagang <?php echo $databaru->jenis_dagangan ?>.<br><br>
            Kami sanggup memenuhi ketentuan yang berlaku :</tr> 
       </thead></table>
            <table><thead>
            <tr>
                <td>1.</td>
                <td>Tidak menyewakan atau menjual tempat yang di gunakan kepada pihak lain.</td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Membayar Retribusi Pasar dan Kebersihan sesuai tarif ketentuan yang berlaku</td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Memperpanjang ijin setiap habis masa berlakunya</td>
            </tr>
        </thead></table><br>
        <table width="100%" align="justify"><thead>
       <tr width="100%" align="justify">Apabila kami melanggar ketentuan tersebut di atas kami bersedia di kenakan sanksi sesuai yang berlaku.</tr><br><br>
       <tr width="100%" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demikian surat pernyataan ini kami buat dengan sebenar - benarnya, untuk dapat di pergunakan sebagaimana mestinya.</tr> 
       </thead></table><br>


            <table width="100%"><thead><tr>
                <td width="50%" align="center">
                    <p></p>
                    <p></p>
                    <br><br><br>
                     
                <p></p>
                <p></p>
                </td> 
                <td width="50%" align="center">
                    <p>Purworejo, <?php echo date('d-m-Y') ?></p>
                    <p>Yang membuat pernyataan</p>
                    <br><i>meterai Rp 10.000,-</i><br><br><br>
                     
                <p><?php echo $databaru->nama ?></p>
                </td>
            </tr></thead></table>



</body></html>

<script>
    window.print()
</script>
