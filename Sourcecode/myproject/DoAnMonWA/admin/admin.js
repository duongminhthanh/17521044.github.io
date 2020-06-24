$("document").ready(function(){
    $(".dropdownbtn").click(function(){
        var style=$(".subnav").css("display");
        if(style==="none"){
            $(".subnav").css({"display":"block"});
            $(this).css({"color":"black"});
        }else{
            $(".subnav").css({"display":"none"});
            $(this).css({"color":"red"});
        }
    });
    
    $("input[name*='delete']").click(function(){
        var val = confirm("Bạn có muốn xóa dòng này?");
        if(val===true){
            $(this).parent().parent().remove();
        }
    });
    
    $("input,select").not($("input[type=file],input[type=button],input[type=radio],input[name='searchbar'],select[name='phanloai']")).prop("disabled",true);
    
    /*$("input[name*='modify']").click(function(){
        if($("input[type=text],input[type=number],input[type=date],select").prop("disabled")===true){
            $("input[type=text],input[type=number],input[type=date],select").prop("disabled",false);
            $(this).prop("value","Hoàn Tất");
        }else{
            $("input[type=text],input[type=number],input[type=date],select").prop("disabled",true);
            $(this).prop("value","Chỉnh Sửa");
        }
    });*/
});