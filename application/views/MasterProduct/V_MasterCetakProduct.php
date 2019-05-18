<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <img src="<?php echo base_url('Assets/assets/images/toko/KopSurat.jpg') ?>" style="width:40%"><br>
    <p>Tanggal Cetak : <?php echo date("D-M-Y"); ?></p><br>
    <table style="border: 2px solid black; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="text-align:center; border: 1px solid black;">No</th>
                <th style="text-align:center; border: 1px solid black;">Kode</th>
                <th style="text-align:center; border: 1px solid black;">Nama Barang</th>
                <th style="text-align:center; border: 1px solid black;">Harga</th>
                <th style="text-align:center; border: 1px solid black;" colspan="2">Stok</th>
                <th style="text-align:center; border: 1px solid black;">Gambar</th>
                <th style="text-align:center; border: 1px solid black;">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                foreach ($product as $b) {
            ?>
            <tr>
                <td style="text-align:center; border: solid 1px black; width:5%"><?php echo $no++ ?></td>
                <td style="text-align:center; border: solid 1px black; width:5%"><?php echo $b->id_product ?></td>
                <td style="text-align:center; border: solid 1px black; width:20%"><?php echo $b->nm_product ?></td>
                <td style="text-align:center; border: solid 1px black; width:10%"><?php echo $b->harga ?></td>
                <td style="text-align:center; border: solid 1px black; width:5%">
                    <?php
                        foreach ($getStok as $data) {
                            if ($data->id_product == $b->id_product) {
                                echo $data->nm_size.'<br>';
                            }
                        }
                    ?>
                </td>
                <td style="text-align:center; border: solid 1px black; width:5%">
                    <?php
                        foreach ($getStok as $data) {
                            if ($data->id_product == $b->id_product) {
                                echo $data->stok.'<br>';
                            }
                        }
                    ?>
                </td>
                <td style="text-align:center; border: solid 1px black; width:10%"><img src="<?php echo base_url('upload/product/'.$b->gambar) ?>" style="width: 30%;"></td>
                <td style="text-align:center; border: solid 1px black; width:35%"><?php echo $b->deskripsi ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>


</body>
</html>