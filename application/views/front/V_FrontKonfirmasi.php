<!--Load View-->
<?php $this->load->view('front/__frontPartial/header_front.php') ?>
<?php $this->load->view('front/__frontPartial/navbar_front.php') ?>
<!--Load View-->

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?php echo base_url('index.php/home') ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Konfirmasi Pebayaran</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Konfirmasi Pembayaran</h2>
            </div>
            <div class="col-md-12">

              <form action="<?php echo base_url('index.php/Konfirmasi/add'); ?>" method="post" enctype="multipart/form-data">

                <?php if($this->session->flashdata('success')) { ?>
                  <div class="card" style="padding:10px;" id="alert_success">
                    <div class="alert alert-primary" role="alert">
                      <p style="color:#3d3d3d"><?php echo $this->session->flashdata('success') ?></p>
                    </div>
                  </div>
                <?php } ?>

                 <?php if($this->session->flashdata('fail')) { ?>
                  <div class="card" style="padding:10px;" id="alert_success">
                    <div class="alert alert-danger" role="alert">
                      <p style="color:#3d3d3d"><?php echo $this->session->flashdata('fail') ?></p>
                    </div>
                  </div>
                <?php } ?>

                <input type="hidden" name="id_confirm" value="<?php echo $confirmId ?>">
                <input type="hidden" name="tanggal_confirm" value="<?php echo date("Y-m-d") ?>">
                <input type="hidden" name="id_customer" id="id_customerData" value="<?php echo $this->session->userdata('id_customer') ?>">
                
                <div class="p-3 p-lg-8 border">
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="id_order" class="text-black">ID Order</label>
                      <input type="text" class="form-control" id="id_orderData" name="id_order" placeholder="Masukkan ID Order" required="">
                      <div id="order_result"></div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="tanggal_transfer" class="text-black">Tanggal Transfer</label>
                      <input type="date" class="form-control" id="tanggal_transfer" name="tanggal_transfer" placeholder="Tanggal Transfer" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="id_bank" class="text-black">Bank Tujuan</label>
                      <select name="id_bank" id="id_bank" class="form-control" required="">
                        <option disabled selected>Nama Bank</option>
                        <?php foreach($bank as $data) { ?>
                          <option value="<?php echo $data->id_bank ?>"><?php echo $data->nm_bank ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="no_rekening" class="text-black">Nomor Rekening</label>
                      <input type="number" class="form-control" id="no_rekening" name="no_rekening" placeholder="Nomor rekening pengirim" required="">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="nm_pengirim" class="text-black">Atas Nama</label>
                      <input type="text" class="form-control" id="nm_pengirim" name="nm_pengirim" placeholder="Atas nama nomor rekening" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="jumlah_transfer" class="text-black">Jumlah Transfer </label>
                      <input type="number" class="form-control" id="jumlah_transfer" name="jumlah_transfer" placeholder="Jumlah Transfer" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="bukti_transfer" class="text-black">Upload Bukti Transfer (File Gambar) </label>
                      <input type="file" class="form-control" id="bukti_transfer" name="bukti_transfer" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-lg-12">
                      <input type="submit" class="btn btn-primary btn-lg btn-block" value="Kirim Bukti Pembayaran">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="col-md-4">
            <div class="border p-3 mb-3">
              <h2 class="h4 mb-0 text-primary">Metode Pembayaran</h2>
              <p>Pembayaran Dapat dilakukan dengan cara transfer bank dengan detail dibawah ini</p><br><br>
              
              <?php foreach($bank as $b) { ?>
              <div id="collapsebank">
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-3"><img src="<?php echo base_url('upload/bank/'.$b->logo_bank) ?>" width="40"></div>
                  <div class="col-md-7">
                    <h5 class="mb-1">Bank <?php echo $b->nm_bank ?></h5>
                    <p class="mb-1">No Rekening : <?php echo $b->no_rektoko ?></p>
                    <p class="mb-1">Atas Nama : <?php echo $b->atas_nama ?></p>
                  </div>
                  <div class="col-md-1"></div>
                </div>
              </div><br>
              <?php } ?>
            </div>
          </div>

          </div>
        </div>
      </div>
    </div>

<!--Load View-->
  <?php $this->load->view('front/__frontPartial/service_front.php') ?>
  <?php $this->load->view('front/__frontPartial/footer_front.php') ?>
  <!--Load View-->