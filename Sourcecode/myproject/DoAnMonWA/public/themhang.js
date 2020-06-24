$("document").ready(function(){
    
    function themsp(v_this){
        var pro_id = $(v_this).prop("name");
        $.post("php/giohang.php",{
            masp:pro_id
            },
            function(data,status){
                if(status=="success"){
                    $(".ajax_rs").html(data);
                    var sl = parseInt($(".amount").text());
                    sl++;
                    $(".amount").text(sl);
                }else{
                    $(".ajax_rs").text("Fail to ajax!");
                }
        });
    }
    
    $(".showdiv").on("click",".addbtn",function(){
        themsp($(this));
    });
    
    $(".productdetail").on("click",".addbtn",function(){
        themsp($(this));
    });
    
    $(".curhot").on("click",".addbtn",function(){
        themsp($(this));
    });
});