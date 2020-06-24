<?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $tendn = $_POST['tendn'];
        $mk = $_POST['mk'];
        $sdt = $_POST['sdt'];
        $ngsinh = $_POST['ngsinh'];
        $diachi = $_POST['diachi'];
        $email = $_POST['email'];
        $loaikh = $_POST['loaikh'];
        
        $checkid = "select * from khachhang where tendangnhap='$tendn'";
        $checkid_result = $conn->query($checkid);
        if($checkid_result->num_rows>0){
            echo "<script>alert('Tên đăng nhập đã tồn tại!');</script>";
        }else{
            $sql = "insert into khachhang values('NULL','$name','$tendn','$mk','$sdt','$ngsinh','$diachi','$email','$loaikh')";
            if($conn->query($sql)){
                echo "<script>";
                echo "alert('Thêm thông tin thành công!');";
                echo "window.location.replace('http://localhost/myproject/DoAnMonWA/admin/quanlykhachhang.html');";
                echo "</script>";
            }else{
                echo "Thêm thông tin không thành công: ".$conn->error;
            }
        }
        
    }
    $conn->close();
?>