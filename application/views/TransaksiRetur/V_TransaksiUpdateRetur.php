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
                        <h4 class="page-title">Retur</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Transaksi</li>
                                    <li class="breadcrumb-item active" aria-current="page">Retur</li>
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
                                            <div class="card" style="padding:10px;" id="alert_s">
                                                <div class="alert" role="alert" style="background:#32ff7e;">
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
                                                                <th style="text-align:center;">Retur ID</th>
                                                                <th style="text-align:center;">Refund</th>
                                                                <th style="text-align:center;">Detail</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $no=1;
                                                                foreach ($retur as $b) {
                                                            ?>
                                                            <tr>
                                                                <td width="5%" style="vertical-align:center;"><?php echo $no++ ?></td>
                                                                <td width="5%" style="vertical-align:center;"><?php echo $b->id_retur ?></td>
                                                                <td width="3%" style="vertical-align:center; text-align:center;">
                                                                    <?php if($b->status_retur == '1') { ?>
                                                                    <span class="label label-danger">Belum</span>
                                                                    <?php } else if ($b->status_retur == '2') { ?>
                                                                    <span class="label label-primary">Sudah</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td width="5%" style="vertical-align:center; text-align:center;">
                                                                    <a href="<?php echo site_url('admin/C_TransaksiRetur/dataRetur/'.$b->id_retur) ?>" data-toggle="tooltip" title="Detail" class="btn btn-info btn-sm">Detail</a>
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
                                                        <h4>Data Retur</h4>
                                                    </div>
                                                    <table class="table table-hover">
                                                        <?php foreach($returId as $data) { ?>
                                                        <tr>
                                                            <td width="25%">No Retur</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->id_retur ?></td>
                                                        </tr>
                                                         <tr>
                                                            <td width="25%">No Invoice</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->id_order ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Tanggal Retur</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->tgl_retur ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Nama Customer</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->nm_customer ?></td>
                                                        </tr>
                                                         <tr>
                                                            <td width="25%">No Rekening</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%"><?php echo $data->no_rekening ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">Bukti Transfer</td>
                                                            <td width="5%">:</td>
                                                            <td width="70%">
                                                                <?php 
                                                                    if ($data->bukti_refund == '-') {
                                                                        echo '<p class="text-danger">Belum Refund</p>';
                                                                    } else {
                                                                ?>
                                                                    <img src="<?php echo base_url('upload/refund/'.$data->bukti_refund) ?>" width="40%">
                                                                <?php
                                                                    }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                        <?php } ?>
                                                   
                                                    </table>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="20%">Id Product</th>
                                                                <th width="5%">Size</th>
                                                                <th width="20%">Harga</th>
                                                                <th width="5%">qty</th>
                                                                <th width="30%">Alasan</th>
                                                                <th width="25%">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($detil_retur as $data) { ?>
                                                            <tr>
                                                                <td><?php echo $data->id_product ?></td>
                                                                <td><?php echo $data->nm_size ?></td>
                                                                <td><?php echo $data->harga ?></td>
                                                                <td><?php echo $data->qty_retur ?></td>
                                                                <td><?php echo $data->alasan ?></td>
                                                                <td><?php echo $data->subtotal_retur ?></td>
                                                            </tr>
                                                            <?php } ?>
                                                            <tr>
                                                                <td colspan="4">Grand Total</td>
                                                                <td>:</td>
                                                                <td><?php foreach($returId as $data) {echo $data->grandtotal_retur;} ?></td>
                                                            </tr>
                                                            <form action="<?php echo base_url('index.php/admin/C_TransaksiRetur/edit') ?>" method="post" enctype="multipart/form-data">
                                                                <tr>
                                                                    <td colspan="6"><label for="bukti_refund" class="control-label">Bukti Refund</label>
                                                                    <input type="hidden" name="id_retur" value="<?php foreach($returId as $data) {echo $data->id_retur;} ?>">
                                                                    <input type="file" name="bukti_refund" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                    <?php if ($data->bukti_refund == '-') { ?>
                                                                        <td colspan="6"><input type="submit" name="konfirmasi" value="Konfirmasi" class="btn btn-primary btn-block"></td>
                                                                    <?php } else {?>
                                                                        <td colspan="6"><button class="btn btn-primary btn-block" data-toggle="tooltip" title="Bukti refund sudah dientry" disabled>Konfirmasi</td>
                                                                    <?php } ?>
                                                                </tr>
                                                            </form>
                                                           
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
