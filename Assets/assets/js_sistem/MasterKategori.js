$(document).ready(function() {
    $("#loading-simpan,#loading-update,#loading-hapus,#pesan-error,#pesan-error2,#pesan-sukses,#btn-reset").hide();
    tampil_data();
    $('#dataTableConfig').DataTable();     

    function tampil_data() {
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>index.php/Master/CKategori/viewData',
            async:false,
            dataType:'json',
            success:function(data){
                var html='';
                var i;
                for (i = 0; i<data.length; i++) {
                    html += '<tr>'+
                        '<td width="10%" style="vertical-align:center;">'+i+'</td>'+
                        '<td width="20%" style="vertical-align:center;">'+data[i].kd_kategori+'</td>'+
                        '<td width="50%" style="vertical-align:center;">'+data[i].nm_kategori+'</td>'+
                        '<td width="20%" style="vertical-align:center; text-align:center;">'+
                        '<a href="javascript:void();" data="'+data[i].kd_kategori+'" data-toggle="modal" data-target="#update-modal" class="btn btn-info btn-sm btn-form-update">Update</a>'+
                        '<a href="javascript:void();" data="'+data[i].kd_kategori+'" data-toggle="modal" data-target="#del-modal" class="btn btn-danger btn-sm btn-form-delete">Delete</a>'+
                        '</td>'+
                        '</tr>';
                    
                }
                $('#show-data').html(html);
            }
        });
    }
});