$('document').ready(function(){
    
    $("input").not($("input[type=button], input[type=password]")).prop("disabled",true);
    
    $("input[type=button]").click(function(){
        if($(this).parent().find("input[name*='edit']").prop("disabled")===true){
            $(this).parent().find("input[name*='edit']").prop("disabled",false);
            $(this).prop("value","xong");
        }else if($(this).prop("value")==="xong"){
            $(this).parent().find("input[name*='edit']").prop("disabled",true);
            $(this).prop("value","sửa");
            var newvalue = $(this).parent().find("input[name*='edit']").val();
            var name = $(this).parent().find("input[name*='edit']").prop("name");
            $.post(
                "php/suathongtinkhachhang.php",
                {
                    makh:makh,
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
    
    $('.repass').keyup(function(){
        var pass = $('.pass').val();
        var repass = $(this).val();
        $.post('php/kiemtradangky.php',{
            pass:pass,
            repass:repass
        },function(data,status){
            if(status=='success'){
                $('.nhacnho').html(data);
            }else{
                $('.nhacnho').html("Fail to ajax!");
            }
        });
    });
    
    $('.passbtn').click(function(){
        var newvalue = $('.repass').val();
        var pass = $('.pass').val();
        if(newvalue==pass){
            var name = 'edit_mk';
            $.post(
                "php/suathongtinkhachhang.php",
                {
                    makh:makh,
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
        }else{
            $('.nhacnho').html("<span style='color:#DE1F1F;font-weight:bold;'>Mật khẩu nhập lại không đúng!</span>");
        }
    });
    
    $('.xemcthd').click(function(){
       var mahd = $(this).prop('name');
       $.get('php/inthongtincthd.php',{
           mahd:mahd
       },function(data,status){
           if(status=="success"){
               $('.cthd').html(data);
           }else{
               $('.cthd').html("Fail to ajax!");
           }
       });
    });
    
});