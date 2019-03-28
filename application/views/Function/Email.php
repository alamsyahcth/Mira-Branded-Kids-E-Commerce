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
                                <div id="view" class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 style="text-align:center;">Kirim Email</h4>
                                        </div>
                                        <div class="card-body">
                                            <!--Alert-->
                                            <?php if($this->session->flashdata('msg_emailS')) { ?>
                                            <div class="alert" style="background:#32ff7e;" id="alert_s">
                                                <p style="color:#000000;">Email Berhasil Dikirim</p>
                                            </div>
                                            <?php
                                            }
                                            
                                            if($this->session->flashdata('msg_emailF')) {
                                            ?>
                                             <div class="alert" style="background:#ff3838;" id="alert_s">
                                                <p style="color:#ffffff;">Email Gagal Dikirim</p>
                                            </div>
                                            <?php } ?>
                                            <!--Alert-->
                                            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/C_KirimEmail/send') ?>" method="post" role="form">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                                
                                                            <div class="form-group">
                                                                <label for="email asal" class="control-label">Email Asal</label>
                                                                <input type="email" name="email_asal" id="email_asal" class="form-control" readonly="" value="alamsyahcth@gmail.com">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="email_tujuan" class="control-label">Email Tujuan</label>
                                                                <input type="email" name="email_tujuan" id="email_tujuan" class="form-control" placeholder="example@mail.com" required="">
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label for="subject" class="control-label">Subject</label>
                                                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject Email" required="">
                                                            </div>
                                                            <!--<div class="form-group">
                                                                <label for="isi" class="control-label">Isi Email</label>
                                                                <textarea type="textarea" name="isi" id="isi" class="form-control" placeholder="Isi Email" rows=5></textarea>
                                                            </div>-->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="submit" name="kirim" id="kirim" value="Kirim" class="btn btn-primary btn-md">
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
