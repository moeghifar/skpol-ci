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
            console.log(JSON.stringify(ajaxData));
            $.ajax({
                method: "POST",
                contentType: 'application/json',
                headers : {
                    'Content-Type': 'application/json'
                },
                url: ajaxUri,
                data: JSON.stringify(ajaxData)
            }).done(function(resp){
                console.log(res);
                alert('check ok');
            }).error(function(resp){
                console.log('check error');
            });
        }
    });
});
