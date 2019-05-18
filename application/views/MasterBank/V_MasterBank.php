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
                        <h4 class="page-title">Bank</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Master</li>
                                    <li class="breadcrumb-item active" aria-current="page">Bank</li>
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
                                            <div class="card" style="padding:10px;" id="alert_s">
                                                <div class="alert" role="alert" style="background:#32ff7e;">
                                                   <h4 style="color:#3d3d3d"> <?php echo $this->session->flashdata('edit_sukses') ?></h4>
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
                                                            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/C_MasterBank/add') ?>" method="post" enctype="multipart/form-data">
                                                                <div class="form">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                                
                                                                            <div class="form-group">
                                                                                <label for="id_bank" class="control-label">Kode</label>
                                                                                <input type="text" name="id_bank" id="id_bank" class="form-control" readonly="" value="<?php  echo $autonumber; ?>">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="nm_bank" class="control-label">Nama</label>
                                                                                <input type="text" name="nm_bank" id="nm_bank" class="form-control <?php echo form_error('nm_bank') ? 'is-invalid' : '' ?>" placeholder="Nama Bank">
                                                                                <div class="invalid-feedback">
                                                                                    <?php form_error('nm_bank') ?>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="no_rektoko" class="control-label">No Rekening</label>
                                                                                <input type="number" name="no_rektoko" id="no_rektoko" class="form-control <?php echo form_error('no_rektoko') ? 'is-invalid' : '' ?>" placeholder="No Rekening Toko">
                                                                                <div class="invalid-feedback">
                                                                                    <?php form_error('no_rektoko') ?>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="atas_nama" class="control-label">Atas Nama</label>
                                                                                <input type="text" name="atas_nama" id="atas_nama" class="form-control <?php echo form_error('atas_nama') ? 'is-invalid' : '' ?>" placeholder="Atas Nama">
                                                                                <div class="invalid-feedback">
                                                                                    <?php form_error('atas_nama') ?>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="logo_bank" class="control-label">Logo</label>
                                                                                <input type="file" name="logo_bank" id="logo_bank" class="form-control" placeholder="Logo Toko">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="submit" name="simpan" id="simpan" value="Simpan" class="btn btn-primary btn-md">
                                                                            <input type="submit" name="update" id="update" value="Update" class="btn btn-primary btn-md" disabled>
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
                                                                <th style="text-align:center;">Kode</th>
                                                                <th style="text-align:center;">Nama</th>
                                                                <th style="text-align:center;">No Rekening</th>
                                                                <th style="text-align:center;">Atas Nama</th>
                                                                <th style="text-align:center;">Logo</th>
                                                                <th style="text-align:center;">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $no=1;
                                                                foreach ($bank as $b) {
                                                            ?>
                                                            <tr>
                                                                <td width="5%" style="vertical-align:center;"><?php echo $no++ ?></td>
                                                                <td width="5%" style="vertical-align:center;"><?php echo $b->id_bank ?></td>
                                                                <td width="10%" style="vertical-align:center;"><?php echo $b->nm_bank ?></td>
                                                                <td width="30%" style="vertical-align:center;"><?php echo $b->no_rektoko ?></td>
                                                                <td width="30%" style="vertical-align:center;"><?php echo $b->atas_nama ?></td>
                                                                <td width="20%" style="vertical-align:center;"><img src="<?php echo base_url('upload/bank/'.$b->logo_bank) ?>" width="80%"></td>
                                                                <td width="30%" style="vertical-align:center; text-align:center;">
                                                                    <!--Update-->
                                                                    <a href="<?php echo site_url('admin/C_MasterBank/edit/'.$b->id_bank) ?>" data-toggle="tooltip" title="Update" class="btn btn-info btn-xs"><i class="mdi mdi-pencil"></i></a>

                                                                    <!--Delete-->
                                                                    <a href="#" onclick="deleteConfirm('<?php echo site_url('admin/C_MasterBank/delete/'.$b->id_bank) ?>')" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-xs"><i class="mdi mdi-delete"></i></a>
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
