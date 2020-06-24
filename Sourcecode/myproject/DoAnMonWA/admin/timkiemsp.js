$("document").ready(function(){
    
    $(".search").click(function(){
        var search_val = $(".search_value").val();
        $.get("php/timkiemsp.php",{
            search_val:search_val,
            loai:loai
        },function(data,status){
            if(status=="success"){
                $(".product-table").html(data);
            }else{
                $(".product-table").html("fail to ajax");
            }
        });
        
    });
    

    
});