

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Sell online</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Shopping cart</a></li>
                  <li><a href="#">Store builder</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Mobile commerce</a></li>
                  <li><a href="#">Dropshipping</a></li>
                  <li><a href="#">Website development</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Point of sale</a></li>
                  <li><a href="#">Hardware</a></li>
                  <li><a href="#">Software</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>

          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | Dibuat Dengan <i class="icon-heart" aria-hidden="true"></i> by <a href="<?php echo base_url('index.php/home') ?>" target="_blank" class="text-primary">Mira Branded Store</a>
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