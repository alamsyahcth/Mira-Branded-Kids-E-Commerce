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
                                            <h4 style="text-align:center;">Data Product</h4>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-hover table-bordered">
                                                <tr>
                                                    <td width="20%">Kode Product</td>
                                                    <td width="5%">:</td>
                                                    <td width="35%"><?php echo $product->id_product ?></td>
                                                    <td width="40%" style="text-align:center;">Gambar Product</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Nama Product</td>
                                                    <td width="5%">:</td>
                                                    <td width="35%"><?php echo $product->nm_product ?></td>
                                                    <td width="40%" style="text-align:center;" rowspan="5"><img src="<?php echo base_url('upload/product/'.$product->gambar) ?>" width="80%"></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Kategori Product</td>
                                                    <td width="5%">:</td>
                                                    <td width="35%"><?php echo $kategori->nm_kategori ?></td>
                                                </tr>

                                                <tr>
                                                    <td width="20%">Harga</td>
                                                    <td width="5%">:</td>
                                                    <td width="35%"><?php echo $product->harga ?></td>
                                                </tr>

                                                 <tr>
                                                    <td width="20%">Berat</td>
                                                    <td width="5%">:</td>
                                                    <td width="35%"><?php echo $product->berat ?></td>
                                                </tr>

                                                 <tr>
                                                    <td width="20%">Deskripsi</td>
                                                    <td width="5%">:</td>
                                                    <td width="35%"><?php echo $product->deskripsi ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 style="text-align:center;">Data Stok Product</h4>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" style="text-align:center;">No</th>
                                                        <th width="45%" style="text-align:center;">Ukuran</th>
                                                        <th width="45%" style="text-align:center;">Jumlah Stok</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=1; foreach($size as $s) { ?>
                                                    <tr>
                                                        <td style="text-align:center;"><?php echo $i++ ?></td>
                                                        <td style="text-align:center;"><?php echo $s->nm_size ?></td>
                                                        <td style="text-align:center;"><?php echo $s->stok ?></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 style="text-align:center;">Comment Product</h4>
                                        </div>
                                        <div class="card-body" style="overflow-y: scroll; height:400px; width:auto;">
                                            <?php foreach($comment as $c) { ?>
                                            <div class="media border p-3">
                                                <img src="<?php echo base_url('upload/1.jpg') ?>" alt="komentar-mira-branded-kids" class="mr-2 mt-3 rounded-circle" style="width:60px;">
                                                <div class="media-body">
                                                    <h4><?php echo $c->nm_customer ?> <small><i>Posted on <?php echo $c->tanggal_comment ?></i></small></h4>
                                                    <p><?php echo $c->isi_comment ?></p>

                                                    <!--Reply Comment-->
                                                    <?php 
                                                        foreach($reply as $p) { 
                                                             if($p->id_comment == $c->id_comment) {
                                                    ?>
                                                    <div class="media p-3">
                                                        <img src="<?php echo base_url('upload/1.jpg') ?>" alt="komentar-mira-branded-kids" class="mr-2 mt-3 rounded-circle" style="width:60px;">
                                                        <div class="media-body">
                                                            <h4><?php echo $p->username ?> <small><i>Posted on <?php echo $p->tanggal_reply ?></i></small></h4>
                                                            <p><?php echo $p->isi_reply ?></p>
                                                        </div>
                                                    </div>
                                                    <?php }} ?>
                                                    <!--Reply Comment-->
                                                    <div class="card">
                                                        <div class="card-footer">
                                                            <form action="<?php echo base_url('index.php/admin/C_MasterProduct/reply') ?>" method="post">
                                                                <input type="hidden" name="id_comment" value="<?php echo $c->id_comment ?>">
                                                                <input type="hidden" name="username" value="<?php echo $this->session->userdata('username') ?>">
                                                                <input type="hidden" name="tanggal_reply" value="<?php echo date('Y-m-d') ?>">
                                                                <input type="hidden" name="id_product" value="<?php echo $product->id_product ?>">
                                                                <textarea type="textarea" name="isi_reply" class="form-control" placeholder="Tuliskan balasan anda tentang komentar ini"></textarea><br>
                                                                <input type="submit" name="kirim" value="Kirim Balasan" class="btn btn-md btn-primary">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <?php } ?>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                    <tr>
                                                        <td colspan="3">
                                                            <a href="<?php echo site_url('admin/C_MasterProduct/') ?>" data-toggle="tooltip" title="Kembali" class="btn btn-primary btn-md">Kembali</a>
                                                        </td>
                                                    </tr>
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
