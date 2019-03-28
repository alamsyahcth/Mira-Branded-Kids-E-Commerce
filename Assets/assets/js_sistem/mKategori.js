var id=0;
$(document).ready(function () {
    $("#loading-simpan,#loading-update,#loading-hapus,#pesan-error,#pesan-error2,#pesan-sukses,#btn-reset").hide();

    //Form Update Tampil
    $('#view').on('click', '.btn-form-update', function () {
        id = $(this).data('id');

        var tr = $(this).closest('tr');
        var kd_kategori = tr.find('.kd_kategori-value').val();
        var nm_kategori = tr.find('.nm_kategori-value').val();

        $('#UpdatekdKategori').val(kd_kategori);
        $('#UpdatenmKategori').val(nm_kategori);
    });

    //Form Delete Tampil
    $('#view').on('click', '.btn-form-delete', function () {
        id = $(this).data('id');
    });

    //Form Add
    $('#btn-simpan').click(function () {
        $('#loading-simpan').show();

        $.ajax({
            url:base_url+'index.php/Master/Kategori/addData',
            type:'POST',
            data: $('#tambah-modal form').serialize(),
            dataType:'JSON',
            beforeSend:function(e){
                if(e && e.overrideMimeType) {
                    e.overrideMimeType('aplication/jsoncharset=UTF-8');
                }
            }, success: function(response){
                $('#loading-simpan').hide();
                if (response.status=='sukses') {
                    $('#view').html(response.html);
                    $('#tambah-modal').modal('hide');
                    $('#pesan-sukses').html(response.pesan).fadeIn().delay(3000).fadeOut();

                } else {
                    $('#pesan-error').html(response.pesan).show();
                }
            }, error: function(xhr, ajaxOptions,thrownError){
                alert(xhr.responseText);
            }
        })
    });


    //Form update
    $('#btn-update').click(function () {
        $('#loading-update').show();

        $.ajax({
            url: base_url +'index.php/Master/Kategori/updateData/'+id,
            type:'POST',
            data:$('#update-modal form').serialize(),
            dataType:'json',
            beforeSend:function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType('aplication/jsoncharset=UTF-8')
                }
            }, success: function (response) {
                $('#loading-update').hide();
                if (response.status == 'sukses') {
                    $('#view').html(response.html);
                    $('#update-modal').modal('hide');
                    $('#pesan-sukses').html(response.pesan).fadeIn().delay(3000).fadeOut();
                } else {
                    $('#pesan-error2').html(response.pesan).show();
                }
            }, error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
            }
        });
    });

    //Form delete
    $('#btn-delete').click(function () {
        $('#loading-hapus').show();

        $.ajax({
            url: base_url + 'index.php/Master/Kategori/deleteData/' + id,
            type: 'GET',
            dataType: 'json',
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType('aplication/jsoncharset=UTF-8')
                }
            }, success: function (response) {
                $('#loading-hapus').hide();
                if (response.status == 'sukses') {
                    $('#view').html(response.html);
                    $('#pesan-sukses').html(response.pesan).fadeIn().delay(3000).fadeOut();
                    $('#form-modal').modal('hide');
                }
            }
        });
    });

    //Menutup Modal Dialog
    $('#update-modal').on('hidden.bs.modal', function(e){
        $('#update-modal input').val('');
    });


});