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
            <h2 class="h3 mb-3 text-black" style="text-align:center;">Sign Up</h2>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-6">

            <form action="<?php echo base_url('index.php/SignUp/add') ?>" method="post">
              
              <div class="p-3 p-lg-8 border">
                <?php if($this->session->flashdata('Fail')) { ?>
                  <div class="card" style="padding:10px;">
                    <div class="alert alert-danger" role="alert" id="alert_success">
                      <h4 style="color:#3d3d3d"><?php echo $this->session->flashdata('Fail') ?></h4>
                    </div>
                  </div>
                <?php } ?>

                <input type="hidden" class="form-control" id="id_customer" name="id_customer" value="<?php echo $autonumber ?>" placeholder="">

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="nm_customer" class="text-black">Nama</label>
                    <input type="text" class="form-control" id="nm_customer" name="nm_customer" placeholder="Nama Customer" required="">
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="email_customer" class="text-black">Email</label>
                    <input type="email" class="form-control" id="email_customer" name="email_customer" placeholder="example@mail.com" required="">
                    <span id="email_result"></span>
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="password_customer" class="text-black">Password</label>
                    <input type="password" class="form-control" id="password_customer" name="password_customer" placeholder="Masukkan Password" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="alamat_customer" class="text-black">Alamat Lengkap</label>
                    <textarea type="textarea" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="Masukkan Alamat Lengkap: Jalan, Nomor, RT/RW Kelurahan, dan Kecamatan" required=""></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <!--<div class="col-md-4">
                    <label for="provinsi_customer" class="text-black">Provinsi</label>
                    <select onChange="getKotaTujuan()" id="provinsi_tujuan" name="provinsi_customer" class="form-control provinsi" required="">
                    
                    </select>
                  </div>

                  <div class="col-md-4">
                    <label for="kota_customer" class="text-black">Kota</label>
                    <select id="kota_tujuan" name="kota_customer" class="form-control kota" required="">
                      <option>Pilih Kota</option>
                    </select>
                  </div>-->

                  <div class="col-md-12">
                    <label for="kodepos_customer" class="text-black">Kode Pos</label>
                    <input type="number" class="form-control" id="kodepos_customer" name="kodepos_customer" placeholder="Kode Pos" maxlength="6" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="telp_customer" class="text-black">No Handphone</label>
                    <input type="number" class="form-control" id="telp_customer" name="telp_customer" placeholder="Nomor Handphone Customer" required="">
                  </div>
                </div>

                <input type="hidden" class="form-control" id="status_customer" name="status_customer" value="2" placeholder="">

                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" name="signup" class="btn btn-primary btn-md btn-block" value="Sign Up">
                  </div>
                </div>
              </div>
            </form>
            <p>Sudah punya akun? Login Disini <a href="<?php echo base_url('index.php/signup') ?>" class="btn-link"> Log In</a></p>
          </div>
          <div class="col-md-3"></div>


        </div>
      </div>
    </div>

<!--Load View-->
  <?php $this->load->view('front/__frontPartial/service_front.php') ?>
  <?php $this->load->view('front/__frontPartial/footer_front.php') ?>
  <!--Load View-->