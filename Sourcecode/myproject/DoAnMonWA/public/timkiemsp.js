$("document").ready(function(){
    
    $(".search").click(function(){
        var search_val = $(".search_value").val();
        /*if (window.location.href.indexOf("xemhang.html") <= -1) {
            window.location.replace('http://localhost/myproject/DoAnMonWA/public/xemhang.html?loai=ĐT');
        }*/
        $.get("php/timkiemsp.php",{
            search_val:search_val
        },function(data,status){
            if(status=="success"){
                $(".showdiv").html(data);
            }else{
                $(".ajax_rs").html("fail to ajax");
            }
        });
        
    });
    
    $("select").change(function(){
        var val1 = $(".gia_ten").find(":selected").val();
        var val2 = $(".thutu").find(":selected").val();
        val1 = val1.toUpperCase();
        val2 = val2.toUpperCase();
        $.get("php/sapxepsp.php",{
            loai:loai,
            gia_ten:val1,
            thutu:val2
        },function(data,status){
            if(status=="success"){
                $(".showdiv").html(data);
            }else{
                $(".ajax_rs").html("fail to ajax!");
            }
        });
    });
    
});