<?php
    include 'connect.php';
    $mapk = $_GET['mapk'];
    $sql = "select * from sanpham where masp=$mapk";
    $sql1 = "select url from image where masp=$mapk";
    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);
    $row = $result->fetch_assoc();
    $row1 = $result1->fetch_array();
?>