$(document).ready(function(){
    $('body').on('blur','input[name=nonib]',function(){
        var word = $(this).val();
        var ajaxUri = "https://oss.kkp.go.id/api_oss_kkp.php";
        if (word.length >= 12 && word.length < 15) {
            var ajaxData = {
                par1: "skppds",
                par2: "cdc749d42feb5e178b1e3b28ac527e11",
                par3: "CekNIBtf",
                nib: word
            };
            $.post(ajaxUri, JSON.stringify(ajaxData)).done(function(resp) {
                $('input[name=nonib]').css('border-color','green');
                var msg = 'NIB Data Valid\n'
                    + resp.data.detail_izin.nama_perseroan
                    + '\nNO NPWP: ' 
                    + resp.data.detail_izin.npwp_perseroan;
                alert(msg);
            }).fail(function(xhr) {
                $('input[name=nonib]').css('border-color','red');
                alert('Nomor Induk Berusaha tidak valid');
            });
        }
    });
});