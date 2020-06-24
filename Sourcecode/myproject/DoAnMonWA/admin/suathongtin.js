  
    function suathongtin(masp,action){
        $("input[type=file]").click(function(){
            $("input[type=submit]").prop("disabled",false);
        });


        $("input[type=button]").click(function(){
                if($(this).parent().find("input[name*='edit']").prop("disabled")===true||$(this).parent().find("select").prop("disabled")===true){
                    $(this).parent().find("input[name*='edit'],select").prop("disabled",false);
                    $(this).prop("value","xong");
                }else if($(this).prop("value")==="xong"){
                    $(this).parent().find("input[name*='edit'],select").prop("disabled",true);
                    $(this).prop("value","sửa");
                    var newvalue = $(this).parent().find("input[name*='edit']").val();
                    if (newvalue===undefined){
                        newvalue = $("select option:selected").val();
                    }
                    var name = $(this).parent().find("input[name*='edit']").prop("name");
                    if (name===undefined){
                        name = $(this).parent().find("select").prop("name");
                    }
                    $.post(
                        action,
                        {
                            id:masp,
                            newvalue:newvalue,
                            name:name
                        },
                        function(data,status){
                            if(status==="success"){
                                $(".ajax_rs").html(data);
                            }else{
                                $(".ajax_rs").text("Fail to ajax!");
                            }
                        }
                    );
                }
        });
    }
