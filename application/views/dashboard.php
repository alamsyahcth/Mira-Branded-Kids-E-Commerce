      <?php $this->load->view('header') ?>
      <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Selamat Datang <?php echo $this->session->userdata('username') ?></h4></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Site Analysis</h4>
                                        <h5 class="card-subtitle">Overview of Latest Month</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- column -->
                                    <!--
                                    <div class="col-lg-9">
                                        <div class="flot-chart">
                                            <div class="flot-chart-content" id="flot-line-chart"></div>
                                        </div>
                                    </div>
                                    -->
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-primary p-10 text-white text-center">
                                                   <i class="fa fa-user m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5"><?php foreach($totalCustomer as $t) {echo $t->data;} ?></h5>
                                                   <small class="font-light">Total Customer</small>
                                                </div>
                                            </div>
                                             <div class="col-6">
                                                <div class="bg-primary p-10 text-white text-center">
                                                   <i class="fa fa-plus m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5"><?php foreach($pesananTerbaru as $t) {echo $t->data;} ?></h5>
                                                   <small class="font-light">Pesanan Terbaru</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-primary p-10 text-white text-center">
                                                   <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5"><?php foreach($totalTransaksi as $t) {echo $t->data;} ?></h5>
                                                   <small class="font-light">Total Transaksi</small>
                                                </div>
                                            </div>
                                             <div class="col-6 m-t-15">
                                                <div class="bg-primary p-10 text-white text-center">
                                                   <i class="fa fa-tag m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5"><?php foreach($transaksiSelesai as $t) {echo $t->data;} ?></h5>
                                                   <small class="font-light">Transaksi Selesai</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-primary p-10 text-white text-center">
                                                   <i class="fa fa-table m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5"><?php foreach($transaksiBatal as $t) {echo $t->data;} ?></h5>
                                                   <small class="font-light">Transaksi Batal</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-primary p-10 text-white text-center">
                                                   <i class="fa fa-globe m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5"><?php foreach($jumlahProduct as $t) {echo $t->data;} ?></h5>
                                                   <small class="font-light">Jumlah Product</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- column -->
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 style="text-align:center;">Kritik dan Saran</h4>
                            </div>
                            <div class="card-body" style="overflow-y: scroll; height:400px; width:auto;">
                                <?php foreach($saran as $s) { ?>
                                <div class="media border p-3">
                                    <img src="<?php echo base_url('upload/1.jpg') ?>" alt="komentar-mira-branded-kids" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                                    <div class="media-body">
                                        <h4><?php echo $s->nm_customer ?> <small><i>Posted on <?php echo $s->tanggal_saran ?></i></small></h4>
                                        <p><?php echo $s->isi_saran ?></p>
                                    </div>
                                </div>
                                <br>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
            </div>

            <?php $this->load->view('footer') ?>
