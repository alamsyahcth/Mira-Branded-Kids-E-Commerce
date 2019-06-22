    
    <!--<div class="site-blocks-cover" style="background-image: url('<?php echo base_url('Assets/front/images/hero_1.jpg') ?>')" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h1 class="mb-2">Finding Your Perfect Shoes</h1>
            <div class="intro-text text-center text-md-left">
              <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla. </p>
              <p>
                <a href="#" class="btn btn-sm btn-primary">Shop Now</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>-->
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <?php $i=0; foreach ($banner as $data) { ?>
    <li data-target="#demo" data-slide-to="<?php echo $i++; ?>"></li>
    <?php } ?>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <?php $i=0; foreach ($banner as $data) { ?>
    <div class="carousel-item <?php if($i==0) {echo 'active';} $i++;  ?>">
      <img src="<?php echo base_url('upload/banner/'.$data->gambar_banner) ?>" alt="<?php echo $data->judul_banner ?>">
      <div class="carousel-caption">
        <h3><?php echo $data->judul_banner ?></h3>
        <p><?php echo $data->deskripsi_banner ?></p>
      </div>
    </div>
    <?php } ?>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>