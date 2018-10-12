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
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "https://oss.kkp.go.id/api_oss_kkp.php",
                "method": "POST",
                "headers": {
                  "Content-Type": "application/json",
                  "cache-control": "no-cache"
                },
                "processData": false,
                "data": JSON.stringify(ajaxData)
            }
            $.ajax({settings}).done(function(resp){
                console.log(res);
                alert('check ok');
            }).error(function(resp){
                console.log('check error');
            });
        }
    });
});

function OpenOptions(ajaxUri) {
    $.ajax({
        method: "OPTIONS",
        contentType: 'application/json',
        headers : {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Methods':'POST, GET, OPTIONS',
            'Access-Control-Max-Age':1000
        },
        url: ajaxUri,
    }).done(function(resp){
        console.log("open options fine!");
        console.log(resp);
    });
}
