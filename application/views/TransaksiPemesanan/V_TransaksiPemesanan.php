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
                                    <li class="breadcrumb-item">Master</li>
                                    <li class="breadcrumb-item active" aria-current="page">Barang</li>
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
                                                                <th style="text-align:center;">Kode Invoice</th>
                                                                <th style="text-align:center;">Konfirmasi</th>
                                                                <th style="text-align:center;">Detail</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $no=1;
                                                                foreach ($barang as $b) {
                                                            ?>
                                                            <tr>
                                                                <td width="5%" style="vertical-align:center;"><?php echo $no++ ?></td>
                                                                <td width="5%" style="vertical-align:center;"><?php echo $b->id_barang ?></td>
                                                                <td width="5%" style="vertical-align:center; text-align:center;">
                                                                    <span class="label label-primary">Sudah</span>
                                                                </td>
                                                                <td width="5%" style="vertical-align:center; text-align:center;">
                                                                    <a href="<?php echo site_url('admin/C_MasterBarang/edit/'.$b->id_barang) ?>" data-toggle="tooltip" title="Detail" class="btn btn-info btn-sm">Detail</a>
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
                                                            <td>No Invoice</td>
                                                            <td>:</td>
                                                            <td>0001</td>
                                                        </tr>
                                                         <tr>
                                                            <td>Nama Customer</td>
                                                            <td>:</td>
                                                            <td>Tahta</td>
                                                        </tr>
                                                         <tr>
                                                            <td>Alamat Pengiriman</td>
                                                            <td>:</td>
                                                            <td>
                                                                Jl.Mede No.23 RT.005 RW.04 Petukangan Utara Pesanggrahan
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kurir</td>
                                                            <td>:</td>
                                                            <td>JNE</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ongkos Kirim</td>
                                                            <td>:</td>
                                                            <td>9000</td>
                                                        </tr>
                                                    </table>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Kode Barang</th>
                                                                <th>Ukuran</th>
                                                                <th>Harga</th>
                                                                <th>qty</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>B001</td>
                                                                <td>XL</td>
                                                                <td>120000</td>
                                                                <td>2</td>
                                                                <td>240000</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">Subtotal</td>
                                                                <td>:</td>
                                                                <td>240000</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">Subtotal + Ongkir</td>
                                                                <td>:</td>
                                                                <td>249000</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="6"><a href="#" class="btn btn-primary btn-block">Konfirmasi</a></td>
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
