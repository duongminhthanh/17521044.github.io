<?php
    include 'connect.php';
    $makh=$_GET['makh'];
    $sql = "select * from khachhang where makh=$makh";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>