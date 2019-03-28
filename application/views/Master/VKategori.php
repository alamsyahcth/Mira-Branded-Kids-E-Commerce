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
                        <div class="card">
                            <div class="col-md-3">
                                <button class="btn btn-primary btn-lg" id="btn-tambah" data-toggle="modal" data-target="#tambah-modal" style="margin: 10px 20px;">Tambah Data</button>
                            </div>
                            <div id="reload" class="col-md-12">
                                <div class="table-responsive">
                                    <table id="dataTableConfig" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">No</th>
                                                <th style="text-align:center;">Kode</th>
                                                <th style="text-align:center;">Nama Kategori</th>
                                                <th style="text-align:center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="show-data">
                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal Tambah-->
                <div id="tambah-modal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    Tambah Data
                                </h4>

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div id="pesan-error" class="alert alert-danger"></div>
                                <form>
                                    <div class="form-group">
                                        <label for="idKategori" class="control-label">Kode</label>
                                        <input type="text" id="TambahkdKategori" class="form-control" value="<?php echo $autonumber ?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nmKategori" class="control-label">Kode</label>
                                        <input type="text" id="TambahnmKategori" class="form-control" placeholder="Nama Kategori">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <div id="loading-simpan">Sedang Menyimpan...</div>

                                <button class="btn btn-primary btn-md" id="btn-simpan">Simpan</button>
                                <button class="btn btn-secondary btn-md" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal Tambah-->

                 <!--Modal Update-->
                <div id="update-modal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    Update Data
                                </h4>

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div id="pesan-error2" class="alert alert-danger"></div>
                                <form>
                                    <div class="form-group">
                                        <label for="idKategori" class="control-label">Kode</label>
                                        <input type="text" id="UpdatekdKategori" class="form-control" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nmKategori" class="control-label">Kode</label>
                                        <input type="text" id="UpdatenmKategori" class="form-control" placeholder="Nama Kategori">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <div id="loading-update">Sedang Mengupdate...</div>

                                <button class="btn btn-primary btn-md" id="btn-update">Update</button>
                                <button class="btn btn-secondary btn-md" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal Update-->

                <!--Modal Delete-->
                <div id="del-modal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    Konfirmasi
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <div id="loading-hapus">Sedang Menghapus...</div>

                                <button class="btn btn-primary btn-md" id="btn-delete">Ya</button>
                                <button class="btn btn-secondary btn-md" data-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal Delete-->

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
