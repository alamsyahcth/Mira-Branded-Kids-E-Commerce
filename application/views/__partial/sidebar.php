 <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('index.php/admin/dashboard') ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>

                        <!--Master-->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Master </span></a>
                            <ul aria-expanded="false" class="collapse  first-level" style="padding-left: 20px;">
                                <li class="sidebar-item"><a href="<?php echo base_url('index.php/admin/C_MasterProduct') ?>" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Product </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('index.php/admin/C_MasterKategori') ?>" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Kategori </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('index.php/admin/C_MasterSize') ?>" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Size </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('index.php/admin/C_MasterBank') ?>" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Customer </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('index.php/admin/C_MasterBank') ?>" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Bank </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('index.php/dashboard') ?>" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Admin </span></a></li>

                            </ul>
                        </li>
                        <!--End Master-->

                        <!--Transaksi-->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-message-draw"></i><span class="hide-menu">Transaksi </span></a>
                            <ul aria-expanded="false" class="collapse  first-level" style="padding-left: 20px;">
                                <li class="sidebar-item"><a href="form-basic.html" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Status Pesanan </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('index.php/admin/C_TransaksiPemesanan') ?>" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Pemesanan </span></a></li>
                                <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Pembayaran </span></a></li>
                                <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Retur </span></a></li>

                            </ul>
                        </li>
                        <!--End Transaksi-->

                        <!--Laporan-->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-areaspline"></i><span class="hide-menu">Laporan </span></a>
                            <ul aria-expanded="false" class="collapse  first-level" style="padding-left: 20px;">
                                <li class="sidebar-item"><a href="form-basic.html" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Laporan Data Pemesanan </span></a></li>
                                <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Laporan Penjualan </span></a></li>
                                <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Laporan Retur </span></a></li>
                                <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Laporan Best Seller </span></a></li>
                                <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Laporan data Customer </span></a></li>

                            </ul>
                        </li>
                        <!--End Laporan-->

                        <!--Setting-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('index.php/admin/C_MasterBanner') ?>" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Settings Banner </span></a></li>
                        <!--End Setting-->

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('index.php/admin/login/logout') ?>" aria-expanded="false"><i class="mdi mdi-power"></i><span class="hide-menu">Logout</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
