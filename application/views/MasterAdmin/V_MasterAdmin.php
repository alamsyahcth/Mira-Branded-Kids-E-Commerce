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
                        <h4 class="page-title">Admin</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Master</li>
                                    <li class="breadcrumb-item active" aria-current="page">Admin</li>
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

                                        <?php if($this->session->flashdata('tambah_fail')) { ?>
                                            <div class="card" style="padding:10px;" id="alert_s">
                                                <div class="alert" role="alert" style="background:#ED2324;">
                                                   <h4 style="color:#3d3d3d"> <?php echo $this->session->flashdata('tambah_fail') ?></h4>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if($this->session->flashdata('del_sukses')) { ?>
                                            <div class="card" style="padding:10px;" id="alert_s">
                                                <div class="alert" role="alert" style="background:#32ff7e;">
                                                    <h4 style="color:#3d3d3d"><?php echo $this->session->flashdata('del_sukses') ?></h4>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if($this->session->flashdata('del_fail')) { ?>
                                            <div class="card" style="padding:10px;" id="alert_s">
                                                <div class="alert alert-danger" role="alert">
                                                    <h4 style="color:#3d3d3d"><?php echo $this->session->flashdata('del_fail') ?></h4>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div class="row">
                                            <!--Form-->
                                            <div class="col-md-4">
                                                <div id="view" class="col-md-12">
                                                    <div class="card" style="margin:10px; margin-top:50px; border:1px #e8e8e8 solid;">
                                                        <div class="card-header">
                                                            <h4 style="text-align:center;">Tambah Data</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/C_MasterAdmin/add') ?>" method="post" enctype="multipart/form-data" role="form">
                                                                <div class="form">
                                                                    <div class="row">
                                                                        <div class="col-md-12">

                                                                            <div class="form-group">
                                                                                <label for="username" class="control-label">Username</label>
                                                                                <input type="text" name="username" id="username" class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" placeholder="Username">
                                                                                <p class="text-danger" style="font-size:8pt;">Maksimal 10 karakter</p>
                                                                                <div class="invalid-feedback">
                                                                                    <?php form_error('username') ?>
                                                                                </div>
                                                                                <div id="pesanUsername"></div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="submit" name="simpan" id="simpan" value="Simpan" class="btn btn-primary btn-md">
                                                                            <input type="reset" name="batal" id="batal" value="Batal" class="btn btn-secondary btn-md">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Form-->

                                            <!--Table-->
                                            <div class="col-md-8">
                                                <div class="table-responsive" style="padding:30px;">
                                                    <table id="dataTableConfig" class="table table-hover table-stripted table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align:center;">No</th>
                                                                <th style="text-align:center;">Username</th>
                                                                <th style="text-align:center;">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $no=1;
                                                                foreach ($admin as $b) {
                                                            ?>
                                                            <tr>
                                                                <td width="5%" style="vertical-align:middle; text-align:center;"><?php echo $no++ ?></td>
                                                                <td width="90%" style="vertical-align:middle; text-align:center;"><?php echo $b->username ?></td>
                                                                <td width="5%" style="vertical-align:middle; text-align:center;">
                                                                    <!--Delete-->
                                                                    <a href="#" onclick="deleteConfirm('<?php echo site_url('admin/C_MasterAdmin/delete/'.$b->username) ?>')" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-xs"><i class="mdi mdi-delete"></i></a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--End Table-->
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
