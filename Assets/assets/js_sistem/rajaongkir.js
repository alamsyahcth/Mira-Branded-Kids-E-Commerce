$(function () {
    $.get("<?php echo site_url(admin/C_DataOngkir/getProvinsi) ?>",{},(response)=>{
        console.log(response)
    })
})