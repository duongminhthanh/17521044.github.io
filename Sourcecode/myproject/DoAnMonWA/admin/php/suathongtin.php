<?php
    
    include 'connect.php';
    $masp = $_POST['id'];
    $newvalue = $_POST['newvalue'];
    $name = $_POST['name'];
    switch($name):
        case 'edit_tensp':
            $sql="update sanpham set tensp='$newvalue' where masp=$masp";break;
        case 'edit_manhinh':
            $sql="update thongtindienthoai set manhinh='$newvalue' where masp=$masp";break;
        case 'edit_hdh':
            $sql="update thongtindienthoai set hedieuhanh='$newvalue' where masp=$masp";break;
        case 'edit_camsau':
            $sql="update thongtindienthoai set camsau='$newvalue' where masp=$masp";break;
        case 'edit_camtruoc':
            $sql="update thongtindienthoai set camtruoc='$newvalue' where masp=$masp";break;
        case 'edit_ram':
            $sql="update thongtindienthoai set ram='$newvalue' where masp=$masp";break;
        case 'edit_bnt':
            $sql="update thongtindienthoai set bonhotrong='$newvalue' where masp=$masp";break;
        case 'edit_thenho':
            $sql="update thongtindienthoai set thenho='$newvalue' where masp=$masp";break;
        case 'edit_thesim':
            $sql="update thongtindienthoai set thesim='$newvalue' where masp=$masp";break;
        case 'edit_pin':
            $sql="update thongtindienthoai set pin='$newvalue' where masp=$masp";break;
        case 'edit_sl':
            $sql="update sanpham set soluong=$newvalue where masp=$masp";break;
        case 'edit_gia':
            $sql="update sanpham set giasp=$newvalue where masp=$masp";break;
        case 'edit_tenkh':
            $sql="update khachhang set tenkh='$newvalue' where makh=$masp";break;
        case 'edit_tendn':
            $checkid = "select * from khachhang where tendangnhap='$newvalue'";
            $checkid_result = $conn->query($checkid);
            if($checkid_result->num_rows>0){
                echo "<script>alert('Tên đăng nhập đã tồn tại!');</script>";
                $sql='';
            }else{
                $sql="update khachhang set tendangnhap='$newvalue' where makh=$masp";
            }
            break;
        case 'edit_mk':
            $sql="update khachhang set matkhau='$newvalue' where makh=$masp";break;
        case 'edit_sdt':
            $checkid = "select * from khachhang where sdt='$newvalue'";
            $checkid_result = $conn->query($checkid);
            if($checkid_result->num_rows>0){
                echo "<script>alert('Số ĐT đã tồn tại!');</script>";
                $sql='';
            }else{
                $sql="update khachhang set sdt='$newvalue' where makh=$masp";
            }
            break;
        case 'edit_ngsinh':
            $sql="update khachhang set ngaysinh='$newvalue' where makh=$masp";break;
        case 'edit_diachi':
            $sql="update khachhang set diachi='$newvalue' where makh=$masp";break;
        case 'edit_email':
            $sql="update khachhang set email='$newvalue' where makh=$masp";break;
        case 'edit_loaikh':
            $sql="update khachhang set loaikh='$newvalue' where makh=$masp";break;
        case 'add_plus':
            $sql="update sanpham set soluong=$newvalue where masp=$masp";break;
    endswitch;
    if($sql!=NULL && $sql!='undefined'){
        if($conn->query($sql)){
            echo "<script>alert('Sửa thành công!')</script>";
        }else{
            echo "Sửa không thành công: ".$conn->error;
        }
    }
    
    $conn->close();
?>