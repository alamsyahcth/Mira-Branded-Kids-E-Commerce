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
    <table style="border: 2px solid black; border-collapse: collapse;" width="100%">
        <thead>
            <tr>
                <th style="text-align:center; border: 1px solid black; width:5%">No</th>
                <th style="text-align:center; border: 1px solid black; width:15%">Id Customer</th>
                <th style="text-align:center; border: 1px solid black; width:15%">Nama</th>
                <th style="text-align:center; border: 1px solid black; width:15%">Email</th>
                <th style="text-align:center; border: 1px solid black; width:15%">No Handphone</th>
                <th style="text-align:center; border: 1px solid black; width:15%">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                foreach ($customer as $b) {
            ?>
            <tr>
                <td style="text-align:center; border: 1px solid black;"><?php echo $no++ ?></td>
                <td style="text-align:center; border: 1px solid black;"><?php echo $b->id_customer ?></td>
                <td style="text-align:center; border: 1px solid black;"><?php echo $b->nm_customer ?></td>
                <td style="text-align:center; border: 1px solid black;"><?php echo $b->email_customer ?></td>
                <td style="text-align:center; border: 1px solid black;"><?php echo $b->telp_customer ?></td>                                                        
                <td style="text-align:center; border: 1px solid black;">
                <?php
                    if ($b->status_customer == '1') {
                        echo 'Aktif';
                    }

                    if ($b->status_customer == '2') {
                        echo 'Belum Aktif';
                    }
                ?>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>


</body>
</html>