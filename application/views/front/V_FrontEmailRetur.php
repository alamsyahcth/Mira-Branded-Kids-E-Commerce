 <table border="0" width="70%" style="text-align:center; padding: 10px; border: 1px solid #f5f6fa; border-collapse: collapse; background: #f5f6fa;">
    <tr>
        <td style="text-align: center;"><p style="color: #7971ea; font-family:Helvetica; font-weight: bold; font-size: 30pt; margin:15px;">Mira Branded Kids</p></td>
    </tr>
    <tr>
        <td><p style="color: #3d3d3d; font-family:Helvetica; font-size: 18pt; margin:10px; text-align: center;">Retur Id : <?php foreach($getFaktur as $data) {echo $data->id_retur;} ?></p></td>
    </tr>
    <tr>
        <td><br>
            <p style="color: #868686; font-family:Helvetica; font-size: 14pt; margin:10px; text-align: center;">Terima Kasih data retur berhasil disimpan !</p>
            <p style="color: #868686; font-family:Helvetica; font-size: 12pt; margin:10px; text-align: center;">Hai <?php foreach($getFaktur as $data) {echo $data->nm_customer;} ?>, uang kamu akan di kembalikan setelah barang yang diretur sampai !</p>
            <p style="font-family:Helvetica; margin:10px; text-align: center;"><a href="<?php echo base_url('index.php/Retur/cetakRetur/'.$data->id_retur) ?>" style="background: #4b4b4b; border:none; padding: 5px 32px; text-align: center; text-decoration: none; color: #f5f6fa; font-size: 10pt; border-radius: 5px;">Cetak Retur</a></p>
        </td>
    </tr>
    <tr>
        <td><br><br>
            <table width="100%" style="border: 2px solid #3d3d3d; padding: 10px; border-collapse: collapse; background: #f5f6fa;">
                <tr style="border: 2px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;">No</td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Nama Product</td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Ukuran</td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Qty</td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Alasan</td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Sub Total</td>
                </tr>
                <?php $no = 1; foreach($retur as $data) { ?>
                <tr style="border: 1px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;"><?php echo $no++; ?></td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;"><?php echo $data->nm_product ?></td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;"><?php echo $data->nm_size ?></td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;"><?php echo $data->qty_retur ?></td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;"><?php echo $data->alasan ?></td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Rp. <?php echo $data->subtotal_retur ?></td>
                </tr>
                <?php } ?>
                <tr  style="border: 1px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;" colspan="5">Grand Total</td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Rp. <?php foreach($getFaktur as $data) {echo $data->grandtotal_retur;} ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td><br><p style="color: #868686; font-family:Helvetica; font-size: 12pt; margin:10px; text-align: center;">Barang dapat dikirim ke alamat : </p></td>
    </tr>
    <tr>
        <td><br>
            <p style="color: #868686; font-family:Helvetica; font-size: 12pt; margin:10px; text-align: center;">
                Vila Mutiara, Blok F4 No.3 Pondok Jagung Timur, Serpong, Tangerang Selatan<br>
                0817 1430 41<br>
                mirabrandedkids@gmail.com
            </p>
        </td>
    </tr>
    <tr><td><br></td></tr>
</table>