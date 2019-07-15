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
                        <h4 class="page-title">Status Pemesanan</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Transaksi</li>
                                    <li class="breadcrumb-item active" aria-current="page">Status Pemesanan</li>
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
                                            <div class="alert" role="alert" id="alert_s" style="background:#32ff7e;">
                                                <h4 style="color:#3d3d3d"><?php echo $this->session->flashdata('success') ?></h4>
                                            </div>
                                        <?php } ?>

                                        <div class="card-body">
                                            <table id="tableSort" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" style="text-align:center;">Order Id</th>
                                                        <th width="10%" style="text-align:center;">Tanggal</th>
                                                        <th width="70%" style="text-align:center;">Status Pemesanan</th>
                                                        <th width="5%" style="text-align:center;">Detail</th>
                                                        <th width="5%" style="text-align:center;">Batal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($order as $data) { ?>
                                                    <tr>
                                                        <td style="text-align:center; vertical-align:middle;"><?php echo $data->id_order ?></td>

                                                        <td style="text-align:center; vertical-align:middle;"><?php echo $data->tanggal_order ?></td>

                                                        <td style="text-align:center; vertical-align:middle;">

                                                            <?php if($data->status == '1') { 
                                                                echo'
                                                                    <div class="d-flex no-block align-items-center">
                                                                        <span>Belum Dikonfirmasi</span>
                                                                    </div>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="10" aria-valueminat="0" aria-valuemax="100"></div>
                                                                    </div>';
                                                             }

                                                             else if($data->status == '2') {
                                                                echo '<div class="d-flex no-block align-items-center">
                                                                        <span>Sudah Dikonfirmasi</span>
                                                                    </div>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="10" aria-valueminat="0" aria-valuemax="100"></div>
                                                                    </div>';
                                                             }

                                                             if($data->status == '3') {
                                                                echo '<div class="d-flex no-block align-items-center">
                                                                        <span>Konfirmasi Pembayaran</span>
                                                                    </div>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="10" aria-valueminat="0" aria-valuemax="100"></div>
                                                                    </div>';
                                                             }

                                                             if($data->status == '4') {
                                                                echo '<div class="d-flex no-block align-items-center">
                                                                        <span>Pesanan Dikirim</span>
                                                                    </div>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="10" aria-valueminat="0" aria-valuemax="100"></div>
                                                                    </div>';
                                                             }

                                                             if($data->status == '5') {
                                                                echo '<div class="d-flex no-block align-items-center">
                                                                        <span>Selesai</span>
                                                                    </div>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valueminat="0" aria-valuemax="100"></div>
                                                                    </div>';
                                                             }

                                                             if($data->status == '6') {
                                                                echo '<div class="d-flex no-block align-items-center">
                                                                        <span>Pesanan Dibatalkan</span>
                                                                    </div>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valueminat="0" aria-valuemax="100"></div>
                                                                    </div>';
                                                             } ?>
                                                             
                                                        </td>
                                                        <td style="text-align:center; vertical-align:middle;">
                                                            <?php if($data->status == '1' || $data->status == '2') { ?>
                                                                <a href="<?php echo base_url('index.php/admin/C_TransaksiPemesanan/dataOrder/'.$data->id_order) ?>" class="btn btn-primary btn-xs">Detail</a>
                                                            <?php } ?>

                                                            <?php if($data->status == '3' || $data->status == '4') { ?>
                                                                <a href="<?php echo base_url('index.php/admin/C_TransaksiPembayaran/dataOrder/'.$data->id_order) ?>" class="btn btn-primary btn-xs">Detail</a>
                                                            <?php } ?>

                                                            <?php if($data->status == '5' || $data->status == '6') { ?>
                                                                <button class="btn btn-primary btn-xs" disabled>Detail</button>
                                                            <?php } ?>
                                                        </td>
                                                        <td style="text-align:center; vertical-align:middle;">
                                                            <?php if($data->status == '6' || $data->status == '5') { ?>
                                                            <button class="btn btn-secondary btn-xs" disabled>Batal</button>
                                                            <?php } else { ?>
                                                            <a href="<?php echo base_url('index.php/admin/C_TransaksiStatusPemesanan/batal/'.$data->id_order) ?>" class="btn btn-secondary btn-xs">Batal</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
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
