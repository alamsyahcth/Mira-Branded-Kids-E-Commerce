<!--Load View-->
<?php $this->load->view('front/__frontPartial/header_front.php') ?>
<?php $this->load->view('front/__frontPartial/navbar_front.php') ?>
<!--Load View-->
<div class="bg-light py-3">

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-1"></div>
          <div class="col-md-10 order-2">
            <h1 style="text-align:center;">Kategori</h1>
            <div class="row mb-5">
              <?php foreach ($data->result() as $p) { ?>
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <a href="<?php echo base_url('index.php/DetilProduct/data/'.$p->id_product) ?>"><img src="<?php echo base_url('upload/product/'.$p->gambar) ?>" alt="Image placeholder" class="img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h2><a href="<?php echo base_url('index.php/DetilProductdata/'.$p->id_product) ?>"><?php echo $p->nm_product ?></a></h3>
                    <h5 class="text-primary font-weight-bold">Rp.<?php echo $p->harga ?></h4><br>
                    <a href="<?php echo base_url('index.php/DetilProduct/data/'.$p->id_product) ?>"><button type="button" class="btn btn-primary btn-block">Detail</button></a>
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
<?php $this->load->view('front/__frontPartial/service_front.php') ?>
<?php $this->load->view('front/__frontPartial/footer_front.php') ?>
<!--Load View-->