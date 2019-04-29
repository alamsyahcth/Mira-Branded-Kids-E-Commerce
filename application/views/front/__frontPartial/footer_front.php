

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Menu</h3>
              </div>
              <div class="col-md-12 col-lg-12">
                <ul class="list-unstyled">
                  <li><a href="<?php echo base_url('index.php/Home') ?>">Home</a></li>
                  <li><a href="<?php echo base_url('index.php/Konfirmasi') ?>">Konfirmasi Pembayaran</a></li>
                  <li><a href="<?php echo base_url('index.php/Retur') ?>">Retur</a></li>
                  <li><a href="<?php echo base_url('index.php/CaraOrder') ?>">Cara Order</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-lg-2 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Kategori</h3>
              </div>
              <div class="col-md-12 col-lg-12">
                <ul class="list-unstyled">
                <?php foreach($kategori as $items) { ?>
                  <li><a href="<?php echo base_url('index.php/kategori/'.$items->id_kategori) ?>"><?php echo $items->nm_kategori; ?></a></li>
                <?php } ?>
                </ul>
              </div>

            </div>
          </div>

          <div class="col-md-2">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Social Media</h3>
              <ul class="list-unstyled">
                <a href="#" class="fa fa-facebook">Facebook</a>
              </ul>
            </div>
          </div>

          <div class="col-md-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Kritik dan Saran</h3>
              <form class="form-horizontal" action="<?php echo base_url('index.php/home/saran') ?>" method="post">
                <textarea type="textarea" name="isi_saran" class="form-control" placeholder="kritik dan saran"></textarea><br>
                <?php if($this->session->userdata('on') != TRUE) { ?>
                <button type="button" class="btn btn-primary btn-block" disabled>Kritik dan Saran</button>
                <?php } else { ?>
                <input type="submit" name="simpan" value="Kritik dan Saran" class="btn btn-primary btn-block">
                <?php } ?>
              </form>
            </div>
          </div>

          <div class="col-md-3 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Info Kontak</h3>
              <ul class="list-unstyled">
                <li class="address">Vila Mutiara, Blok F4 No.3 Pondok Jagung Timur, Serpong, Tangerang Selatan</li>
                <li class="phone">0817 1430 41</li>
                <li class="email">mirabrandedkids@gmail.com</li>
              </ul>
            </div>

          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | Dibuat Dengan <i class="icon-heart" aria-hidden="true"></i> by <a href="<?php echo base_url('index.php/home') ?>" target="_blank" class="text-primary">Mira Branded Kids</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="<?php echo base_url('Assets/front/js/jquery-3.3.1.min.js') ?>"></script>
  <script src="<?php echo base_url('Assets/front/js/jquery-ui.js') ?>"></script>
  <script src="<?php echo base_url('Assets/front/js/popper.min.js') ?>"></script>
  <script src="<?php echo base_url('Assets/front/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('Assets/front/js/owl.carousel.min.js') ?>"></script>
  <script src="<?php echo base_url('Assets/front/js/jquery.magnific-popup.min.js') ?>"></script>
  <script src="<?php echo base_url('Assets/front/js/aos.js') ?>"></script>

  <script src="<?php echo base_url('Assets/front/js/main.js') ?>"></script>
  
  <!--Update Cart-->
  <script>
    function updateCartItem(obj, rowid) {
      $.get("<?php echo base_url('index.php/cart/updateItemQty/') ?>", {rowid:rowid, qty:obj.value}, function(resp) {
        if (resp == 'ok') {
          location.reload();
        } else{
          alert("Gagal mengupdate cart");
        }
      });
    }
  </script>
  <!--Update Cart-->

  <!--rajaongkir-->
    <script>
         $(function () {
            $.get("<?php echo site_url('Checkout/getProvinsi') ?>",{},(response)=>{
                let output='<option>Pilih Provinsi Pengiriman</option>';
                let provinsi = response.rajaongkir.results
                console.log(response)

                provinsi.map((val,i)=>{
                    output+=`<option value="${val.province_id}">${val.province}</option>`
                })

                $('.provinsi').html(output);
            })
        });

        function getKotaTujuan() {
            let id_provinsi = $('#provinsi_tujuan').val();
            $.get("<?php echo site_url('Checkout/getKota/') ?>"+id_provinsi,{},(response)=>{
                let output='<option>Pilih Kota Pengiriman</option>';
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
            let kotaAsal = $('#kota_asal').val();
            let kotaTujuan = $('#kota_tujuan').val();
            let output='<option>Pilih Service</option>';

             $.get("<?php echo site_url('Checkout/getOngkir/') ?>"+`${kotaAsal}/${kotaTujuan}/${berat}/${kurir}`,{},(response)=>{
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

    <!--Fade In Alert-->
    <script>
         $('#alert_success').fadeIn().delay(3000).fadeOut();
    </script>
    <!--Fade In Alert-->

    <!--Cek Ketersediaan Email-->
    <script>
      $(document).ready(function() {
        $('#email_customer').change(function() {
          var email_customer = $('#email_customer').val();
          if (email_customer != '') {
            $.ajax({
              url:"<?php echo base_url(); ?>index.php/SignUp/cekEmail",
              method:"post",
              data:{'email_customer':email_customer},
              success:function(data) {
                $('#email_result').html(data);
              }
            });
          }
        });
      });
    </script>
    <!--Cek Ketersediaan Email-->

    <!--Tooltip-->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
    <!--Tooltip-->
    
    <!--Grand_total-->
    <script>
      $(document).ready(function() {
        $('#services').change(function() {
          var services = parseInt($('#services').val());
          var total_cart = parseInt($('#total_cart').val());
          
          var data = services+total_cart;
          
          $('#gtotal').val(data);
          $('#dataGtotal').html(data);
        });
      });
    </script>
    <!--Grand_Total-->
    <script>
      function getStok() {
        var ukuranProduct = $('#ukuranProduct').val();
        var id_productdetil = $('#id_productdetil').val();
        $.ajax({
          
        })
      } 
      $(document).ready(function() {
        $('#ukuranProduct').change(function() {
          var ukuranProduct = $('#ukuranProduct').val();
          var id_productdetil = $('#id_productdetil').val();
          $.ajax({
            url:"<?php echo base_url() ?>index.php/DetilProduct/cekProduct/",
            method:"post",
            dataType: "JSON",
            data:{'id_product':id_productdetil,'id_size':ukuranProduct},
            success:function(data){
              //alert(data);
              $('#dataStok').val(data.length);
              
            }
          });
        });
      });
    </script>
    <!--Data Stok-->

    <!--Cek Ketersediaan Order ID-->
    <script>
      $(document).ready(function() {
        $('#id_orderData').change(function() {
          var id_order = $('#id_orderData').val();
          var id_customer = $('#id_customerData').val();
          if (id_order != ''  && id_customer != '') {
            $.ajax({
              url:"<?php echo base_url(); ?>index.php/Konfirmasi/cekOrder",
              method:"post",
              data:{'id_order':id_order,'id_customer':id_customer},
              success:function(data) {
                $('#order_result').html(data);
              }
            });
          }
        });
      });
    </script>
    <!--Cek Ketersediaan Order ID-->
  </body>
</html>