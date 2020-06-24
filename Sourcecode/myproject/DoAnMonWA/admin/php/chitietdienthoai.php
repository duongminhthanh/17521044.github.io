<?php
    include 'connect.php';
    $madt=$_GET['madt'];
    $sql = "select * from thongtindienthoai tt, sanpham sp where tt.masp=sp.masp and sp.masp=$madt";
    $sql2 = "select url from image where masp=$madt";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    $row = $result->fetch_assoc();
    $row2 = $result2->fetch_array();
?>