<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Invoice</title>
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
                <td><p style="color: #3d3d3d; font-family:Helvetica; font-size: 18pt; margin:10px; text-align: center;">INVOICE</p></td>
            </tr>
            <tr>
                <td><p style="color: #3d3d3d; font-family:Helvetica; font-size: 16pt; margin:10px; text-align: center;">Order Id :  <?php  foreach($customer as $data) {echo $data->id_order;} ?></p></td>
            </tr>
            <tr>
                <td><p style="color: #3d3d3d; font-family:Helvetica; font-size: 16pt; margin:10px; text-align: center;"> <?php echo date("D, d-M-Y"); ?></p></td>
            </tr>
            <?php foreach($customer as $data) ?>
            <tr>
                <td>
                    <p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:10px; text-align: left;"><b>Nama : </b><br><?php echo $data->nm_customer ?></p>
                </td>
            </tr>
             <tr>
                <td>
                    <p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:10px; text-align: left;"><b>Alamat : </b><br><?php echo $data->alamat_customer ?></p>
                </td>
            </tr>
             <tr>
                <td>
                    <br>
                    <p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:10px; text-align: left;"><b>Kode Pos : </b><br><?php echo $data->kode_pos ?></p>
                </td>
            </tr>
             <tr>
                <td>
                    <p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:10px; text-align: left;"><b>Email : </b><br><?php echo $data->email_customer ?></p>
                </td>
            </tr>
             <tr>
                <td>
                    <p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:10px; text-align: left;"><b>HP : </b><br><?php echo $data->telp_customer ?></p>
                </td>
            </tr>

            
            <tr>
                <td><br><br>
                    <table width="100%" border="1" style="border: 2px solid #3d3d3d; padding: 10px; border-collapse: collapse; background: #f5f6fa;">
                        <tr style="border: 2px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
                            <td width="5%" style="text-align: center; color: #5f5f5f; font-family: helvetica; font-size:12pt; font-weight:bold;">No</td>
                            <td width="40%" style="text-align: center; color: #5f5f5f; font-family: helvetica; font-size:12pt; font-weight:bold;">Nama Product</td>
                            <td width="15%" style="text-align: center; color: #5f5f5f; font-family: helvetica; font-size:12pt; font-weight:bold;">Ukuran</td>
                            <td width="15%" style="text-align: center; color: #5f5f5f; font-family: helvetica; font-size:12pt; font-weight:bold;">Qty</td>
                            <td width="25%" style="text-align: center; color: #5f5f5f; font-family: helvetica; font-size:12pt; font-weight:bold;">Sub Total</td>
                        </tr>
                        <?php $no = 1; foreach($order as $item) { ?>
                        <tr style="border: 1px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
                            <td style="text-align: center; color: #5f5f5f; font-family: helvetica;"><?php echo $no++; ?></td>
                            <td style="text-align: center; color: #5f5f5f; font-family: helvetica;"><?php echo $item->nm_product ?></td>
                            <td style="text-align: center; color: #5f5f5f; font-family: helvetica;"><?php echo $item->nm_size ?></td>
                            <td style="text-align: center; color: #5f5f5f; font-family: helvetica;"><?php echo $item->qty ?></td>
                            <td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Rp. <?php echo $item->sub_total ?></td>
                        </tr>
                        <?php } ?>
                        <tr  style="border: 1px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
                            <td style="text-align: center; color: #5f5f5f; font-family: helvetica; font-weight:bold;" colspan="4">Ongkos Kirim</td>
                            <td style="text-align: center; color: #5f5f5f; font-family: helvetica; font-weight:bold;">Rp. <?php  foreach($customer as $data) {echo $data->ongkir;} ?></td>
                        </tr>
                        <tr  style="border: 1px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
                            <td style="text-align: center; color: #5f5f5f; font-family: helvetica; font-weight:bold;" colspan="4">Grand Total</td>
                            <td style="text-align: center; color: #5f5f5f; font-family: helvetica; font-weight:bold;">Rp. <?php foreach($gtotal as $data) {echo $data->grand_total;} ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td><br><p style="color: #868686; font-family:Helvetica; font-size: 10pt; margin:10px; text-align: center;">Pembayaran dapat dilakukan dengan cara transfer bank:</p></td>
            </tr>
            <?php foreach($bank as $data) { ?>
            <tr>
                <td><p style="color: #868686; font-family:Helvetica; font-weight:bold; font-size: 10pt; margin:10px; text-align: center;"><?php echo $data->nm_bank ?> : No Rekening <?php echo $data->no_rektoko ?> atas nama <?php echo $data->atas_nama ?></p></td>
            </tr>
            <?php } ?>
        </table>
    </div>
        
</body>
</html>