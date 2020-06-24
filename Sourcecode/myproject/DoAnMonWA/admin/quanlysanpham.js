$("document").ready(function(){
    
    $(".product-table").on("click",".add_plus",function(){
        var sl = $(this).parent().text();
        parseInt(sl);
        var val = $(this).val();
        var masp = $(this).parent().parent().find(".masp").text();
        if(val=="+"){
            sl++;
            $(this).parent().find(".sl").text(sl);
        }else{
            sl--;
            $(this).parent().find(".sl").text(sl);
        }
        
        $.post("php/suathongtin.php",{
            name:"add_plus",
            newvalue:sl,
            id:masp
        },function(data,status){
            if(status==="success"){
                $(".ajax_rs").html(data);
            }else{
                $(".ajax_rs").text("Fail to ajax!");
            }
        })
        
    });
    
});