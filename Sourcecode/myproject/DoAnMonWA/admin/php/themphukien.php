<?php

    include 'connect.php';
    if(isset($_POST['submit'])){
        $img = $_FILES['img']['name'];
        $name = $_POST['name'];
        $gia = $_POST['gia'];
        $sl = $_POST['sl'];
        
        $sql1 = "insert into sanpham values('NULL','$name','$gia','PK','$sl')";
        $result1 = $conn->query($sql1);
        if ($result1===true){
            $masp = $conn->insert_id;
            echo "<script>alert('Thêm sản phẩm thành công!')</script>";
        }else{
            echo "Thêm sản phẩm không thành công: ".$conn->error;
        }
        $url = "image/$img";
        $sql2 = "insert into image values('NULL','$masp','$url')";
        
        if($conn->query($sql2)){
            move_uploaded_file($_FILES['img']['tmp_name'],"../../public/image/$img");
            echo "<script>";
            echo "window.location.replace('http://localhost/myproject/DoAnMonWA/admin/chitietphukien.html?mapk=$masp');";
            echo "</script>";
        }else{
            echo "Thêm ảnh không thành công: ".$conn->error;
        }
    }
    
    $conn->close();
?>