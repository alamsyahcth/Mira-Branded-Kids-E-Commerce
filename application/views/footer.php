            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Copyright &copy; liberoslc 2019
                <!--All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.-->
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
   

    <script src="<?php echo base_url('Assets/assets/libs/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('Assets/assets/libs/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('Assets/assets/libs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('Assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('Assets/assets/extra-libs/sparkline/sparkline.js') ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('Assets/dist/js/waves.js') ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url('Assets/dist/js/sidebarmenu.js') ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('Assets/dist/js/custom.min.js') ?>"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js') ?>"></script> -->
    <!-- Charts js Files -->
    <script src="<?php echo base_url('Assets/assets/libs/flot/excanvas.js') ?>"></script>
    <script src="<?php echo base_url('Assets/assets/libs/flot/jquery.flot.js') ?>"></script>
    <script src="<?php echo base_url('Assets/assets/libs/flot/jquery.flot.pie.js') ?>"></script>
    <script src="<?php echo base_url('Assets/assets/libs/flot/jquery.flot.time.js') ?>"></script>
    <script src="<?php echo base_url('Assets/assets/libs/flot/jquery.flot.stack.js') ?>"></script>
    <script src="<?php echo base_url('Assets/assets/libs/flot/jquery.flot.crosshair.js') ?>"></script>
    <script src="<?php echo base_url('Assets/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') ?>"></script>
    <script src="<?php echo base_url('Assets/dist/js/pages/chart/chart-page-init.js') ?>"></script>
    <script src="<?php echo base_url('Assets/assets/extra-libs/DataTables/datatables.min.js') ?>"></script>
    <script src="<?php echo base_url('Assets/froala_editor/js/froala_editor.min.js') ?>"></script>
    
    <!--File Ajax Sistem-->
    <script src="<?php echo base_url('Assets/assets/js_sistem/mKategori.js') ?>"></script>
    
    <!--File Ajax Sistem-->
   

    <!--Data Table-->
    <script>
        $('#dataTableConfig').DataTable();        
    </script>
    <!--Data Table-->

    <!--Tooltip-->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
    <!--Tooltip-->

    <!--Fade In Alert-->
    <script>
         $('#alert_s').fadeIn().delay(3000).fadeOut();
    </script>
    <!--Fade In Alert-->

    <!--Froala Editor-->
    <script>
        $(function() {
            $('textarea#froala-editor').froalaEditor()
        });
    </script>
    <!--Froala Editor-->

    <!--Delete Function-->
    <script>
        function deleteConfirm(url){
            $('#btn-delete').attr('href',url);
            $('#deleteModal').modal();
        }
    </script>
    <!--Delete Function-->

    <!--rajaongkir-->
    <script>
        $(function () {
            $.get("<?php echo site_url('admin/C_DataOngkir/getProvinsi') ?>",{},(response)=>{
                let output='';
                let provinsi = response.rajaongkir.results
                console.log(response)

                provinsi.map((val,i)=>{
                    output+=`<option value="${val.province_id}">${val.province}</option>`
                })

                $('.provinsi').html(output);
            })
        });

        function getKotaAsal() {
            let id_provinsi = $('#provinsi_asal').val();
            $.get("<?php echo site_url('admin/C_DataOngkir/getKota/') ?>"+id_provinsi,{},(response)=>{
                let output='';
                let kota = response.rajaongkir.results
                console.log(response)

                kota.map((val,i)=>{
                    output+=`<option value="${val.city_id}">${val.city_name}</option>`
                })

                $('#kota_asal').html(output);
            })
        }

        function getKotaTujuan() {
            let id_provinsi = $('#provinsi_tujuan').val();
            $.get("<?php echo site_url('admin/C_DataOngkir/getKota/') ?>"+id_provinsi,{},(response)=>{
                let output='';
                let kota = response.rajaongkir.results
                console.log(response)

                kota.map((val,i)=>{
                    output+=`<option value="${val.city_id}">${val.city_name}</option>`
                })

                $('#kota_tujuan').html(output);
            })
        }

        function getOngkir() {
            let berat = $('#berat').val();
            let kurir = $('#kurir').val();
            let kotaAsal = 153;
            let kotaTujuan = $('#kota_tujuan').val();
            let output='';

             $.get("<?php echo site_url('admin/C_DataOngkir/getOngkir/') ?>"+`${kotaAsal}/${kotaTujuan}/${berat}/${kurir}`,{},(response)=>{
                let biaya = response.rajaongkir.results

                biaya.map((val,i)=>{
                    for (let i = 0; i < val.costs.length; i++) {
                        let jenisLayanan = val.costs[i].service;
                        val.costs[i].cost.map((val,i)=>{
                            output+=`<option value="${val.value}">${jenisLayanan} - Rp. ${val.value} - ${val.etd} hari</option>`
                        })
                    }
                    //output+=`<option value="${val.city_id}">${val.city_name} - Rp. ${val.city_name} - ${val.etd} hari</option>`
                })

                $('#services').html(output);
            })
        }
    </script>
    <!--rajaongkir-->
</body>

</html>

<!--Langsung isi di valuenya aja-->