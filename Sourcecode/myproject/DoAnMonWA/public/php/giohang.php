<?php 
    session_start(); 
    include 'connect.php';
    if(isset($_POST['masp'])){
        $masp=$_POST['masp'];
        if(isset($_SESSION['cart'][$masp])){
            $sql="select * from sanpham where masp=$masp";
            $result=$conn->query($sql);
            $row = $result->fetch_assoc();
            if($row['SOLUONG'] - $_SESSION['cart'][$masp] > 0){
                $_SESSION['cart'][$masp]++;
                echo "<script>alert('Thêm thành công ".$row['TENSP']." ');</script>";
            }else{
                echo "<script>alert('Sản phẩm đã hết hàng!');</script>";
            }
            
            //print_r($_SESSION['cart'])."<br>";
        }else{
            $sql="select * from sanpham where masp=$masp";
            $result=$conn->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                if($row['SOLUONG']>0){
                    $_SESSION['cart'][$row['MASP']] =1;
                    echo "<script>alert('Thêm thành công ".$row['TENSP']."');</script>";
                }else{
                    echo "<script>alert('Sản phẩm đã hết hàng!');</script>";
                }

                }else{
                    echo "<script>alert('Sản phẩm không tồn tại!');</script>";
                }
            }
    }
    
?>