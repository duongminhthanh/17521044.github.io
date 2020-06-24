<?php
    error_reporting(0);
    session_start();
    include 'connect.php';
    $makh=$_SESSION['MAKH'];
    $sql = "select * from khachhang where makh=$makh";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>