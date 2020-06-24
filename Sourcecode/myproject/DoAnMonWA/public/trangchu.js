$("document").ready(function(){
    
    function paintBtn($this){
        if($this.prop("checked")===true){
            var v_id=$this.prop("id");
            $("label[for='"+v_id+"']").css({
                "background":"white"
            });
            $("label").not($("label[for='"+v_id+"']")).css({
                "background":"transparent"
            });
        }
    };
    
    $("input[type=radio]").change(function(){
        paintBtn($(this));
    });
    
    
    
    setTimeout(function(){
        $("#r2").prop("checked",true);
        paintBtn($("#r2"));
    },3000);
    setTimeout(function(){
        $("#r3").prop("checked",true);
        paintBtn($("#r3"));
    },6000);
    setTimeout(function(){
        $("#r4").prop("checked",true);
        paintBtn($("#r4"));
    },9000);
    setTimeout(function(){
        $("#r1").prop("checked",true);
        paintBtn($("#r1"));
    },12000);
    
    setInterval(function(){
        setTimeout(function(){
            $("#r2").prop("checked",true);
            paintBtn($("#r2"));
        },3000);
        setTimeout(function(){
            $("#r3").prop("checked",true);
            paintBtn($("#r3"));
        },6000);
        setTimeout(function(){
            $("#r4").prop("checked",true);
            paintBtn($("#r4"));
        },9000);
        setTimeout(function(){
            $("#r1").prop("checked",true);
            paintBtn($("#r1"));
        },12000);
    },12000);
    

   
});