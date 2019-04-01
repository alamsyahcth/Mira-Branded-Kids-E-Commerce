<!--Load View-->
<?php $this->load->view('front/__frontpartial/header_front.php') ?>
<?php $this->load->view('front/__frontpartial/navbar_front.php') ?>
<!--Load View-->

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?php echo base_url('index.php/home') ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">SignUp</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="<?php echo base_url('upload/barang/'.$product->gambar) ?>" alt="Image" class="img-fluid" width="70%">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $product->nm_barang ?></h2>
           
            <p><?php echo $product->deskripsi ?></p>
           
            <p><strong class="text-primary h4"><?php echo $product->harga ?></strong></p>
            
            <form method="post" action="<?php echo base_url('index.php/DetilProduct/addToCart') ?>">
              <div class="row">

                <input type="hidden" name="id" value="<?php echo $product->id_barang ?>">
                <div class="col-md-2">
                  <label>Ukuran</label>
                </div>
                <div class="col-md-4">
                  <select name="ukuran" class="form-control text-center">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                  </select>
                </div>
              </div><br>
              
              <div class="row">
                <div class="col-md-2">
                  <label>Jumlah</label>
                </div>
                <div class="col-md-4">
                  <input type="number" name="qty" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div>
              </div>
              <br>

              <div class="row">
                <button type"submit" name="add" id="add" value="Add To Cart" class="btn btn-sm btn-primary">Add To Cart</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

<!--Load View-->
  <?php $this->load->view('front/__frontpartial/service_front.php') ?>
  <?php $this->load->view('front/__frontpartial/footer_front.php') ?>
  <!--Load View-->