$("document").ready(function(){
    $(".add_plus").click(function(){
            var sl = $(this).parent().find(".sl").val();
            parseInt(sl);
            var val = $(this).val();
            var masp = $(this).parent().parent().find("input[value='X']").prop("name");
            if(val=="+"){
                sl++;
                $(this).parent().find(".sl").val(sl);
            }else{
                sl--;
                if(sl>0){
                    $(this).parent().find(".sl").val(sl);
                }else{
                    $(this).parent().parent().remove();
                }
                
            }
            
            $.post("php/suagiohang.php",{
                newvalue:sl,
                id:masp
            },function(data,status){
                if(status=="success"){
                    $(".ajax_rs").html(data);
                }else{
                    $(".ajax_rs").text("Fail to ajax!");
                }
            })
    });
    
    $(".sl").focusout(function(){
            var sl = $(this).val();
            parseInt(sl);
            var masp = $(this).parent().parent().find("input[value='X']").prop("name");
            $(this).val(sl);
                
            $.post("php/suagiohang.php",{
                newvalue:sl,
                id:masp
            },function(data,status){
                if(status=="success"){
                    $(".ajax_rs").html(data);
                }else{
                    $(".ajax_rs").text("Fail to ajax!");
                }
            })
    });
    
    $("input[value='X']").click(function(){
        $(this).parent().parent().remove();
        var masp = $(this).prop("name");
        $.post("php/suagiohang.php",{
                newvalue:0,
                id:masp
            },function(data,status){
                if(status=="success"){
                    $(".ajax_rs").html(data);
                }else{
                    $(".ajax_rs").text("Fail to ajax!");
                }
            })
    });
});