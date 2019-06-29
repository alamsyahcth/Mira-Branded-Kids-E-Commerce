<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Faktur</title>
</head>
<body>
    <div style="text-align: center;">
        <table border="0" width="50%" style="text-align:center; padding: 20px; border: 1px solid #f5f6fa; border-collapse: collapse; background: #f5f6fa;">

            <?php foreach($label as $r) {?>
            <tr>
                <td><p style="color: #3d3d3d; font-family:Helvetica; font-size: 14pt; margin:1px; text-align: left;">Nama Pemesan :  <?php echo $r->nm_customer ?></p></td><br>
            </tr>
            <tr>
                <td>
                    <p style="color: #3d3d3d; font-family:Helvetica; font-size: 12pt; margin:1px; text-align: left;">Alamat : </p>
                    <p style="color: #3d3d3d; font-family:Helvetica; font-size: 12pt; margin:1px; text-align: left;"><?php echo $r->alamat_customer ?> Kode Pos <?php echo $r->kode_pos ?> </p>
                </td>
            </tr>

            <tr>
                <td><p style="color: #3d3d3d; font-family:Helvetica; font-size: 14pt; margin:1px; text-align: left;">Telepon :  <?php echo $r->telp_customer ?></p></td>
            </tr>
             <?php } ?>
            <tr><td>-------------------------------------------------------------------------------------------------------------------------------</td></tr>
            <tr>
                <td><p style="color: #3d3d3d; font-family:Helvetica; font-size: 14pt; margin:1px; text-align: left;">Nama Pengirim :  Mira Branded Kids</p></td><br>
            </tr>
            <tr>
                <td>
                    <p style="color: #3d3d3d; font-family:Helvetica; font-size: 12pt; margin:1px; text-align: left;">Alamat : </p>
                    <p style="color: #3d3d3d; font-family:Helvetica; font-size: 12pt; margin:1px; text-align: left;">Vila Mutiara, Blok F4 No.3 Pondok Jagung Timur, Serpong, Tangerang Selatan</p>
                </td><br>
            </tr>

            <tr>
                <td><p style="color: #3d3d3d; font-family:Helvetica; font-size: 14pt; margin:1px; text-align: left;">Telepon :  0817 1430 41</p></td><br>
            </tr>
        </table>
    </div>
        
</body>
</html>