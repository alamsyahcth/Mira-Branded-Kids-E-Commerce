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
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 style="text-align:center;">Tambah Data</h4>
                                        </div>
                                        <div class="card-body">
                                            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/C_MasterProduct/add') ?>" method="post" enctype="multipart/form-data">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                                
                                                            <div class="form-group">
                                                                <label for="id_product" class="control-label">Kode</label>
                                                                <input type="text" name="id_product" id="id_product" class="form-control" readonly="" value="<?php  echo $autonumber; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="alt_product" class="control-label">Nama Alternatif</label>
                                                                <input type="text" name="alt_product" id="alt_product" class="form-control <?php echo form_error('alt_product') ? 'is-invalid' : '' ?>" placeholder="Nama Alternatif">
                                                                <p class="text-danger" style="font-size:8pt;">Pisahkan dengan , dan - Contoh baju-anak, baju-anak-murah</p>
                                                                <div class="invalid-feedback">
                                                                    <?php form_error('alt_product') ?>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label for="nm_product" class="control-label">Nama</label>
                                                                <input type="text" name="nm_product" id="nm_product" class="form-control <?php echo form_error('nm_product') ? 'is-invalid' : '' ?>" placeholder="Nama Barang">
                                                                <div class="invalid-feedback">
                                                                    <?php form_error('nm_product') ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="id_kategori" class="control-label">Kategori</label>
                                                                <select name="id_kategori" id="id_kategori" class="select2 form-control <?php echo form_error('nm_product') ? 'is-invalid' : '' ?>">
                                                                    <?php foreach($kategori as $k) { ?>
                                                                        <option value="<?php echo $k->id_kategori ?>"><?php echo $k->nm_kategori ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    <?php form_error('id_kategori') ?>
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
                                                                <label for="berat" class="control-label">Berat</label>
                                                                <div class="input-group">
                                                                    <input type="number" name="berat" id="berat" class="form-control <?php echo form_error('berat') ? 'is-invalid' : '' ?>" placeholder="Berat Barang" aria-label="Recipient 's username" aria-describedby="basic-addon2">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon2">G</span>
                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        <?php form_error('berat') ?>
                                                                    </div>
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
                                                                <textarea type="textarea" name="deskripsi" id="froala-editor" class="form-control <?php echo form_error('deskripsi') ? 'is-invalid' : '' ?>" placeholder="Deskripsi Barang" rows="9">
                                                                
                                                                </textarea>
                                                                <div class="invalid-feedback">
                                                                    <?php form_error('deskripsi') ?>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <div class="card-title">Data Stok</div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <?php foreach($size as $s) { ?>
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <input type="hidden" name="id_size[]" id="size[]" value="<?php echo $s->id_size ?>" required="">
                                                                            <input type="text" value="<?php echo $s->nm_size ?>" class="form-control" readonly="">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <input type="number" name="stok[]" id="stok[]" value="0" class="form-control" required="">
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <?php } ?>
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
