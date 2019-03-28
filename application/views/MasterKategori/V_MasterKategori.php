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
                        <h4 class="page-title">Kategori</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Master</li>
                                    <li class="breadcrumb-item active" aria-current="page">Kategori</li>
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
                                        <!--Buttton
                                        <div class="row">
                                            <div class="col-md-2" style="padding-left:40px; padding-top:10px;"><a href="<?php echo site_url('admin/C_MasterBarang/add') ?>" ><button class="btn btn-primary btn-lg" ><i class="mdi mdi-plus-box"></i> Tambah</button></a></div>

                                            <div class="col-md-2" style="padding-left:0px; padding-top:10px;"><a href="<?php echo base_url('MasterBarang/V_TambahMasterBarang') ?>" ><button class="btn btn-secondary btn-lg" ><i class="mdi mdi-printer"></i></button></a></div>
                                        </div>
                                        Button-->
                                        <div class="row">
                                            <!--Form-->
                                            <div class="col-md-4">
                                                <div id="view" class="col-md-12">
                                                    <div class="card" style="margin:10px; margin-top:50px; border:1px #e8e8e8 solid;">
                                                        <div class="card-header">
                                                            <h4 style="text-align:center;">Tambah Data</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/C_MasterKategori/add') ?>" method="post" enctype="multipart/form-data" role="form">
                                                                <div class="form">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                                
                                                                            <div class="form-group">
                                                                                <label for="kd_kategori" class="control-label">Kode</label>
                                                                                <input type="text" name="kd_kategori" id="kd_kategori" class="form-control" readonly="" value="<?php  echo $autonumber; ?>">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="nm_kategori" class="control-label">Nama</label>
                                                                                <input type="text" name="nm_kategori" id="nm_kategori" class="form-control <?php echo form_error('nm_kategori') ? 'is-invalid' : '' ?>" placeholder="Nama Kategori">
                                                                                <div class="invalid-feedback">
                                                                                    <?php form_error('nm_kategori') ?>
                                                                                </div>
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
                                                                <th style="text-align:center;">Nama Kategori</th>
                                                                <th style="text-align:center;">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $no=1;
                                                                foreach ($kategori as $b) {
                                                            ?>
                                                            <tr>
                                                                <td width="5%" style="vertical-align:center;"><?php echo $no++ ?></td>
                                                                <td width="5%" style="vertical-align:center;"><?php echo $b->kd_kategori ?></td>
                                                                <td width="60%" style="vertical-align:center;"><?php echo $b->nm_kategori ?></td>
                                                                <td width="30%" style="vertical-align:center; text-align:center;">
                                                                    <!--Update-->
                                                                    <a href="<?php echo site_url('admin/C_MasterKategori/edit/'.$b->kd_kategori) ?>" data-toggle="tooltip" title="Update" class="btn btn-info btn-xs"><i class="mdi mdi-pencil"></i></a>

                                                                    <!--Delete-->
                                                                    <a href="#" onclick="deleteConfirm('<?php echo site_url('admin/C_MasterKategori/delete/'.$b->kd_kategori) ?>')" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-xs"><i class="mdi mdi-delete"></i></a>
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
