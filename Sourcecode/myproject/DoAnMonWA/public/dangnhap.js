$('document').ready(function(){
    
    $('.btn').click(function(){
        var tendn = $('.tendn').val();
        var matkhau = $('.matkhau').val();
        $.post('php/dangnhap.php',{
            tendn:tendn,
            matkhau:matkhau
        },function(data,status){
            if(status=='success'){
                $('.ajax_rs').html(data);
            }else{
                $('.ajax_rs').html('Fail to ajax!');
            }
        });
    });
    
});