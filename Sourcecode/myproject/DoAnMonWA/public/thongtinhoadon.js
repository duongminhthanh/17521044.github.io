$('document').ready(function(){
    
    $('.thongtingiaohang').on('change','select[name="info"]',function(){
        var choice = $(this).find(":selected").val();
        $.get("php/thongtingiaohang.php",{
            makh:makh,
            choice:choice
        },function(data,status){
            if(status=='success'){
                $('.thongtingiaohang').html(data);
            }else{
                $('.ajax_rs').html("Fail to ajax");
            }
        });
    });
    
});