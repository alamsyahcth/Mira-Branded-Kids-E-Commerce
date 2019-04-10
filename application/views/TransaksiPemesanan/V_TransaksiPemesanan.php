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
                        <h4 class="page-title">Pemesanan</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Transaksi</li>
                                    <li class="breadcrumb-item active" aria-current="page">Pemesanan</li>
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
                                        <?php if($this->session->flashdata('success')) { ?>
                                            <div class="card" style="padding:10px;">
                                                <div class="alert" role="alert" id="alert_s" style="background:#32ff7e;">
                                                    <h4 style="color:#3d3d3d"><?php echo $this->session->flashdata('success') ?></h4>
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
                                                                <th style="text-align:center;">Konfirmasi</th>
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
                                                                    <?php if($b->status == '1') { ?>
                                                                    <span class="label label-danger">Belum</span>
                                                                    <?php } else if ($b->status == '2') { ?>
                                                                    <span class="label label-primary">Sudah</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td width="5%" style="vertical-align:center; text-align:center;">
                                                                    <a href="<?php echo site_url('admin/C_TransaksiPemesanan/dataOrder/'.$b->id_order) ?>" data-toggle="tooltip" title="Detail" class="btn btn-info btn-sm">Detail</a>
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
                                                        <h4>Data Pemesanan</h4>
                                                    </div>
                                                    <table class="table table-hover">
                                                        <tr>
                                                            <td width="25%">No Invoice</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Tanggal Order</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Nama Customer</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"></td>
                                                        </tr>
                                                         <tr>
                                                            <td width="25%">Alamat Pengiriman</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Kurir</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Ongkos Kirim</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"></td>
                                                        </tr>
                                                    </table>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="30%">Id Product</th>
                                                                <th width="20%">Ukuran</th>
                                                                <th width="20%">Size</th>
                                                                <th width="5%">qty</th>
                                                                <th width="25%">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">Ongkir</td>
                                                                <td>:</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">Grand Total</td>
                                                                <td>:</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="6"><button class="btn btn-primary btn-block" disabled>Konfirmasi</button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
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

            <!--Delete Modal-->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" arialabelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="close"><span aria-hidden="true">x</span></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin menghapus data ini?</p>
                        </div>
                        <div class="modal-footer">
                            <a id="btn-delete" type="button" class="btn btn-primary" href="#">Delete</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Delete Modal-->
<?php $this->load->view('footer') ?>
