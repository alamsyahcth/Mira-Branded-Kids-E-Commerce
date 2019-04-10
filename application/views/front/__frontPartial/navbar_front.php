  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <p>Telp : 0817 1430 41</p>
              <!--<form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Cari Barang">
              </form>-->
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="<?php echo base_url('index.php/home') ?>" class="js-logo-clone">Mira Branded Kids</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <?php if ($this->session->userdata('on') == TRUE) { ?>
                    <li><a href="<?php echo base_url('index.php/login/logout') ?>"> (Logout) </a></li>
                    <li><a href="<?php echo base_url('index.php/akun') ?>" data-toggle="tooltip" title="<?php echo $this->session->userdata('nm_customer') ?>"><span class="icon icon-person"></span></a></li>
                  <?php } else { ?>
                    <li><a href="<?php echo base_url('index.php/login') ?>"><span class="icon icon-person"></span></a></li>
                    <?php } ?>
                  <li>
                    <a href="<?php echo base_url('index.php/cart') ?>" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count"><?php echo $this->cart->total_items(); ?></span>
                    </a>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li><a href="<?php echo base_url('index.php/home') ?>">Home</a></li>
            <li class="has-children">
              <a href="#">Kategori</a>
              <ul class="dropdown">
                <?php foreach($kategori as $items) { ?>
                <li><a href="<?php echo base_url('index.php/Kategori/index/'.$items->id_kategori) ?>"><?php echo $items->nm_kategori; ?></a></li>
                <?php } ?>
                <!--<li class="has-children">
                  <a href="<?php echo base_url('index.php/kategori') ?>">Sub Menu</a>
                  <ul class="dropdown">
                    <li><a href="<?php echo base_url('index.php/kategori') ?>">Menu One</a></li>
                    <li><a href="<?php echo base_url('index.php/kategori') ?>">Menu Two</a></li>
                    <li><a href="<?php echo base_url('index.php/kategori') ?>">Menu Three</a></li>
                  </ul>
                </li>-->
              </ul>
            </li>
            <li><a href="<?php echo base_url('index.php/Konfirmasi') ?>">Konfirmasi Pembayaran</a></li>
            <li><a href="<?php echo base_url('index.php/Konfirmasi') ?>">Retur</a></li>
            <li><a href="<?php echo base_url('CaraOrder') ?>">Cara Order</a></li>
          </ul>
        </div>
      </nav>
    </header>