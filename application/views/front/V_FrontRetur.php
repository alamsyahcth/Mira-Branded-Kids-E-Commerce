<!--Load View-->
<?php $this->load->view('front/__frontPartial/header_front.php') ?>
<?php $this->load->view('front/__frontPartial/navbar_front.php') ?>
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
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Transaksi</h5>
                    </div>
                    <div class="card-body" style="overflow-y:scroll; height:300px;">
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
            </div><br><br>
            <!--History-->

            <!--Data Retur-->
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Retur</h5>
                    </div>
                    <div class="card-body" style="overflow-y:scroll; height:300px;">
                        <table class="table table-stripted table-bordered table-hover" style="color:#000000;" width="100%">
                            <thead>
                                <tr>
                                    <th width="20%" style="text-align:center;">ID Retur</th>
                                    <th width="20%" style="text-align:center;">ID Order</th>
                                    <th width="20%" style="text-align:center;">Status</th>
                                    <th width="20%" style="text-align:center;">Jumlah Refund</th>
                                    <th width="20%" style="text-align:center;">Bukti Refund</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($retur as $data) { ?>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data->id_retur ?></td>
                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data->id_order ?></td>
                                    <td style="text-align:center; vertical-align:middle;">
                                        <?php if($data->status_retur=='1') { ?>
                                        <p class="text-danger">Belum Di Konfirmasi</p>
                                        <?php } ?>

                                        <?php if($data->status_retur=='2') { ?>
                                        <p class="text-primary">Sudah Di Konfirmasi</p>
                                        <?php } ?>

                                        <?php if($data->status_retur=='3') { ?>
                                        <p class="text-success">Selesai</p>
                                        <?php } ?>

                                         <?php if($data->status_retur=='4') { ?>
                                        <p class="text-secondary">Batal</p>
                                        <?php } ?>
                                    </td>
                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data->grandtotal_retur ?></td>
                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data->bukti_refund ?></td>
                                </tr>
                                <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Data Retur-->

        </div>
      </div>
    </div>

<!--Load View-->
  <?php $this->load->view('front/__frontPartial/service_front.php') ?>
  <?php $this->load->view('front/__frontPartial/footer_front.php') ?>
  <!--Load View-->