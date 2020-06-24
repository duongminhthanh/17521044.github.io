$("document").ready(function(){
    
    $("input[name*='xoacthd']").click(function(){
        var val = confirm("Bạn có muốn xóa dòng này?");
        if(val===true){
            var sl = $(this).parent().parent().find(".sl").text();
            var dongia = $(this).parent().parent().find(".dongia").text();
            tongtien -= parseFloat(dongia)*parseFloat(sl);
            $(".tongtien").text(tongtien);
            $(this).parent().parent().remove();
        }
    });
    
    $(".status div").click(function(){
        var status = $(this).children().val();
        status = status.toUpperCase();
        if(status=="SUCCESS"){
        $(this).css({
            "background-color":"yellowgreen",
            "color":"white",
            "font-weight": "bold"
        });
        $(".status div").not($(this)).css({
            "background-color":"white",
            "color":"black",
            "font-weight": "normal"
        });
        }else if(status=="WAITING"){
            $(this).css({
                "background-color":"yellow",
                "font-weight": "bold"
            });
            $(".status div").not($(this)).css({
            "background-color":"white",
            "color":"black",
            "font-weight": "normal"
            });
        }else{
            $(this).css({
                "background-color":"#DE1F1F",
                "color":"white",
                "font-weight": "bold"
            });
            $(".status div").not($(this)).css({
            "background-color":"white",
            "color":"black",
            "font-weight": "normal"
            });
        }
        $(this).find("input").prop("checked",true);
    });
    
    $(".modify").click(function(){
        var newvalue = $(this).parent().parent().find("input[type=radio]:checked").val();
        
        $.post("php/suadonhang.php",
            {
            mahd:mahd,
            newvalue:newvalue
            },
            function(data,status){
                if(status==="success"){
                    $(".ajax_rs").html(data);
                }else{
                    $(".ajax_rs").text("Fail to ajax!");
                }
            }
        );
        
    });
    
    trangthai = trangthai.toUpperCase();
    
    if(trangthai=="SUCCESS"){
        $(".success input").prop("checked",true);
        $(".success").css({
            "background-color":"yellowgreen",
            "color":"white",
            "font-weight": "bold"
        });
    }else if(trangthai=="WAITING"){
        $(".waiting input").prop("checked",true);
        $(".waiting").css({
            "background-color":"yellow",
            "font-weight": "bold"
        });
    }else{
        $(".fail input").prop("checked",true);
        $(".fail").css({
            "background-color":"#DE1F1F",
            "color":"white",
            "font-weight": "bold"
        });
    }
    
});