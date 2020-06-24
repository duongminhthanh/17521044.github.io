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
});