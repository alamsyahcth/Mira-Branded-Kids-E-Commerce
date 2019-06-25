<!--Load View-->
<?php $this->load->view('front/__frontPartial/header_front.php') ?>
<?php $this->load->view('front/__frontPartial/navbar_front.php') ?>
<!--Load View-->

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?php echo base_url('index.php/home') ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Sign Up</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black" style="text-align:center;">Update Data</h2>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-6">

            <form action="<?php echo base_url('index.php/Akun/edit') ?>" method="post">
              
              <div class="p-3 p-lg-8 border">
                <?php if($this->session->flashdata('Fail')) { ?>
                    <div class="alert alert-danger" role="alert"  id="alert_success">
                      <h5 style="color:#3d3d3d"><?php echo $this->session->flashdata('Fail') ?></h5>
                    </div>
                <?php } ?>

                <?php if($this->session->flashdata('Fail_Password')) { ?>
                    <div class="alert alert-danger" role="alert" id="alert_success">
                      <h5 style="color:#3d3d3d"><?php echo $this->session->flashdata('Fail_Password') ?></h5>
                    </div>
                <?php } ?>

                <input type="hidden" class="form-control" id="id_customer" name="id_customer" value="<?php echo $k->id_customer ?>" placeholder="">
                <input type="hidden" class="form-control" id="provinsi_customer" name="provinsi_customer" value="<?php echo $k->provinsi_customer ?>" placeholder="">
                <input type="hidden" class="form-control" id="kota_customer" name="kota_customer" value="<?php echo $k->kota_customer ?>" placeholder="">
                <input type="hidden" class="form-control" id="status_customer" name="status_customer" value="<?php echo $k->status_customer ?>" placeholder="">

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="nm_customer" class="text-black">Nama</label>
                    <input type="text" class="form-control" id="nm_customer" name="nm_customer" value="<?php echo $k->nm_customer ?>" placeholder="Nama Customer" required="">
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="email_customer" class="text-black">Email</label>
                    <input type="email" class="form-control" id="email_customer" name="email_customer" value="<?php echo $k->email_customer ?>" placeholder="example@mail.com" required="">
                    <span id="email_result"></span>
                  </div>
                </div>
                
                <!--<div class="form-group row">
                  <div class="col-md-12">
                    <label for="password_lama" class="text-black">Password Lama</label>
                    <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Masukkan Password Lama">
                  </div>
                </div>-->

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="password_baru" class="text-black">Password Baru</label>
                    <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Masukkan Password Baru">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="alamat_customer" class="text-black">Alamat Lengkap</label>
                    <textarea type="textarea" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="Masukkan Alamat Lengkap: Jalan, Nomor, RT/RW Kelurahan, dan Kecamatan" required=""><?php echo $k->alamat_customer ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="kodepos_customer" class="text-black">Kode Pos</label>
                    <input type="number" class="form-control" id="kodepos_customer" name="kodepos_customer" value="<?php echo $k->kodepos_customer ?>" placeholder="Kode Pos" maxlength="6" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="telp_customer" class="text-black">No Handphone</label>
                    <input type="number" class="form-control" id="telp_customer" name="telp_customer" value="<?php echo $k->telp_customer ?>" placeholder="Nomor Handphone Customer" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" name="update" class="btn btn-primary btn-md btn-block" value="Update">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-3"></div>


        </div>
      </div>
    </div>

<!--Load View-->
  <?php $this->load->view('front/__frontPartial/service_front.php') ?>
  <?php $this->load->view('front/__frontPartial/footer_front.php') ?>
  <!--Load View-->