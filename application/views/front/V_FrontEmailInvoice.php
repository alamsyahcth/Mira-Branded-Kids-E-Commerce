 <table border="0" width="70%" style="text-align:center; padding: 10px; border: 1px solid #f5f6fa; border-collapse: collapse; background: #f5f6fa;">
    <tr>
        <td style="text-align: center;"><p style="color: #7971ea; font-family:Helvetica; font-weight: bold; font-size: 30pt; margin:15px;">Mira Branded Kids</p></td>
    </tr>
    <tr>
        <td><p style="color: #3d3d3d; font-family:Helvetica; font-size: 18pt; margin:10px; text-align: center;">Order Id : <?php foreach($customer as $data) {echo $data->id_order;} ?></p></td>
    </tr>
    <tr>
        <td><br>
            <p style="color: #868686; font-family:Helvetica; font-size: 14pt; margin:10px; text-align: center;">Terima Kasih atas pemesanan anda !</p>
            <p style="color: #868686; font-family:Helvetica; font-size: 12pt; margin:10px; text-align: center;">Hai <?php foreach($customer as $data) {echo $data->nm_customer;} ?>, pesanan kamu akan dikirim setelah kamu melakukan konfirmasi pembayaran !</p>
            <p style="color: #868686; font-family:Helvetica; font-size: 12pt; margin:10px; text-align: center;">Silahkan konfirmasi pembayaran disini</p>
            <p style="font-family:Helvetica; margin:10px; text-align: center;"><a href="<?php echo base_url('index.php/Konfirmasi') ?>" style="background: #7971ea; border:none; padding: 5px 32px; text-align: center; text-decoration: none; color: #f5f6fa; font-size: 10pt; border-radius: 5px;">Konfirmasi Pembayaran</a></p>
            <p style="font-family:Helvetica; margin:10px; text-align: center;"><a href="<?php echo base_url('index.php/OrderDetail/cetakInvoice/'.$data->id_order) ?>" style="background: #4b4b4b; border:none; padding: 5px 32px; text-align: center; text-decoration: none; color: #f5f6fa; font-size: 10pt; border-radius: 5px;">Cetak Invoice</a></p>
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
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Sub Total</td>
                </tr>
                <?php $no = 1; foreach($order as $data) { ?>
                <tr style="border: 1px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;"><?php echo $no++; ?></td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;"><?php echo $data->nm_product ?></td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;"><?php echo $data->nm_size ?></td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;"><?php echo $data->qty ?></td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Rp. <?php echo $data->sub_total ?></td>
                </tr>
                <?php } ?>
               
                <tr  style="border: 1px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;" colspan="4">Ongkos Kirim</td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Rp. <?php  foreach($customer as $data) {echo $data->ongkir;} ?></td>
                </tr>
                <tr  style="border: 1px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;" colspan="4">Grand Total</td>
                    <td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Rp. <?php foreach($gtotal as $data) {echo $data->grand_total;} ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td><br><p style="color: #868686; font-family:Helvetica; font-size: 12pt; margin:10px; text-align: center;">Pembayaran dapat dilakukan dengan cara transfer bank pada bank berikut ini</p></td>
    </tr>
    <?php foreach($bank as $data) { ?>
    <tr>
        <td><p style="color: #868686; font-family:Helvetica; font-size: 12pt; margin:10px; text-align: center;"><?php echo $data->nm_bank ?> : No Rekening <?php echo $data->no_rektoko ?> atas nama <?php echo $data->atas_nama ?></p></td>
    </tr>
    <?php } ?>
    <tr><td><br></td></tr>
</table>