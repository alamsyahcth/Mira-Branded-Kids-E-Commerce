<!--Load View-->
<?php $this->load->view('front/__frontPartial/header_front.php') ?>
<?php $this->load->view('front/__frontPartial/navbar_front.php') ?>
<!--Load View-->

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?php echo base_url('index.php/home') ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Login</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black" style="text-align:center;">Login</h2>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-6">

            <form action="<?php echo base_url('index.php/Login/auth') ?>" method="post">
              
              <div class="p-3 p-lg-8 border">
                 <?php if($this->session->flashdata('signup_success')) { ?>
                    <div class="alert alert-primary" role="alert" id="alert_success">
                      <h6 style="color:#3d3d3d"><?php echo $this->session->flashdata('signup_success') ?></h6>
                    </div>
                <?php } ?>

                <?php if($this->session->flashdata('confirm_success')) { ?>
                    <div class="alert alert-primary" role="alert" id="alert_success">
                      <h6 style="color:#3d3d3d"><?php echo $this->session->flashdata('confirm_success') ?></h6>
                    </div>
                <?php } ?>
                
                 <?php if($this->session->flashdata('login_fail')) { ?>
                    <div class="alert alert-primary" role="alert" id="alert_success">
                      <h6 style="color:#3d3d3d"><?php echo $this->session->flashdata('login_fail') ?></h6>
                    </div>
                <?php } ?>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="email_customer" class="text-black">Email</label>
                    <input type="email" class="form-control" id="email_customer" name="email_customer" placeholder="">
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="password_customer" class="text-black">Password</label>
                    <input type="password" class="form-control" id="password_customer" name="password_customer" placeholder="">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-md btn-block" value="Login">
                  </div>
                </div>
              </div>
            </form>
            <p>Belum punya akun? Sign Up disini <a href="<?php echo base_url('index.php/SignUp') ?>" class="btn-link"> Sign Up</a></p>
          </div>
          <div class="col-md-3"></div>


        </div>
      </div>
    </div>

<!--Load View-->
  <?php $this->load->view('front/__frontPartial/service_front.php') ?>
  <?php $this->load->view('front/__frontPartial/footer_front.php') ?>
  <!--Load View-->