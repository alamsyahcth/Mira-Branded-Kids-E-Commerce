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
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <table style="color:#000000; font-size:16pt; margin: 20px;">
                                <tr>
                                    <td width="5%">ID Faktur</td>
                                    <td width="2%">:</td>
                                    <td width="20%" style="font-weight:bold;">S0001291818290</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <table style="color:#000000; font-size:10pt; margin: 20px;">
                                <tr>
                                    <td style="font-weight:bold;">Alamat Pengiriman</td>
                                </tr>
                                <tr>
                                    <td>Alamsyah Catur</td>
                                </tr>
                                <tr>
                                    <td>Jalan Mede No.23 RT.005 RW.04 Petukangan Utara Jakarta Selatan 12260</td>
                                </tr>
                                <tr>
                                    <td>089670465244</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2">
                            <table style="color:#000000; font-size:10pt; margin: 20px;">
                                <tr>
                                    <td style="font-weight:bold;">Detail Pengiriman</td>
                                </tr>
                                <tr>
                                    <td>Jasa Pengiriman JNE</td>
                                </tr>
                                <tr>
                                    <td>Tanggal 2019-04-01</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table style="color:#000000; font-size:10pt; margin: 20px;">
                                <tr>
                                    <td style="font-weight:bold;">Alamat Toko</td>
                                </tr>
                                <tr>
                                    <td>Vila Mutiara, Blok F4 No.3 Pondok Jagung Timur, Serpong, Tangerang Selatan</td>
                                </tr>
                                <tr>
                                    <td>0817 1430 41</td>
                                </tr>
                                <tr>
                                    <td>mirabrandedkids@gmail.com</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Retur</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" style="color:#000000;" width="100%">
                            <thead>
                                <tr>
                                    <th width="15%" style="text-align:center;">ID Product</th>
                                    <th width="10%" style="text-align:center;">Foto</th>
                                    <th width="35%" style="text-align:center;">Nama Product</th>
                                    <th width="5%" style="text-align:center;">Size</th>
                                    <th width="10%" style="text-align:center;">QTY</th>
                                    <th width="15%" style="text-align:center;">Alasan</th>
                                    <th width="5%" style="text-align:center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="<?php echo base_url('index.php/Retur/updateRetur') ?>" method="post">
                                <?php foreach($getRetur as $data) { ?>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data->id_product ?></td>
                                    <td style="text-align:center; vertical-align:middle;"><img src="<?php echo base_url('upload/product/'.$data->gambar) ?>" width="50%"></td>
                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data->nm_product ?></td>
                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data->nm_size ?></td>
                                    <input type="hidden" name="id_retur" value="<?php echo $data->id_retur ?>">
                                    <input type="hidden" name="id_order[]" value="<?php echo $data->id_order ?>">
                                    <input type="hidden" name="id_product[]" value="<?php echo $data->id_product ?>">
                                    <input type="hidden" name="id_size[]" value="<?php echo $data->id_size ?>">
                                    <input type="hidden" name="harga[]" value="<?php echo $data->harga ?>">
                                    <td style="text-align:center; vertical-align:middle;"><input type="number" name="qty[]" class="form-control" value="<?php echo $data->qty ?>" max="<?php echo $data->qty ?>"></td>
                                    <td style="text-align:center; vertical-align:middle;"><input type="text" name="alasan[]" class="form-control" placeholder="alasan" required=""></td>
                                    <td style="text-align:center; vertical-align:middle;">
                                        <a href="<?php echo base_url('index.php/Retur/deleteData/'.$data->id_retur.'/'.$data->id_product.'/'.$data->id_size); ?>"><button type="button" class="btn btn-primary btn-xs">X</button></a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="5"> </td>
                                    <td colspan="2"><input type="submit" name="update" value="Simpan" class="btn btn-primary btn-block"></td>
                                </tr>
                                </form>
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