<?php
    include 'connect.php';
    if(isset($_GET['tendn'])){
        $tendn = $_GET['tendn'];
        $sql = "select TENDANGNHAP from khachhang where tendangnhap='$tendn'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            echo "<span style='color:#DE1F1F;font-weight:bold;'>Không thể lấy tên đăng nhập này!</span>";
        }else if($tendn==''){
            echo "Mời bạn nhập tên đăng nhập!";
        }else if(strlen($tendn)>20){
            echo "<span style='color:#DE1F1F;font-weight:bold;'>Tên ĐN không được quá 20 ký tự!</span>";
        }else{
            echo "<span style='background-color:#77ff00;color:white;font-weight:bold;'>Chấp nhận tên đăng nhập!</span>";
        };
    }
    if(isset($_POST['pass'])&&isset($_POST['repass'])){
        $pass = $_POST['pass'];
        $repass = $_POST['repass'];
        if($pass!=$repass){
            echo "<span style='color:#DE1F1F;font-weight:bold;'>Mật khẩu nhập lại không đúng!</span>";
        }else{
            echo "<span style='background-color:#77ff00;font-weight:bold;color:white'>OK!</span>";
        }
    }
    if(isset($_GET['sdt'])){
        $sdt = $_GET['sdt'];
        $sql = "select SDT,TENDANGNHAP from khachhang where sdt='$sdt'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        if($result->num_rows>0 && ($row['TENDANGNHAP']!=''||$row['TENDANGNHAP']!=NULL)){
            echo "<span style='color:#DE1F1F;font-weight:bold;'>Không thể lấy số điện thoại này!</span>";
        }else if($sdt==''||strlen($sdt)<10){
            echo "Mời bạn nhập số điện thoại!";
        }else if(strlen($sdt)>10){
            echo "<span style='color:#DE1F1F;font-weight:bold;'>SĐT không được quá 10 số!</span>";
        }else{
            echo "<span style='background-color:#77ff00;color:white;font-weight:bold;'>Chấp nhận số điện thoại này!</span>";
        };
    }
    if(isset($_GET['email'])){
        $email = $_GET['email'];
        $sql = "select EMAIL from khachhang where email='$email'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            echo "<span style='color:#DE1F1F;font-weight:bold;'>Không thể lấy email này!</span>";
        }else if($email==''){
            echo "Mời bạn nhập email!";
        }else{
            echo "<span style='background-color:#77ff00;color:white;font-weight:bold;'>Chấp nhận email này!</span>";
        };
    }
?>