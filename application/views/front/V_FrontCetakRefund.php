<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Retur</title>
</head>
<body>
    <div style="text-align: center;">
        <table border="0" width="40%" style="text-align:center; padding: 10px; border: 1px solid #f5f6fa; border-collapse: collapse; background: #f5f6fa;">
            <tr>
                <td style="text-align:center";><img src="<?php echo base_url('Assets/assets/images/logo.jpg') ?>" width="20%" colspan="3"></td>
            </tr>
            <tr>
                <td style="text-align: center;"><p style="color: #7971ea; font-family:Helvetica; font-weight: bold; font-size: 30pt; margin:15px;" colspan="3">Mira Branded Kids</p></td>
            </tr>
            <tr>
                <td><p style="color: #3d3d3d; font-family:Helvetica; font-size: 18pt; margin:10px; text-align: center; font-weight:bold;">REFUND</p></td>
            </tr>
            <tr>
                <td><p style="color: #3d3d3d; font-family:Helvetica; font-size: 16pt; margin:10px; text-align: center;">Retur Id :  <?php  foreach($getFaktur as $data) {echo $data->id_retur;} ?></p></td>
            </tr>
            <tr>
                <td><p style="color: #3d3d3d; font-family:Helvetica; font-size: 14pt; margin:10px; text-align: center;"> <?php echo date("D, d-M-Y"); ?></p></td>
            </tr>
            <?php foreach($getFaktur as $data) {?>
            <tr>
                <td>
                    <br><br>
                    <p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:1px; text-align: left;"><b>Detil Alamat Pengiriman</b></p>
                    <p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:1px; text-align: left;"><br><?php echo $data->nm_customer ?></p>
                </td>
            </tr>
             <tr>
                <td>
                    <p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:1px; text-align: left;"><?php echo $data->alamat_kirim ?></p>
                </td>
            </tr>
             <tr>
                <td>
                    <br>
                    <p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:1px; text-align: left;">Kode Pos <?php echo $data->kode_pos ?></p>
                </td>
            </tr>
             <tr>
                <td>
                    <p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:1px; text-align: left;">Email <?php echo $data->email_customer ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:1px; text-align: left;">No Handphone <?php echo $data->telp_customer ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:1px; text-align: left;">No Rekening <?php echo $data->no_rekening ?></p>
                </td>
            </tr>
            <tr>
                <td><p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:1px; text-align: center;">Bukti Refund</p></td>
            </tr>
            <tr>
                <td>
                    <img src="<?php echo base_url('upload/refund/'.$data->bukti_refund) ?>" width="150">
                </td>
            </tr>

            
            <tr>
                <td style="text-align:center;"><br>
                    <p style="color: #868686; font-family:Helvetica; font-size: 12pt; margin:10px; text-align: left;"><b>Detil Data Retur</b></p>
                    <table width="100%" border="1" style="border: 2px solid #3d3d3d; border-collapse: collapse; background: #f5f6fa;">
                        <tr style="border: 2px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
                            <td width="5%" style="text-align: center; color: #5f5f5f; margin: 20px; padding: 10px; font-family: helvetica; font-size:12pt; font-weight:bold;">No</td>
                            <td width="40%" style="text-align: center; color: #5f5f5f; margin: 20px; padding: 10px; font-family: helvetica; font-size:12pt; font-weight:bold;">Nama Product</td>
                            <td width="15%" style="text-align: center; color: #5f5f5f; margin: 20px; padding: 10px; font-family: helvetica; font-size:12pt; font-weight:bold;">Ukuran</td>
                            <td width="15%" style="text-align: center; color: #5f5f5f; margin: 20px; padding: 10px; font-family: helvetica; font-size:12pt; font-weight:bold;">Qty</td>
                            <td width="15%" style="text-align: center; color: #5f5f5f; margin: 20px; padding: 10px; font-family: helvetica; font-size:12pt; font-weight:bold;">Alasan</td>
                            <td width="25%" style="text-align: center; color: #5f5f5f; margin: 20px; padding: 10px; font-family: helvetica; font-size:12pt; font-weight:bold;">Sub Total</td>
                        </tr>
                        <?php $no = 1; foreach($retur as $item) { ?>
                        <tr style="border: 1px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
                            <td style="text-align: center; color: #5f5f5f; margin: 20px; padding: 10px; font-family: helvetica;"><?php echo $no++; ?></td>
                            <td style="text-align: center; color: #5f5f5f; margin: 20px; padding: 10px; font-family: helvetica;"><?php echo $item->nm_product ?></td>
                            <td style="text-align: center; color: #5f5f5f; margin: 20px; padding: 10px; font-family: helvetica;"><?php echo $item->nm_size ?></td>
                            <td style="text-align: center; color: #5f5f5f; margin: 20px; padding: 10px; font-family: helvetica;"><?php echo $item->qty_retur ?></td>
                            <td style="text-align: center; color: #5f5f5f; margin: 20px; padding: 10px; font-family: helvetica;"><?php echo $item->alasan ?></td>
                            <td style="text-align: center; color: #5f5f5f; margin: 20px; padding: 10px; font-family: helvetica;">Rp. <?php echo $item->subtotal_retur ?></td>
                        </tr>
                        <?php } ?>
                        <tr  style="border: 1px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
                            <td style="text-align: center; color: #5f5f5f; margin: 20px; padding: 10px; font-family: helvetica; font-weight:bold;" colspan="5">Grand Total</td>
                            <td style="text-align: center; color: #5f5f5f; margin: 20px; padding: 10px; font-family: helvetica; font-weight:bold;">Rp. <?php foreach($getFaktur as $data) {echo $data->grandtotal_retur;} ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>
            </tr>
             <tr>
                <td><br><p style="color: #868686; font-family:Helvetica; font-size: 12pt; margin:10px; text-align: center;">Info Toko : </p></td>
            </tr>
            <tr>
                <td><br>
                    <p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:10px; text-align: center;">
                        Vila Mutiara, Blok F4 No.3 Pondok Jagung Timur, Serpong, Tangerang Selatan<br>
                        0817 1430 41<br>
                        mirabrandedkids@gmail.com
                    </p>
                </td>
            </tr>
        </table>
    </div>
        
</body>
</html>