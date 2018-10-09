$(document).ready(function(){
    $('body').on('click','#ajax_upload_file',function(){
        var data        = {};
        var ini         = $(this);
        var formData    = new FormData();
        var dataFile    = ini.data('file');
        var dataPath    = ini.data('path');
        var dataId      = ini.data('id');
        var dataTbl     = ini.data('tbl');
        var idFile      = '#'+dataFile+' ';
        var fileData    = $(idFile+'input[type=file]')[0].files[0];
        var nameAttr    = $(idFile+'input[type=file]').attr('name');
        formData.append('file_upload_path', dataPath);
        formData.append('file_name_attr', nameAttr);
        formData.append('file_submit', 'submit');
        formData.append('file_id', dataId);
        formData.append('file_tbl', dataTbl);
        formData.append('file_field', dataFile);
        formData.append(nameAttr, fileData);
        if (fileData.size > 1024 * 1024 * 4) {
            alert("Ukuran file melebihi batas 4MB");
        } else {
            $.ajax({
                url: BASE_URL+'api/file_upload/',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                type: 'post',
                beforeSend: function(){
                    ini.addClass('disabled');
                    ini.val('Uploading....');
                }
            }).done(function(response){
                alert(response);
                location.reload();
            }).error(function(response){
                console.log(response);
            });
        }
    });
});
