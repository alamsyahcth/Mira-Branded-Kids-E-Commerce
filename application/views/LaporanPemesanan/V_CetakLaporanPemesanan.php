<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Pemesanan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    
    <img src="<?php echo base_url('Assets/assets/images/toko/KopSurat.jpg') ?>" style="width:40%; text-align:center;"><br>

    <h2 style="text-align:center;">Laporan Data Pemesanan</h2>
    <h6 style="margin-bottom:2px; font-size:12pt">Periode Bulan :
        <?php 
            if ($bulan == '01') {
                echo 'JANUARI';
            } else if ($bulan == '02') {
                echo 'FEBRUARI';
            } else if ($bulan == '03') {
                echo 'MARET';
            } else if ($bulan == '04') {
                echo 'APRIL';
            } else if ($bulan == '05') {
                echo 'MEI';
            } else if ($bulan == '06') {
                echo 'JUNI';
            } else if ($bulan == '07') {
                echo 'JULI';
            } else if ($bulan == '08') {
                echo 'AGUSTUS';
            } else if ($bulan == '09') {
                echo 'SEPTEMBER';
            } else if ($bulan == '10') {
                echo 'OKTOBER';
            } else if ($bulan == '11') {
                echo 'NOVEMBER';
            } else if ($bulan == '12') {
                echo 'DESEMBER';
            }
        ?> <?php echo $tahun; ?>
    </h6>
    <p style="font-size:12pt;">Tanggal Cetak : <?php echo date("D, d M Y"); ?></p><br>
    <table style="border: 2px solid black; border-collapse: collapse; font-size:10pt;">
        <thead>
            <tr>
                <th style="text-align:center; border: 1px solid black;" rowspan="2">No</th>
                <th style="text-align:center; border: 1px solid black;" rowspan="2">ID Order</th>
                <th style="text-align:center; border: 1px solid black;" rowspan="2">Tanggal</th>
                <th style="text-align:center; border: 1px solid black;" rowspan="2">Nama Customer</th>
                <th style="text-align:center; border: 1px solid black;" rowspan="2">Status</th>
                <th style="text-align:center; border: 1px solid black;" colspan="4">Detail Order</th>
            </tr>
            <tr>
                <th style="text-align:center; border: 1px solid black;">ID Product</th>
                <th style="text-align:center; border: 1px solid black;">Nama Product</th>
                <th style="text-align:center; border: 1px solid black;">Ukuran</th>
                <th style="text-align:center; border: 1px solid black;">QTY</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                foreach ($orderMonth as $data) {
            ?>
            <tr>
                <td style="text-align:center; border: solid 1px black; width:2%"><?php echo $no++ ?></td>
                <td style="text-align:center; border: solid 1px black; width:10%"><?php echo $data->id_order ?></td>
                <td style="text-align:center; border: solid 1px black; width:10%"><?php echo $data->tanggal_order ?></td>
                <td style="text-align:center; border: solid 1px black; width:20%"><?php echo $data->nm_customer ?></td>
                <?php if($data->status == '1') { ?>
                <td style="text-align:center; border: solid 1px black; width:10%">Pemesanan</td>
                <?php } ?>

                <?php if($data->status == '2') { ?>
                <td style="text-align:center; border: solid 1px black; width:10%">Konfirmasi</td>
                <?php } ?>

                <?php if($data->status == '3') { ?>
                <td style="text-align:center; border: solid 1px black; width:10%">Pembayaran</td>
                <?php } ?>

                <?php if($data->status == '4') { ?>
                <td style="text-align:center; border: solid 1px black; width:10%">Pengiriman</td>
                <?php } ?>

                <?php if($data->status == '5') { ?>
                <td style="text-align:center; border: solid 1px black; width:10%">Selesai</td>
                <?php } ?>

                <?php if($data->status == '6') { ?>
                <td style="text-align:center; border: solid 1px black; width:10%">Batal</td>
                <?php } ?>
                
                <td style="text-align:center; border: solid 1px black; width:10%">
                <?php
                    foreach($detOrderMonth as $d) { 
                        if($d->id_order == $data->id_order) {
                ?>
                    <?php echo $d->id_product ?><br>
                <?php }} ?>
                </td>

                <td style="text-align:center; border: solid 1px black; width:20%">
                <?php
                    foreach($detOrderMonth as $d) { 
                        if($d->id_order == $data->id_order) {
                ?>
                    <?php echo $d->nm_product ?><br>
                <?php }} ?>
                </td>

                <td style="text-align:center; border: solid 1px black; width:10%">
                <?php
                    foreach($detOrderMonth as $d) { 
                        if($d->id_order == $data->id_order) {
                ?>
                    <?php echo $d->nm_size ?><br>
                <?php }} ?>
                </td>

                <td style="text-align:center; border: solid 1px black; width:5%">
                <?php
                    foreach($detOrderMonth as $d) { 
                        if($d->id_order == $data->id_order) {
                ?>
                    <?php echo $d->qty ?><br>
                <?php }} ?>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table><br>

    <table style="border: 0px solid black; border-collapse: collapse; font-size:10pt;">
        <tr>
            <td><b>Rekapitulasi Status Pemesanan</b></td>
        </tr>
        <?php foreach($total_order as $total) { ?>
        <tr>
            <td>Pemesanan</td>
            <td>:</td>
            <?php foreach($pesan as $data) { ?>
            <td><?php echo $data->status_order; ?> Data </td>
            <!--<?php if($bulan == NULL && $tahun == NULL) {echo 'Tidak ada data';} else { ?>
            <td style="width:<?php $hasil = ($data->status_order/$total->data)*100; echo $hasil.'%'; ?>; height:10px; background:#ea5f40;"><br></td>-->
            <?php }} ?>
        </tr>
        <tr>
            <td>Konfirmasi Pemesanan</td>
            <td>:</td>
            <?php foreach($konfirmasi as $data) { ?>
            <td><?php echo $data->status_order; ?> Data </td>
            <!--<?php if($bulan == NULL && $tahun == NULL) {echo 'Tidak ada data';} else { ?>
            <td style="width:<?php $hasil = ($data->status_order/$total->data)*100; echo $hasil.'%'; ?>; height:10px; background:#ffa658;"><br></td>-->
            <?php }} ?>
        </tr>
        <tr>
            <td>Pembayaran</td>
            <td>:</td>
            <?php foreach($bayar as $data) { ?>
            <td><?php echo $data->status_order; ?> Data </td>
            <!--<?php if($bulan == NULL && $tahun == NULL) {echo 'Tidak ada data';} else { ?>
            <td style="width:<?php $hasil = ($data->status_order/$total->data)*100; echo $hasil.'%'; ?>; height:10px; background:#ffdb6a;"><br></td>-->
            <?php }} ?>
        </tr>
        <tr>
            <td>Pengiriman</td>
            <td>:</td>
            <?php foreach($kirim as $data) { ?>
            <td><?php echo $data->status_order; ?> Data </td>
            <!--<?php if($bulan == NULL && $tahun == NULL) {echo 'Tidak ada data';} else { ?>
            <td style="width:<?php $hasil = ($data->status_order/$total->data)*100; echo $hasil.'%'; ?>; height:10px; background:#009cbe;"><br></td>-->
            <?php }} ?>
        </tr>
        <tr>
            <td>Order Selesai</td>
            <td>:</td>
            <?php foreach($selesai as $data) { ?>
            <td><?php echo $data->status_order; ?> Data </td>
            <!--<?php if($bulan == NULL && $tahun == NULL) {echo 'Tidak ada data';} else { ?>
            <td style="width:<?php $hasil = ($data->status_order/$total->data)*100; echo $hasil.'%'; ?>; height:10px; background:#1f4e5a;"><br></td>-->
            <?php }} ?>
        </tr>
        <tr>
            <td>Order Batal</td>
            <td>:</td>
            <?php foreach($batal as $data) { ?>
            <td><?php echo $data->status_order; ?> Data </td>
            <!--<?php if($bulan == NULL && $tahun == NULL) {echo 'Tidak ada data';} else { ?>
            <td style="width:<?php $hasil = ($data->status_order/$total->data)*100; echo $hasil.'%'; ?>; height:10px; background:#727171;"><br></td>-->
            <?php }} ?>
        </tr>
        <?php } ?>
    </table><br><br>

</body>
</html>