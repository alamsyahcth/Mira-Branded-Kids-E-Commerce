<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Pengiriman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    
    <img src="<?php echo base_url('Assets/assets/images/toko/KopSurat.jpg') ?>" style="width:40%"><br>

    <h2 style="text-align:center;">Laporan Data Pengiriman</h2>
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
                <th style="text-align:center; border: 1px solid black;">No</th>
                <th style="text-align:center; border: 1px solid black;">ID Faktur</th>
                <th style="text-align:center; border: 1px solid black;">ID Order</th>
                <th style="text-align:center; border: 1px solid black;">Tanggal</th>
                <th style="text-align:center; border: 1px solid black;">Nama Customer</th>
                <th style="text-align:center; border: 1px solid black;">Kurir</th>
                <th style="text-align:center; border: 1px solid black;">Ongkos Kirim</th>
                <th style="text-align:center; border: 1px solid black;">Alamat Kirim</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                foreach ($sendMonth as $data) {
            ?>
            <tr>
                <td style="text-align:center; border: solid 1px black; width:2%"><?php echo $no++ ?></td>
                <td style="text-align:center; border: solid 1px black; width:10%"><?php echo $data->id_resi ?></td>
                <td style="text-align:center; border: solid 1px black; width:10%"><?php echo $data->id_order ?></td>
                <td style="text-align:center; border: solid 1px black; width:10%"><?php echo $data->tanggal_resi ?></td>
                <td style="text-align:center; border: solid 1px black; width:20%"><?php echo $data->nm_customer ?></td>
                <td style="text-align:center; border: solid 1px black; width:5%"><?php echo $data->kurir ?></td>
                <td style="text-align:center; border: solid 1px black; width:10%"><?php echo $data->ongkir ?></td>
                <td style="text-align:center; border: solid 1px black; width:25%"><?php echo $data->alamat_kirim ?></td>
            </tr>
            <?php
                }
            ?>
            
        </tbody>
    </table><br>

</body>
</html>