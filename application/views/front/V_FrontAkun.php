<!--Load View-->
<?php $this->load->view('front/__frontPartial/header_front.php') ?>
<?php $this->load->view('front/__frontPartial/navbar_front.php') ?>
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
                        <table class="table table-stripted table-hover" style="color:#000000;" width="100%">
                            <thead>
                                <tr>
                                    <th width="15%" style="text-align:center;">Id Order</th>
                                    <th width="20%" style="text-align:center;">Tanggal</th>
                                    <th width="20%" style="text-align:center;">Status</th>
                                    <th width="10%" style="text-align:center;">Total</th>
                                    <th width="20%" style="text-align:center;">No Resi</th>
                                    <th width="5%" style="text-align:center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($order as $data) { ?>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data->id_order ?></td>
                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data->tanggal_order ?></td>
                                    <td style="text-align:center; vertical-align:middle;">
                                        <?php if($data->status == '1') { ?>
                                             <p class="text-danger" style="font-weight:bold;">Belum Di Konfirmasi</p>
                                        <?php } ?>

                                        <?php if($data->status == '2') { ?>
                                             <p class="text-primary" style="font-weight:bold;">Sudah Di Konfirmasi</p>
                                        <?php } ?>

                                        <?php if($data->status == '3') { ?>
                                             <p class="text-primary" style="font-weight:bold;">Konfirmasi Pembayaran</p>
                                        <?php } ?>

                                        <?php if($data->status == '4') { ?>
                                             <p class="text-primary" style="font-weight:bold;">Dikirim</p>
                                        <?php } ?>

                                        <?php if($data->status == '5') { ?>
                                             <p class="text-success" style="font-weight:bold;">Selesai</p>
                                        <?php } ?>

                                        <?php if($data->status == '6') { ?>
                                             <p class="text-danger" style="font-weight:bold;">Batal</p>
                                        <?php } ?>
                                    </td>
                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data->grand_total ?></td>
                                    <td style="text-align:center; vertical-align:middle;">
                                        <?php 
                                            foreach($resi as $r) {
                                                if ($r->id_order == $data->id_order) {
                                                    echo $r->no_resi;
                                                }
                                            } 
                                        ?>
                                    </td>
                                    <td style="text-align:center; vertical-align:middle;">
                                        <?php if ($data->status == '4') { ?>
                                        <a href="<?php echo base_url('index.php/Akun/ubahStatus/'.$data->id_order) ?>" class="btn btn-primary btn-xs">Selesai</a>
                                        <?php } else { ?>
                                        <button class="btn btn-primary btn-xs" disabled>Selesai</button>
                                        <?php } ?>
                                    </td>
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
                        <a href="<?php echo base_url('index.php/akun/edit/') ?>" class="btn btn-outline-primary btn-xs">Edit</a>
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
  <?php $this->load->view('front/__frontPartial/service_front.php') ?>
  <?php $this->load->view('front/__frontPartial/footer_front.php') ?>
  <!--Load View-->