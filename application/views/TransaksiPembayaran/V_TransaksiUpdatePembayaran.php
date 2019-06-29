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
                        <h4 class="page-title">Pembayaran</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Transaksi</li>
                                    <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div id="pesan-sukses" class="alert alert-success" style="margin: 10px 20px;"></div>
                            <div class="row">
                                <!--Start Table-->
                                <div id="view" class="col-md-12">
                                    
                                    <div class="card">
                                        <?php if($this->session->flashdata('tambah_sukses')) { ?>
                                            <div class="card" style="padding:10px;">
                                                <div class="alert" role="alert" id="alert_s" style="background:#32ff7e;">
                                                    <h4 style="color:#3d3d3d"><?php echo $this->session->flashdata('tambah_sukses') ?></h4>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if($this->session->flashdata('edit_sukses')) { ?>
                                            <div class="card" style="padding:10px;">
                                                <div class="alert" role="alert" id="alert_s" style="background:#32ff7e;">
                                                   <h4 style="color:#3d3d3d"> <?php echo $this->session->flashdata('edit_sukses') ?></h4>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if($this->session->flashdata('del_sukses')) { ?>
                                            <div class="card" style="padding:10px;">
                                                <div class="alert" role="alert" id="alert_s" style="background:#32ff7e;">
                                                    <h4 style="color:#3d3d3d"><?php echo $this->session->flashdata('del_sukses') ?></h4>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        
                                        <div class="row">
                                            <!--Table-->
                                            <div class="col-md-6">
                                                <div class="table-responsive" style="padding:30px;">
                                                    <table id="dataTableConfig" class="table table-hover table-stripted table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align:center;">No</th>
                                                                <th style="text-align:center;">Order ID</th>
                                                                <th style="text-align:center;">Nomor Resi</th>
                                                                <th style="text-align:center;">Detail</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $no=1;
                                                                foreach ($order as $b) {
                                                            ?>
                                                            <tr>
                                                                <td width="5%" style="vertical-align:center;"><?php echo $no++ ?></td>
                                                                <td width="5%" style="vertical-align:center;"><?php echo $b->id_order ?></td>
                                                                <td width="3%" style="vertical-align:center; text-align:center;">
                                                                    <?php if($b->status == '3') { ?>
                                                                    <span class="label label-danger">Belum</span>
                                                                    <?php } else if ($b->status == '4') { ?>
                                                                    <span class="label label-primary">Sudah</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td width="5%" style="vertical-align:center; text-align:center;">
                                                                    <a href="<?php echo site_url('admin/C_TransaksiPembayaran/dataOrder/'.$b->id_order) ?>" data-toggle="tooltip" title="Detail" class="btn btn-info btn-sm">Detail</a>
                                                                </td>
                                                            
                                                            </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--Table-->

                                            <div class="col-md-5">
                                                <div class="card" style="padding-top:50px;">
                                                    <div class="card-header">
                                                        <h4>Data Pembayaran</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <?php 
                                                            foreach($resi as $s) {
                                                                echo '<b>No Resi : '.$s->no_resi.'</b>';
                                                            }
                                                        ?>
                                                    </div>
                                                     <?php foreach($orderId as $data) { ?>
                                                    <table class="table table-hover">
                                                       
                                                        <tr>
                                                            <td width="25%">ID Order</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->id_order ?></td>
                                                        </tr>
                                                         <tr>
                                                            <td width="25%">Tanggal Order</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->tanggal_order ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Nama Customer</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->nm_customer ?></td>
                                                        </tr>
                                                         <tr>
                                                            <td width="25%">Alamat Pengiriman</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->alamat_customer ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Kurir</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->kurir ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Ongkos Kirim</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->ongkir ?></td>
                                                        </tr>
                                                         <tr>
                                                            <td width="25%">Grand Total</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->grand_total ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Tanggal Transfer</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->tanggal_transfer ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Jumlah Transfer</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->jumlah_transfer ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Nomor Rekening</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->no_rekening ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Bukti Transfer</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><a href="<?php echo base_url('index.php/admin/C_TransaksiPembayaran/viewImage/'.$data->id_order) ?>" data-toggle="tooltip" title="zoom"><img src="<?php echo base_url('upload/confirm/'.$data->bukti_transfer) ?>" width="40%"></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Atas Nama</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->nm_pengirim ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Bank Tujuan</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->nm_bank ?></td>
                                                        </tr>
                                                    </table>
                                                    <form class="submit" action="<?php echo base_url('index.php/admin/C_TransaksiPembayaran/label') ?>" method="post">
                                                        <input type="hidden" name="id_orderLabel" value="<?php echo $data->id_order ?>">
                                                        <input type="submit" name="simpan" id="simpan" value="Cetak Label" class="btn btn-secondary btn-md btn-block">
                                                    </form><br><br>
                                                    <form class="form" action="<?php echo base_url('index.php/admin/C_TransaksiPembayaran/edit') ?>" method="post">
                                                        <input type="hidden" name="id_resi" value="<?php echo $resiId ?>">
                                                        <input type="hidden" name="id_order" value="<?php echo $data->id_order ?>">
                                                        <input type="hidden" name="email_customer" value="<?php echo $data->email_customer ?>">
                                                        <input type="hidden" name="tanggal_resi" value="<?php echo date("Y-m-d"); ?>">
                                                        <input type="hidden" name="kurir" value="<?php echo $data->kurir ?>">
                                                        <label for="no_resi" class="control-label">No Resi</label>
                                                        <input type="number" name="no_resi" class="form-control" placeholder="Masukkan Nomor Resi" required><br>
                                                        <input type="submit" name="simpan" id="simpan" value="Konfirmasi" class="btn btn-primary btn-md btn-block">
                                                    </form><br>

                                                    <form class="form" action="<?php echo base_url('index.php/admin/C_TransaksiPembayaran/tolakPembayaran') ?>" method="post">
                                                        <input type="hidden" name="id_confirm" value="<?php echo $data->id_confirm ?>">
                                                        <input type="hidden" name="id_order" value="<?php echo $data->id_order ?>">
                                                        <input type="hidden" name="email_customer" value="<?php echo $data->email_customer ?>">
                                                        <input type="submit" name="tolak" id="tolak" value="Tolak Pembayaran" class="btn btn-danger btn-md btn-block">
                                                    </form>
                                                    <?php } ?>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <!--End Table-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

           
<?php $this->load->view('footer') ?>
