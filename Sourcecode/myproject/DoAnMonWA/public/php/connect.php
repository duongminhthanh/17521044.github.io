<?php
    $host='localhost';
    $username='root';
    $password='';
    $dbname='bandienthoai';
    $conn = new mysqli($host,$username,$password,$dbname);
    if($conn->connect_error){
        die("Kết nối thất bại: ".$conn->connect_error);
    }
    mysqli_set_charset($conn, 'UTF8');
?>