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
                        <h4 class="page-title">Product</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Master</li>
                                    <li class="breadcrumb-item active" aria-current="page">Product</li>
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
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 style="text-align:center;">Data Stok</h4>
                                                    </div>
                                                    <div class="card-body"> 
                                                        <div class="row">
                                                            <form clas="form-horizontal" action="<?php echo base_url('index.php/admin/C_MasterProduct/editStok') ?>" method="post">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td style="text-align:center">Size</td>
                                                                        <td style="text-align:center">Stok</td>
                                                                    </tr>
                                                                    
                                                                    <?php foreach($detil_size as $data) { ?>
                                                                    <tr>
                                                                        <td style="text-align:center">
                                                                            <input type="hidden" name="id_product[]" value="<?php echo $data->id_product ?>">
                                                                            <input type="hidden" name="id_size[]" value="<?php echo $data->id_size ?>" class="form-control" readonly>
                                                                            <input type="text" class="form-control" value="<?php echo $data->nm_size ?>" readonly>
                                                                        </td>
                                                                        <td style="text-align:center">
                                                                            <input type="number" name="stok[]" value="<?php echo $data->stok ?>" class="form-control">
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                    <tr>
                                                                        <td colspan="2"><input type="submit" value="Update" name="update" class="btn btn-md btn-primary btn-block"></td>
                                                                    </tr>
                                                                </table>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Table-->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <?php if($this->session->flashdata('tambah_sukses')) { ?>
                                                    <div class="card" style="padding:10px;" id="alert_s">
                                                        <div class="alert" role="alert" style="background:#32ff7e;">
                                                            <h4 style="color:#3d3d3d"><?php echo $this->session->flashdata('tambah_sukses') ?></h4>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 style="text-align:center;">Data Size Baru</h4>
                                                    </div>
                                                    <div class="card-body"> 
                                                        <div class="row">
                                                            <form clas="form-horizontal" action="<?php echo base_url('index.php/admin/C_MasterProduct/tambahStok') ?>" method="post">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td width="50%" style="text-align:center; width:50%;">Size</td>
                                                                        <td width="50%" style="text-align:center; width:50%;">Stok</td>
                                                                    </tr>
                                                                
                                                                    <?php foreach($sizeBaru as $data) { ?>
                                                                    <tr>
                                                                        <td style="text-align:center">
                                                                            <input type="hidden" name="id_product[]" value="<?php echo $id ?>">
                                                                            <input type="hidden" name="id_size[]" value="<?php echo $data->id_size ?>" class="form-control" readonly>
                                                                            <input type="text" class="form-control" value="<?php echo $data->nm_size ?>" readonly>
                                                                        </td>
                                                                        <td style="text-align:center">
                                                                            <input type="number" name="stok[]" value="0" class="form-control">
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                    <tr>
                                                                        <td colspan="2"><input type="submit" value="Tambah" name="tambah" class="btn btn-md btn-primary btn-block"></td>
                                                                    </tr>
                                                                </table>
                                                            </form>
                                                        </div>
                                                    </div>
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
