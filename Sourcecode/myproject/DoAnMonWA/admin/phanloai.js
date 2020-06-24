$('document').ready(function(){
    
    $('select[name="phanloai"]').change(function(){
        var phanloai = $(this).val();
        $.get("php/phanloaidonhang.php",{
            phanloai:phanloai
        },function(data,status){
            if(status=="success"){
                $('.product-table').html(data);
            }else{
                $('.product-table').html("Fail to ajax");
            }
        })
    });
    
});