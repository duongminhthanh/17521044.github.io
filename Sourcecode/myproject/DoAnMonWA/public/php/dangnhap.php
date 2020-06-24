<?php
    session_start(); 
    include 'connect.php';
    if(isset($_POST['tendn'])&&isset($_POST['matkhau'])&&$_POST['tendn']!=''&&$_POST['tendn']!=NULL){
        $tendn = $_POST['tendn'];
        $matkhau = $_POST['matkhau'];
        $sql = "select * from khachhang where tendangnhap='$tendn' and matkhau='$matkhau'";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            echo "<span style='font-weight:bold;color:green;font-size:30px;'>Đăng nhập thành công!</span>";
            $row=$result->fetch_assoc();
            $_SESSION['MAKH'] = $row['MAKH'];
            $_SESSION['TENKH'] = $row['TENKH'];
            echo "<script>window.location.replace('trangchu.html');</script>";
        }else{
            echo "<span style='font-weight:bold;color:red;font-size:30px;'>Đăng nhập thất bại!</span>";
        }
    }else{
        echo "Thông tin không hợp lệ!";
    }
?>