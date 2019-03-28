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
                                        <div class="card-header">
                                            <h4 style="text-align:center;">Tambah Data</h4>
                                        </div>
                                        <div class="card-body">
                                            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/C_MasterBarang/add') ?>" method="post" enctype="multipart/form-data">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                                
                                                            <div class="form-group">
                                                                <label for="id_barang" class="control-label">Kode</label>
                                                                <input type="text" name="id_barang" id="id_barang" class="form-control" readonly="" value="<?php  echo $autonumber; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="nm_barang" class="control-label">Nama</label>
                                                                <input type="text" name="nm_barang" id="nm_barang" class="form-control <?php echo form_error('nm_barang') ? 'is-invalid' : '' ?>" placeholder="Nama Barang">
                                                                <div class="invalid-feedback">
                                                                    <?php form_error('nm_barang') ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="harga" class="control-label">Harga</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                                                    </div>
                                                                    <input type="number" name="harga" id="harga" class="form-control <?php echo form_error('harga') ? 'is-invalid' : '' ?>" placeholder="Harga Barang" aria-describedby="basic-addon1">
                                                                    <div class="invalid-feedback">
                                                                        <?php form_error('harga') ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="nm_barang" class="control-label">Stok</label>
                                                                <input type="number" name="stok" id="stok" class="form-control <?php echo form_error('stok') ? 'is-invalid' : '' ?>" placeholder="Stok Barang">
                                                                <div class="invalid-feedback">
                                                                    <?php form_error('stok') ?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nm_barang" class="control-label">Gambar</label>
                                                                <input type="file" name="gambar" class="form-control" id="gambar" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="deskripsi" class="control-label">Deskripsi</label>
                                                                <textarea type="textarea" name="deskripsi" id="deskripsi" class="form-control <?php echo form_error('deskripsi') ? 'is-invalid' : '' ?>" placeholder="Deskripsi Barang" rows="9"></textarea>
                                                                <div class="invalid-feedback">
                                                                    <?php form_error('deskripsi') ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
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
