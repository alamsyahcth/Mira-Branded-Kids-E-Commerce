<!--Load View-->
<?php $this->load->view('front/__frontPartial/header_front.php') ?>
<?php $this->load->view('front/__frontPartial/navbar_front.php') ?>
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
                <input type="hidden" name="id_order" value="<?php echo $orderId ?>">
                <input type="hidden" name="tanggal_order" value="<?php echo date("Y-m-d") ?>">
                <input type="hidden" name="id_customer" value="<?php  echo $customer['id_customer'] ?>">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $customer['nm_customer'] ?>" placeholder="Nama Anda" readonly="">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="alamat_kirim" class="text-black">Alamat Kirim <span class="text-danger">*</span></label>
                    <textarea type="textarea" class="form-control" id="address" name="alamat_kirim" placeholder="Street address"><?php echo $customer['alamat_customer'] ?></textarea>
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
                      <select id="kota_tujuan" name="kota" class="form-control kota">
                        <option>Pilih Kota Tujuan</option>

                      </select>
                  </div>

                  <div class="col-md-4">
                    <label for="kodepos_customer" class="text-black">Kode Pos <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="kodepos_customer" name="kode_pos" value="<?php echo $customer['kodepos_customer'] ?>" placeholder="kode pos">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $customer['email_customer'] ?>" placeholder="Your Email" readonly="">
                  </div>
                  <div class="col-md-6">
                    <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $customer['telp_customer'] ?>" placeholder="Phone Number" readonly="">
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Berat (Gram) <span class="text-danger">*</span></label>
                    <?php 
                      $berat = 0;
                      $hasil = 0;
                      foreach ($this->cart->contents() as $data) {
                        $nilai = (int) $data['weight']*$data['qty'];
                        $hasil = $nilai+$hasil;
                      }
                      $berat=$hasil;
                    ?>
                    <input type="number" class="form-control" id="berat" name="total_berat" value="<?php echo $berat; ?>" readonly="">
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
                <input type="hidden" name="total_cart" id="total_cart" value="<?php echo $this->cart->total(); ?>">
                <div class="form-group row">
                  <div class="col-md-12">
                  <label for="c_postal_zip" class="text-black">Services <span class="text-danger">*</span></label>
                      <select name="ongkir" id="services" class="form-control">
                          <option>Pilih Services</option>    
    
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="c_order_notes" class="text-black">Catatan untuk pengiriman</label>
                  <textarea name="catatan" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
                </div>

                <input type="hidden" name="status" value="1">
                <input type="hidden" name="grand_total" id="gtotal">

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
                      <th><p class="text-primary" style="text-align:center;">Product</p></th>
                      <th><p class="text-primary" style="text-align:center;">Qty</p></th>
                      <th><p class="text-primary" style="text-align:center;">Ukuran</p></th>
                      <th><p class="text-primary" style="text-align:center;">Total</p></th>
                    </thead>
                    <tbody>
                    <?php foreach ($this->cart->contents() as $items) { ?>
                      <tr>
                        <td style="text-align:center;"><?php echo $items['name'] ?></td>
                        <td style="text-align:center;"><?php echo $items['qty'] ?></td>
                        <td style="text-align:center;"><?php echo $items['nm_size'] ?></td>
                        <td style="text-align:center;">Rp.<?php echo $items['subtotal'] ?></td>
                      </tr>
                    <?php } ?>
                      <tr>
                        <td class="text-primary font-weight-bold" style="vertical-align:middle"><strong>Cart Subtotal</strong></td>
                        <td class="text-black" style="font-size:20pt; text-align:right;">Rp.</td>
                        <td class="text-black" colspan="3" style="font-size:20pt;"><?php echo $this->cart->total() ?></td>
                      </tr>
                      <tr>
                        <td class="text-primary font-weight-bold" style="vertical-align:middle"><strong>Order Total</strong></td>
                        <td class="text-black" style="font-size:20pt; text-align:right;">Rp.</td>
                        <td class="text-black" colspan="3" style="font-size:20pt;"><strong><div id="dataGtotal"><?php echo $this->cart->total() ?></div></strong></td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="border p-3 mb-3">
                    <h2 class="h4 mb-0 text-primary">Metode Pembayaran</h2>
                    <p>Pembayaran Dapat dilakukan dengan cara transfer bank dengan detail dibawah ini</p><br><br>
                    
                    <?php foreach($bank as $b) { ?>
                    <div id="collapsebank">
                      <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3"><img src="<?php echo base_url('upload/bank/'.$b->logo_bank) ?>" width="40"></div>
                        <div class="col-md-7">
                          <h5 class="mb-1">Bank <?php echo $b->nm_bank ?></h5>
                          <p class="mb-1">No Rekening : <?php echo $b->no_rektoko ?></p>
                          <p class="mb-1">Atas Nama : <?php echo $b->atas_nama ?></p>
                        </div>
                        <div class="col-md-1"></div>
                      </div>
                    </div><br>
                    <?php } ?>
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