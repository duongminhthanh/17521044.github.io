<?php
    $tenkh = $_POST['tenkh'];
    $tendn = $_POST['tendn'];
    $pass = $_POST['pass'];
    $sdt = $_POST['sdt'];
    $ngsinh = $_POST['ngsinh'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];
    $loai = 'VL';
    include 'connect.php';
    $check = "select * from khachhang where sdt='$sdt'";
    $result = $conn->query($check);
    if($result->num_rows>0){
        $checkid = "select * from khachhang where tendangnhap='$tendn'";
        $checkid_result = $conn->query($checkid);
        if($checkid_result->num_rows>0){
            echo "<script>alert('Tên đăng nhập đã tồn tại!');</script>";
        }else{
            $row=$result->fetch_assoc();
            $makh = $row['MAKH'];
            $update = "update khachhang set "
                    . "tenkh='$tenkh',"
                    . "tendangnhap='$tendn',"
                    . "matkhau='$pass',"
                    . "sdt='$sdt',"
                    . "ngaysinh='$ngsinh',"
                    . "diachi='$diachi',"
                    . "email='$email' "
                    . "where makh=$makh";
            if($conn->query($update)){
                echo "<script>";
                echo "alert('Đăng ký tài khoản thành công!');";
                echo "window.location.replace('http://localhost/myproject/DoAnMonWA/public/trangchu.html');";
                echo "</script>";
            }else{
                echo "Đăng ký thất bại: ".$conn->error;
            }
        }
        
    }else{
        $checkid = "select * from khachhang where tendangnhap='$tendn'";
        $checkid_result = $conn->query($checkid);
        if($checkid_result->num_rows>0){
            echo "<script>alert('Tên đăng nhập đã tồn tại!');</script>";
        }else{
            $sql = "insert into khachhang values('','$tenkh','$tendn','$pass','$sdt','$ngsinh','$diachi','$email','$loai')";
            if($conn->query($sql)){
                echo "<script>";
                echo "alert('Đăng ký tài khoản thành công!');";
                echo "window.location.replace('http://localhost/myproject/DoAnMonWA/public/trangchu.html');";
                echo "</script>";
            }else{
                echo "Đăng ký thất bại: ".$conn->error;
            }
        }
    }
    
    $conn->close();
?>