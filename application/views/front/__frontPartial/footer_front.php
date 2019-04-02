

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 mb-5 mb-lg-0">
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

          <div class="col-lg-3 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Kategori</h3>
              </div>
              <div class="col-md-12 col-lg-12">
                <ul class="list-unstyled">
                <?php foreach($kategori as $items) { ?>
                  <li><a href="<?php echo base_url('index.php/kategori/'.$items->kd_kategori) ?>"><?php echo $items->nm_kategori; ?></a></li>
                <?php } ?>
                </ul>
              </div>

            </div>
          </div>
          <div class="col-md-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Social Media</h3>
              <ul class="list-unstyled">
                <a href="#" class="fa fa-facebook">Facebook</a>
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Info Kontak</h3>
              <ul class="list-unstyled">
                <li class="address">Vila Mutiara, Blok F4 No.3 Pondok Jagung Timur, Serpong, Tangerang Selatan</li>
                <li class="phone">0817 1430 41</li>
                <li class="email">mirabrandedkidsgmail.com</li>
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
                let output='';
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
            let kotaAsal = $('#kota_asal').val();
            let kotaTujuan = $('#kota_tujuan').val();
            let output='';

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
         $('#alert_success').fadeIn().delay(1000).fadeOut();
    </script>
    <!--Fade In Alert-->
    
  </body>
</html>