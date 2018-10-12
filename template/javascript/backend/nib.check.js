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
            $.post( ajaxUri, ajaxData).done(function( data ) {
                alert( "Data Loaded: " + data );
            });
        }
    });
});