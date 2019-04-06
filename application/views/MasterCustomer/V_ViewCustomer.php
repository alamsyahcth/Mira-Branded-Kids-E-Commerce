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
                        <h4 class="page-title">Customer</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Master</li>
                                    <li class="breadcrumb-item active" aria-current="page">Customer</li>
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
                                        <div class="card-header">
                                            <h4 style="text-align:center;">Data Customer</h4>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-hover table-bordered">
                                                <tr>
                                                    <td width="20%">Nama</td>
                                                    <td width="5%">:</td>
                                                    <td width="35%"><?php echo $customer->nm_customer ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Email</td>
                                                    <td width="5%">:</td>
                                                    <td width="35%"><?php echo $customer->email_customer ?></td>
                                                </tr>

                                                <tr>
                                                    <td width="20%">No Handphone</td>
                                                    <td width="5%">:</td>
                                                    <td width="35%"><?php echo $customer->telp_customer ?></td>
                                                </tr>

                                                 <tr>
                                                    <td width="20%">Alamat</td>
                                                    <td width="5%">:</td>
                                                    <td width="35%"><?php echo $customer->alamat_customer ?></td>
                                                </tr>

                                                 <tr>
                                                    <td width="20%">Kode Pos</td>
                                                    <td width="5%">:</td>
                                                    <td width="35%"><?php echo $customer->kodepos_customer ?></td>
                                                </tr>

                                                <tr>
                                                    <td width="20%">Status</td>
                                                    <td width="5%">:</td>
                                                    <td width="35%">
                                                        <?php if($customer->status_customer == '1'){echo 'Aktif';} else {echo'Tidak Aktif';} ?>
                                                    </td>
                                                </tr>
                                                
                                                <td colspan="3">
                                                    <a href="<?php echo site_url('admin/C_MasterCustomer/') ?>" data-toggle="tooltip" title="Kembali" class="btn btn-primary btn-md">Kembali</a>
                                                </td>
                                            </table>
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
