$(document).ready(function(){
    const URI_SPLIT = window.location.pathname.split( '/' );
    const URI_PATH = '/'+URI_SPLIT[1];
    $('body').on('click','#ajax_upload_file',function(){
        var data        = {};
        var formData    = new FormData();
        var dataFile    = $(this).data('file');
        var dataPath    = $(this).data('path');
        var dataId      = $(this).data('id');
        var dataTbl     = $(this).data('tbl');
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
        $.ajax({
            url: URI_PATH+'/api/file_upload/',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            beforeSend: function(){
                $(this).addClass('disabled');
                $(this).val('uploading.....');
            }
        }).done(function(response){
            location.reload();
        }).error(function(response){
            alert(response);
        });
    });
});
