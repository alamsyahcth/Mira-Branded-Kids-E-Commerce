<!--Load View-->
<?php $this->load->view('front/__frontPartial/header_front.php') ?>
<?php $this->load->view('front/__frontPartial/navbar_front.php') ?>
<!--Load View-->

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?php echo base_url('index.php/home') ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Detil Product</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="<?php echo base_url('upload/product/'.$product->gambar) ?>" alt="Image" class="img-fluid" width="70%">
          </div>
          <div class="col-md-6">
                <?php if($this->session->flashdata('fail')) { ?>
                    <div class="alert alert-primary" role="alert" id="alert_success">
                      <h6 style="color:#3d3d3d"><?php echo $this->session->flashdata('fail') ?></h6>
                    </div>
                <?php } ?>
            <h2 class="text-black"><?php echo $product->nm_product ?></h2>

            <p><strong class="text-primary h4"><?php echo $product->harga ?></strong></p>
           
            <p><?php echo $product->deskripsi ?></p>
            
            <form method="post" action="<?php echo base_url('index.php/DetilProduct/addToCart') ?>">
              <div class="row">

                <input type="hidden" name="id" id="id_productdetil" value="<?php echo $product->id_product ?>">
                <input type="hidden" name="berat" value="<?php echo $product->berat ?>">
                <div class="col-md-2">
                  <label>Ukuran</label>
                </div>
                <div class="col-md-4">
                  <select name="ukuran" id="ukuranProduct" class="form-control text-center" style="text-align:center;">
                    <?php foreach($size as $s) { ?>
                    <option value="<?php echo $s->id_size ?>" style="text-align:center;"><?php echo $s->nm_size ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div><br>
              <!--<input type="text" name="dataStok" id="dataStok">-->
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
            
            <br>
            <div class="row">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Komentar</h5>
                </div>
                <div class="card-body" style="overflow-y: scroll; height:400px; width:500px;">
                  <?php foreach($comment as $c) { ?>
                  <div class="media border p-3">
                    <img src="<?php echo base_url('upload/1.jpg') ?>" alt="komentar-mira-branded-kids" class="mr-2 mt-3 rounded-circle" style="width:60px;">
                    <div class="media-body">
                      <h6><?php echo $c->nm_customer ?> <small><i>Posted on <?php echo $c->tanggal_comment ?></i></small></h6>
                      <p><?php echo $c->isi_comment ?></p>

                      <!--Reply Comment-->
                      <?php 
                        foreach($reply as $p) { 
                          if($p->id_comment == $c->id_comment) {
                      ?>
                      <div class="media p-3">
                        <img src="<?php echo base_url('upload/1.jpg') ?>" alt="komentar-mira-branded-kids" class="mr-2 mt-3 rounded-circle" style="width:60px;">
                        <div class="media-body">
                          <h6><?php echo $p->username ?> <small><i>Posted on <?php echo $p->tanggal_reply ?></i></small></h6>
                          <p><?php echo $p->isi_reply ?></p>
                        </div>
                      </div>
                      <?php }} ?>
                      <!--Reply Comment-->
                    </div>
                  </div>
                  <br>
                  <?php } ?>
                </div>
                <div class="card-footer">
                  <form action="<?php echo base_url('index.php/DetilProduct/comment') ?>" method="post">
                    <input type="hidden" name="id_product" value="<?php echo $product->id_product ?>">
                    <input type="hidden" name="id_customer" value="<?php echo $this->session->userdata('id_customer') ?>">
                    <input type="hidden" name="tanggal_comment" value="<?php echo date('Y-m-d') ?>">
                    <textarea type="textarea" name="isi_comment" class="form-control" placeholder="Tuliskan komentar anda tentang produk ini"></textarea><br>
                    <?php if($this->session->userdata('on') != TRUE) { ?>
                    <button type="button" class="btn btn-md btn-primary" id="tooltip" title="Anda harus login" disabled>Kirim Komentar</button>
                    <?php } else { ?>
                    <input type="submit" name="kirim" value="Kirim Komentar" class="btn btn-md btn-primary">
                    <?php } ?>
                  </form>
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