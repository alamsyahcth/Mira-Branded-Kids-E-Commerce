<!--Load View-->
<?php $this->load->view('front/__frontpartial/header_front.php') ?>
<?php $this->load->view('front/__frontpartial/navbar_front.php') ?>
<!--Load View-->  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Hai <?php echo $this->session->userdata('nm_customer') ?></h2>
          </div>

            <!--History-->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Transaksi</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripted table-hover" style="color:#000000;">
                            <thead>
                                <tr>
                                    <th>No Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>No Resi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i=0; $i < 4; $i++) { ?>
                                <tr>
                                    <td>0001</td>
                                    <td>21-04-2019</td>
                                    <td>Belum Bayar</td>
                                    <td>RP.100000</td>
                                    <td>1267362516283725</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--History-->

            <!--Data Akun-->
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-10">
                        <h4>Data Akun</h4>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo base_url('index.php/Akun/edit/'.$customer->id_customer) ?>" class="btn btn-outline-primary btn-xs">Edit</a>
                    </div>
                </div>
                <br>
                <table class="table" style="color:#000000;">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $customer->nm_customer ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo $customer->alamat_customer ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $customer->email_customer ?></td>
                    </tr>
                    <tr>
                        <td>No Handphone</td>
                        <td>:</td>
                        <td><?php echo $customer->telp_customer ?></td>
                    </tr>
                </table>
            </div>
             <!--Data Akun-->

        </div>
      </div>
    </div>

<!--Load View-->
  <?php $this->load->view('front/__frontpartial/service_front.php') ?>
  <?php $this->load->view('front/__frontpartial/footer_front.php') ?>
  <!--Load View-->