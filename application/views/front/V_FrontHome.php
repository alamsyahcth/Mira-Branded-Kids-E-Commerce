<!--Load View-->
<?php $this->load->view('front/__frontpartial/header_front.php') ?>
<?php $this->load->view('front/__frontpartial/navbar_front.php') ?>
<?php $this->load->view('front/__frontpartial/slider_front.php') ?>
<!--Load View-->
<div class="bg-light py-3">

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-1"></div>
          <div class="col-md-10 order-2">
            <h4 style="text-align:center;">Produk Kami</h4>
            <div class="row mb-5">
              <?php foreach ($data->result() as $b) { ?>
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <a href="<?php echo base_url('index.php/DetilProduct') ?>"><img src="<?php echo base_url('upload/barang/'.$b->gambar) ?>" alt="Image placeholder" class="img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h2><a href="<?php echo base_url('index.php/DetilProductdata/'.$b->id_barang) ?>"><?php echo $b->nm_barang ?></a></h3>
                    <?php echo date("ymdhms"); ?>
                    <h5 class="text-primary font-weight-bold">Rp.<?php echo $b->harga ?></h4><br>
                    <a href="<?php echo base_url('index.php/DetilProduct/data/'.$b->id_barang) ?>"><button type="button" class="btn btn-primary btn-block">Detail</button></a>
                  </div>
                </div>
              </div>
              <?php } ?>
              

            </div>
            <div class="col-md-1"></div>
            <div class="row" data-aos="fade-up">
              <div class="col-md-5"></div>
              <div class="col-md-1 text-center">
               <div class="col-md-5"></div>
                <div class="site-block-27">
                  <?php echo $pagination ?>
                </div>
              </div>
            </div>
          </div>

        </div>
        
      </div>
    </div>
<!--Load View-->
<?php $this->load->view('front/__frontpartial/service_front.php') ?>
<?php $this->load->view('front/__frontpartial/footer_front.php') ?>
<!--Load View-->