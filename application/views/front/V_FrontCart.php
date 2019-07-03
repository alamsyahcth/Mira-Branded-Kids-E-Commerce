<!--Load View-->
<?php $this->load->view('front/__frontPartial/header_front.php') ?>
<?php $this->load->view('front/__frontPartial/navbar_front.php') ?>
<!--Load View-->

     <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-2">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail" width="20%">Foto</th>
                    <th class="product-name" width="35%">Product</th>
                    <th class="product-price" width="20%">Harga</th>
                    <th class="product-quantity" width="5%">Quantity</th>
                    <th class="product-quantity" width="5%">Ukuran</th>
                    <th class="product-total" width="20%">Total</th>
                    <th class="product-remove" width="5%">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php if($this->cart->total_items()>0) { foreach($this->cart->contents() as $items) { ?>
                    <!--Cart Isi-->
                  <tr>
                    <td class="product-thumbnail">
                      <img src="<?php echo base_url('upload/product/'.$items['image']) ?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $items["name"]; ?></h2>
                    </td>

                    <td>
                      Rp.<?php echo $items["price"]; ?>
                    </td>

                    <!--Tambah Kurang-->
                    <td>
                      <div class="input-group mb-1" style="max-width: auto;">
                        <input type="number" class="form-control text-center" value="<?php echo $items["qty"]; ?>" placeholder="" aria-label="Example text with button addon" onchange="updateCartItem(this,'<?php echo $items["rowid"]; ?>')" readonly>
                      </div>
                    </td>
                    <!--Tambah Kurang-->

                    <td>
                      <?php echo $items["nm_size"]; ?>
                    </td>

                    <td>
                      Rp.<?php echo $items["subtotal"]; ?>
                    </td>

                    <td>
                      <a href="<?php echo base_url('index.php/cart/removeCart/'.$items['rowid'].'/'.$items['id_product'].'/'.$items['Size'].'/'.$items['qty']) ?>" class="btn btn-primary btn-sm">X</a>
                    </td>
                  </tr>
                    <!--Cart Isi-->
                  <?php }} ?>
                  
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block" onclick="window.location='<?php echo base_url('index.php/home') ?>'">Lanjut Belanja</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <h4><span class="text-black">Total</span></h4>
                  </div>
                  <div class="col-md-6 text-right">
                    <h4><strong class="text-black">Rp.<?php echo $this->cart->total() ?></strong></h4>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='<?php echo base_url('index.php/Checkout') ?>'">Proceed To Checkout</button>
                  </div>
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