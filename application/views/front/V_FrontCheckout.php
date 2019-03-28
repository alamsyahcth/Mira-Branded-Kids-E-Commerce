<!--Load View-->
<?php $this->load->view('front/__frontpartial/header_front.php') ?>
<?php $this->load->view('front/__frontpartial/navbar_front.php') ?>
<!--Load View-->

<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?php echo base_url('index.php/home') ?>">Home</a> <span class="mx-2 mb-0">/</span> <a href="<?php echo base_url('index.php/cart') ?>">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
       
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Detail Pengiriman</h2>
            <div class="p-3 p-lg-5 border">
              <form method="post" action="<?php echo base_url('index.php/Checkout') ?>">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo !empty($custData['name'])?$custData['name']:''; ?>" placeholder="Nama Anda">
                    <?php echo form_error('name','<p class="help-block error">','</p>'); ?>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_address" class="text-black">Alamat <span class="text-danger">*</span></label>
                    <textarea type="textarea" class="form-control" id="address" name="address" value="<?php echo !empty($custData['address'])?$custData['address']:''; ?>" placeholder="Street address"></textarea>
                    <?php echo form_error('address','<p class="help-block error">','</p>'); ?>
                  </div>
                </div>

                <!--Data Hidden Kota Asal-->
                  <!--457 Kode Tangerang Selatan-->
                  <input type="hidden" id="kota_asal" name="kota_asal" value="457" class="form-control kota">
                <!--Data Hidden Kota Asal-->

                <div class="form-group row">
                  <div class="col-md-4">
                    <label for="c_state_country" class="text-black">Provinsi <span class="text-danger">*</span></label>
                      <select onChange="getKotaTujuan()" id="provinsi_tujuan" name="provinsi_tujuan" class="form-control provinsi">
  
                      </select>
                  </div>
                  <div class="col-md-4">
                    <label for="c_postal_zip" class="text-black">Kota <span class="text-danger">*</span></label>
                      <select id="kota_tujuan" name="kota_tujuan" class="form-control kota">
                        <option>Pilih Kota Tujuan</option>

                      </select>
                  </div>

                  <div class="col-md-4">
                    <label for="c_fname" class="text-black">Kode Pos <span class="text-danger">*</span></label>
                    <input type="number" min="1" max="5" class="form-control" id="c_fname" name="c_fname" placeholder="kode pos">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo !empty($custData['email'])?$custData['email']:''; ?>" placeholder="Your Email">
                    <?php echo form_error('email','<p class="help-block error">','</p>'); ?>
                  </div>
                  <div class="col-md-6">
                    <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="phone" name="phone" <?php echo !empty($custData['phone'])?$custData['phone']:''; ?> placeholder="Phone Number">
                    <?php echo form_error('phone','<p class="help-block error">','</p>'); ?>
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Berat <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="berat" name="berat" value="1" readonly="">
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                  <label for="c_postal_zip" class="text-black">Kurir <span class="text-danger">*</span></label>
                      <select onChange="getOngkir()" name="kurir" id="kurir" class="form-control">
                          <option>Pilih Kurir</option>    
                          <option value="jne">JNE</option>    
                          <option value="pos">POS INDONESIA</option>       
                      </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                  <label for="c_postal_zip" class="text-black">Services <span class="text-danger">*</span></label>
                      <select name="services" id="services" class="form-control">
                          <option>Pilih Services</option>    
    
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="c_order_notes" class="text-black">Order Notes</label>
                  <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
                </div>

                <div class="form-group">
                      <input type="submit" name="placeOrder" id="placeOrder" value="Place Order" class="btn btn-primary btn-lg py-3 btn-block">
                </div>
              </form>
            </div>		
					</div>        
          <div class="col-md-6">  
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Pesanan Anda</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table table-hover mb-5">
                    <thead>
                      <th><p class="text-primary">Product</p></th>
                      <th><p class="text-primary">qty</p></th>
                      <th><p class="text-primary">Total</p></th>
                    </thead>
                    <tbody>
                    <?php foreach ($this->cart->contents() as $items) { ?>
                      <tr>
                        <td><?php echo $items['name'] ?></td>
                        <td><?php echo $items['qty'] ?></td>
                        <td>Rp.<?php echo $items['subtotal'] ?></td>
                      </tr>
                    <?php } ?>
                      <tr>
                        <td class="text-primary font-weight-bold"><strong>Cart Subtotal</strong></td>
                        <td class="text-black" colspan="2">Rp.<?php echo $this->cart->total() ?></td>
                      </tr>
                      <tr>
                        <td class="text-primary font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"colspan="2"><strong>$350.00</strong></td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0 text-primary">Metode Pembayaran</h3>

                    <div id="collapsebank">
                      <div class="py-2">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>

                 

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>


<!--Load View-->
<?php $this->load->view('front/__frontpartial/service_front.php') ?>
<?php $this->load->view('front/__frontpartial/footer_front.php') ?>
<!--Load View-->