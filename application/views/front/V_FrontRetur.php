<!--Load View-->
<?php $this->load->view('front/__frontpartial/header_front.php') ?>
<?php $this->load->view('front/__frontpartial/navbar_front.php') ?>
<!--Load View-->  

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?php echo base_url('index.php/home') ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Retur</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Retur</h2>
          </div>

            <!--History-->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Transaksi</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripted table-hover" style="color:#000000;" width="100%">
                            <thead>
                                <tr>
                                    <th width="15%" style="text-align:center;">ID Faktur</th>
                                    <th width="20%" style="text-align:center;">Tanggal Kirim</th>
                                    <th width="5%" style="text-align:center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach($order as $data) { ?>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data->id_resi ?></td>
                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data->tanggal_resi ?></td>
                                    
                                    <!--<?php if($retur != NULL) {foreach($retur as $r) { ?>
                                    <td style="text-align:center; vertical-align:middle;">
                                        <?php if($r->id_order == $data->id_order && $r->status_retur == '1') { ?>
                                             <p class="text-danger" style="font-weight:bold;">Belum Di Konfirmasi</p>
                                        <?php } ?>

                                        <?php if($r->id_order == $data->id_order && $r->status_retur == '2') { ?>
                                             <p class="text-primary" style="font-weight:bold;">Sudah Di Konfirmasi</p>
                                        <?php } ?>

                                        <?php if($r->id_order == $data->id_order && $r->status_retur == '3') { ?>
                                             <p class="text-primary" style="font-weight:bold;">Konfirmasi Pembayaran</p>
                                        <?php } ?>

                                        <?php if($r->id_order == $data->id_order && $r->status_retur == '4') { ?>
                                             <p class="text-primary" style="font-weight:bold;">Dikirim</p>
                                        <?php } ?>

                                        <?php if($r->id_order == $data->id_order && $r->status_retur == '5') { ?>
                                             <p class="text-success" style="font-weight:bold;">Selesai</p>
                                        <?php } ?>

                                        <?php if($r->id_order == $data->id_order && $r->status_retur == NULL) { ?>
                                             <p class="text-danger" style="font-weight:bold;">Batal</p>
                                        <?php } ?>
                                    </td>
                                    <td style="text-align:center; vertical-align:middle;">
                                        <?php 
                                            if ($r->id_order == $data->id_order) {
                                                echo $r->grandtotal_retur;
                                            }
                                        ?>
                                    </td>-->
                                    <?php }} else { ?>
                                        <td style="text-align:center;">-</td><td style="text-align:center;">-</td>
                                    <?php } ?>
                                    <td style="text-align:center; vertical-align:middle;">
                                        <form action="<?php echo base_url('index.php/Retur/aksi') ?>" method="post">
                                            <input type="hidden" name="id_retur" value="<?php echo $id_retur ?>">
                                            <input type="hidden" name="id_order" value="<?php echo $data->id_order ?>">
                                            <input type="hidden" name="tgl_retur" value="<?php echo date("Y-m-d") ?>">
                                            <input type="hidden" name="status_retur" value="1">
                                            <input type="submit" name="simpan" value="Retur Order" class="btn btn-primary btn-xs">
                                            <?php 
                                                foreach($orderData as $r) { 
                                                    if($r->id_order == $data->id_order) {
                                            ?>
                                                <input type="hidden" name="id_return[]" value="<?php echo $id_retur; ?>">
                                                <input type="hidden" name="id_order[]" value="<?php echo $r->id_order; ?>">
                                                <input type="hidden" name="id_product[]" value="<?php echo $r->id_product; ?>">
                                                <input type="hidden" name="id_size[]" value="<?php echo $r->id_size; ?>">
                                                <input type="hidden" name="qty_retur[]" value="<?php echo $r->qty; ?>">
                                                <input type="hidden" name="subtotal_retur[]" value="<?php echo $r->sub_total; ?>">
                                                <input type="hidden" name="alasan[]" value="<?php echo '-'; ?>"><br>
                                            <?php }} ?>
                                           
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--History-->

        </div>
      </div>
    </div>

<!--Load View-->
  <?php $this->load->view('front/__frontpartial/service_front.php') ?>
  <?php $this->load->view('front/__frontpartial/footer_front.php') ?>
  <!--Load View-->