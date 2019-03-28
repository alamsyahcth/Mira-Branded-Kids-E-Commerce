<!--Load View-->
<?php $this->load->view('front/__frontpartial/header_front.php') ?>
<?php $this->load->view('front/__frontpartial/navbar_front.php') ?>
<!--Load View-->

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?php echo base_url('index.php/home') ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Detail</strong></div>
        </div>
      </div>
    </div>  

    <div id="alert_success">
      <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <span class="icon-check_circle display-3 text-success"></span>
              <h2 class="display-3 text-black">Terima Kasih!</h2>
              <p class="lead mb-5">Pesanan anda berhasil Diproses</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="card" style="margin:40px; padding:10px; background:none; color:#303030;">
      <div class="card-header" style="background:none;">
        <h4 style="text-align:center;">Detail Order</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <table class="table">
              <?php foreach($customer as $data) { ?>
              <tr>
                <td width="20%">Nama</td>
                <td width="10%">:</td>
                <td width="70%" style="font-weight: bold;"><?php echo $data->name ?></td>
              </tr>
              <tr>
                <td width="20%">Alamat</td>
                <td width="10%">:</td>
                <td width="70%" style="font-weight: bold;"><?php echo $data->address ?></td>
              </tr>
              <tr>
                <td width="20%">Email</td>
                <td width="10%">:</td>
                <td width="70%" style="font-weight: bold;"><?php echo $data->email ?></td>
              </tr>
              <tr>
                <td width="20%">No.Handphone</td>
                <td width="10%">:</td>
                <td width="70%" style="font-weight: bold;"><?php echo $data->phone ?></td>
              </tr>
              <?php } ?>
            </table>
          </div>

          <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($order as $item) { ?>
                  <tr>
                    <td><?php echo $item->id_barang ?></td>
                    <td><?php echo $item->nm_barang ?></td>
                    <td><?php echo $item->quantity ?></td>
                    <td><?php echo $item->sub_total ?></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="3">Total</td>
                    <?php foreach($gtotal as $item) { ?>
                    <td><?php echo $item->grand_total ?></td>
                    <?php } ?>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12"><p style="text-align:center;"><a href="shop.html" class="btn btn-sm btn-primary">Kembali Belanja</a></p></div>

<!--Load View-->
<?php $this->load->view('front/__frontpartial/service_front.php') ?>
<?php $this->load->view('front/__frontpartial/footer_front.php') ?>
<!--Load View-->