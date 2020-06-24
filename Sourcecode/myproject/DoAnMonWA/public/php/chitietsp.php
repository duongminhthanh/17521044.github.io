<?php
    include 'connect.php';
    $masp=$_GET['masp'];
    $sql = "select * from thongtindienthoai tt, sanpham sp where tt.masp=sp.masp and sp.masp=$masp";
    $sql2 = "select url from image where masp=$masp";
    $result = $conn->query($sql);
    if($result->num_rows<1){
        $sql="select * from sanpham where masp=$masp";
        $result = $conn->query($sql);
    }
    $result2 = $conn->query($sql2);
    $row = $result->fetch_assoc();
    $row2 = $result2->fetch_array();
    
    
    
?>