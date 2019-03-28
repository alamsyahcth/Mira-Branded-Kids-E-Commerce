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
                        <h4 class="page-title">Cek Ongkir</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Ongkir</li>
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
                                            <h4 style="text-align:center;">Data Ongkir</h4>
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
                                                                <label for="Ongkir" class="control-label">Provinsi Asal</label>
                                                                <select onChange="getKotaAsal()" id="provinsi_asal" class="form-control provinsi select2">
                                                                
                                                                </select>
                                                            </div>

                                                             <div class="form-group">
                                                                <label for="Ongkir" class="control-label">Kota Asal</label>
                                                                <select id="kota_asal" class="form-control kota select2">
                                                                    <option>Pilih Kota/Kabupaten</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Ongkir" class="control-label">Provinsi Tujuan</label>
                                                                <select onChange="getKotaTujuan()" id="provinsi_tujuan" class="form-control provinsi select2">
                                                                
                                                                </select>
                                                            </div>

                                                             <div class="form-group">
                                                                <label for="Ongkir" class="control-label">Kota Tujuan</label>
                                                                <select id="kota_tujuan" class="form-control kota select2">
                                                                    <option>Pilih Kota/Kabupaten</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Ongkir" class="control-label">Berat</label>
                                                                <input type="number" name="berat" class="form-control" id="berat" placeholder="masukkan berat">
                                                            </div>

                                                             <div class="form-group">
                                                                <label for="Ongkir" class="control-label">Jasa Ekspedisi</label>
                                                                <select onChange="getOngkir()" name="kurir" id="kurir" class="form-control">
                                                                    <option>Pilih Kurir</option>
                                                                    <option value="jne">JNE</option>
                                                                    <option value="pos">POS</option>
                                                                    <option value="tiki">TIKI</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="services" class="control-label">Services</label>
                                                                <select name="services" id="services" class="form-control">
                                                                
                                                                </select>
                                                            </div>

                                                             <div class="form-group">
                                                                <label for="Ongkir" class="control-label">Berat</label>
                                                                <input type="number" name="bayarNow" class="form-control" id="bayarNow" value="300000">
                                                            </div>

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
