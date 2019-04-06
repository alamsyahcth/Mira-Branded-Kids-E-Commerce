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
                        <h4 class="page-title">Barang</h4>
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
                                        <!--Buttton-->
                                        <div class="row">
                                            <div class="col-md-2" style="padding-left:40px; padding-top:10px;"><a href="<?php echo site_url('admin/C_MasterBarang/add') ?>" ><button class="btn btn-primary btn-lg" ><i class="mdi mdi-plus-box"></i> Tambah</button></a></div>

                                            <div class="col-md-2" style="padding-left:0px; padding-top:10px;"><a href="<?php echo site_url('admin/C_MasterBarang/pdf') ?>" target="_blank" ><button class="btn btn-secondary btn-lg" ><i class="mdi mdi-printer"></i></button></a></div>
                                        </div>
                                        <!--Button-->
                                        <div class="table-responsive" style="padding:30px;">
                                            <table id="dataTableConfig" class="table table-hover table-stripted table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center;">No</th>
                                                        <th style="text-align:center;">Kode</th>
                                                        <th style="text-align:center;">Nama Barang</th>
                                                        <th style="text-align:center;">Harga</th>
                                                        <th style="text-align:center;">Stok</th>
                                                        <th style="text-align:center;">Gambar</th>
                                                        <th style="text-align:center;">Deskripsi</th>
                                                        <th style="text-align:center;">Aksi</th>
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
                                                        <td width="20%" style="vertical-align:center;"><?php echo $b->nm_barang ?></td>
                                                        <td width="10%" style="vertical-align:center;"><?php echo $b->harga ?></td>
                                                        <td width="5%" style="vertical-align:center;">
                                                            <a href="<?php echo site_url('admin/C_MasterBarang/edit/'.$b->id_barang) ?>" data-toggle="tooltip" title="Atur Stok" class="btn btn-warning btn-xs">Data</a>
                                                        </td>
                                                        <td width="15%" style="vertical-align:center;"><img src="<?php echo base_url('upload/barang/'.$b->gambar) ?>" width="30%"></td>
                                                        <td width="20%" style="vertical-align:center;"><?php echo $b->deskripsi ?></td>
                                                        <td width="10%" style="vertical-align:center; text-align:center;">
                                                            <!--Update-->
                                                            <a href="<?php echo site_url('admin/C_MasterBarang/edit/'.$b->id_barang) ?>" data-toggle="tooltip" title="Update" class="btn btn-info btn-xs"><i class="mdi mdi-pencil"></i></a>

                                                            <!--Delete-->
                                                            <a href="#" onclick="deleteConfirm('<?php echo site_url('admin/C_MasterBarang/delete/'.$b->id_barang) ?>')" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-xs"><i class="mdi mdi-delete"></i></a>
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
