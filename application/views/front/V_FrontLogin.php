<!--Load View-->
<?php $this->load->view('front/__frontpartial/header_front.php') ?>
<?php $this->load->view('front/__frontpartial/navbar_front.php') ?>
<!--Load View-->

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?php echo base_url('index.php/home') ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Login</h2>
          </div>
          <div class="col-md-6">

            <form action="#" method="post">
              
              <div class="p-3 p-lg-8 border">
                <div class="alert alert-danger">
                    <h6>Maaf Email dan Password Yang Anda Masukkan Salah !</h6>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email</label>
                    <input type="email" class="form-control" id="c_email" name="c_email" placeholder="">
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Password</label>
                    <input type="password" class="form-control" id="c_email" name="c_email" placeholder="">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-md btn-block" value="Login">
                  </div>
                </div>
              </div>
            </form>
            <p>Belum punya akun? Daftar Disini <a href="<?php echo base_url('index.php/signup') ?>" class="btn-link"> Sign Up</a></p>
          </div>

          <!--Jenis Transfer-->
          <div class="col-md-6 ml-auto">
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">New York</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">London</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">Canada</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
            <!--Jenis Transfer-->

          </div>
        </div>
      </div>
    </div>

<!--Load View-->
  <?php $this->load->view('front/__frontpartial/service_front.php') ?>
  <?php $this->load->view('front/__frontpartial/footer_front.php') ?>
  <!--Load View-->