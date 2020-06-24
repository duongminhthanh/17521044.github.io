function validateForm(e){
    var tenkh = $("input[name='tenkh']").val();
    var tendn = $("input[name='tendn']").val();
    var pass = $("input[name='pass']").val();
    var repass = $("input[name='repass']").val();
    var ngsinh = $("input[name='ngsinh']").val();
    var sdt = $("input[name='sdt']").val();
    var diachi = $("input[name='diachi']").val();
    var email = $("input[name='email']").val();
    if (tenkh == null || tenkh ==""){
        alert('Bạn chưa nhập tên!');
        e.preventDefault();  
        return false;
    }
    if (tendn == null || tendn ==""){
        alert('Bạn chưa nhập tài khoản!');
        e.preventDefault();  
        return false;
    }
    var n1 = tendn.length;
    if(n1>20){
        alert('Tên đăng nhập không được quá 20 ký tự!');
        e.preventDefault();  
        return false;
    }
    if (pass == null || pass ==""){
        alert('Bạn chưa nhập mật khẩu!');
        e.preventDefault();  
        return false;
    }
    if (repass == null || repass ==""){
        alert('Bạn chưa nhập lại mật khẩu!');
        e.preventDefault();  
        return false;
    }
    if(pass!=repass){
        alert('Nhập lại mật khẩu không đúng!');
        e.preventDefault();  
        return false;
    }
    if (sdt == null || sdt ==""){
        alert('Bạn chưa nhập số điện thoại!');
        e.preventDefault();  
        return false;
    }
    var n = sdt.length;
    if(n!=10){
        alert('Số điện thoại phải đủ 10 số!');
        e.preventDefault();  
        return false;
    }
    if (ngsinh == null || ngsinh ==""){
        alert('Bạn chưa nhập ngày sinh!');
        e.preventDefault();  
        return false;
    }
    if (diachi == null || diachi ==""){
        alert('Bạn chưa nhập địa chỉ!');
        e.preventDefault();  
        return false;
    }
    if (email == null || email ==""){
        alert('Bạn chưa nhập email!');
        e.preventDefault();  
        return false;
    }
}

$('document').ready(function(){
    
    $('.tendn').keyup(function(){
        var tendn = $(this).val();
        $.get('php/kiemtradangky.php',{
            tendn:tendn
        },function(data,status){
            if(status=='success'){
                $('.nhacnho').html(data);
            }else{
                $('.nhacnho').html("Fail to ajax!");
            }
        });
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
    
    $('.sdt').keyup(function(){
        var sdt = $(this).val();
        $.get('php/kiemtradangky.php',{
            sdt:sdt
        },function(data,status){
            if(status=='success'){
                $('.nhacnho').html(data);
            }else{
                $('.nhacnho').html("Fail to ajax!");
            }
        });
    });
    
    $('.email').keyup(function(){
        var email = $(this).val();
        $.get('php/kiemtradangky.php',{
            email:email
        },function(data,status){
            if(status=='success'){
                $('.nhacnho').html(data);
            }else{
                $('.nhacnho').html("Fail to ajax!");
            }
        });
    });
    
});