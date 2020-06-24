<?php
    session_start();
    $sl = $_POST['newvalue'];
    $masp = $_POST['id'];
    include 'connect.php';
    $sql = "select SOLUONG from sanpham where masp=$masp";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if($row['SOLUONG']>=$sl){
        $_SESSION['cart'][$masp]=$sl;
        if ($sl<1){
            unset($_SESSION['cart'][$masp]);
        }  
    }else{
        echo "<script>alert('Sản phẩm trong kho không đủ!');</script>";
    }
    echo "<script>location.reload();</script>";
?>