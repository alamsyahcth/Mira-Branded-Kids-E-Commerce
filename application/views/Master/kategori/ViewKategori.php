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
                                <div class="col-md-4">
                                    <div class="card" style="padding:10px;">
                                        <div class="card-header">
                                            <div class="col-md-12"><h3 style="text-align:center; vertical-align:middle;a">Tambah Data</h3></div>
                                        </div>
                                        <div class="card-body">
                                            <form action="<?php echo base_url().'index.php/Master/Kategori/Insert'?>" method="post" class="form-horizontal">
                                                <div class="form">
                                                    <div class="form-group">
                                                        <label for="kd_kategori" class="control-label">Kode</label>
                                                        <input type="text" name="kd_kategori" id="kd_kategori" class="form-control" value="<?php echo $autonumber; ?>" readonly="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nm_kategori" class="control-label">Kode</label>
                                                        <input type="text" name="nm_kategori" id="nm_kategori" class="form-control" placeholder="Nama Kategori">
                                                    </div>
                                                        <input type="submit" value="Simpan" name="simpan" id="simpan" class="btn btn-primary btn-md">
                                                        <input type="submit" value="Update" name="update" id="update" class="btn btn-primary btn-md" disabled>
                                                        <input type="reset" value="Batal" name="batal" id="batal" class="btn btn-secondary btn-md">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Start Table-->
                                <div id="view" class="col-md-8">
                                    <div class="card">
                                        <div class="table-responsive" style="padding:30px;">
                                            <table id="dataTableConfig" class="table table-striped table-bordered">
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
                                                        foreach ($model as $m) {
                                                    ?>
                                                    <tr>
                                                        <td width="10%" style="vertical-align:center;"><?php echo $no++ ?></td>
                                                        <td width="20%" style="vertical-align:center;"><?php echo $m->kd_kategori ?></td>
                                                        <td width="40%" style="vertical-align:center;"><?php echo $m->nm_kategori ?></td>
                                                        <td width="30%" style="vertical-align:center; text-align:center;">
                                                            <!--Update-->
                                                            <a href="<?php anchor('index.php/Master/CKategori/TampilUpdate/'.$m->kd_kategori) ?>" class="btn btn-info btn-xs"><i class="mdi mdi-pencil"></i></a>

                                                            <!--Delete-->
                                                            <a href=""<?php anchor('index.php/Master/CKategori/delete/'.$m->kd_kategori) ?>""  class="btn btn-danger btn-xs"><i class="mdi mdi-delete"></i></a>
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
<?php $this->load->view('footer') ?>
