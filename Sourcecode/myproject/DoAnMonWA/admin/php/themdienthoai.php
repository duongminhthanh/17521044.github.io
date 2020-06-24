<?php

    include 'connect.php';
    if(isset($_POST['submit'])){
        $img = $_FILES['img']['name'];
        $name = $_POST['name'];
        $manhinh = $_POST['manhinh'];
        $hdh = $_POST['hdh'];
        $camsau = $_POST['camsau'];
        $camtruoc = $_POST['camtruoc'];
        $cpu = $_POST['cpu'];
        $ram = $_POST['ram'];
        $bnt = $_POST['bnt'];
        $thenho = $_POST['thenho'];
        $thesim = $_POST['thesim'];
        $pin = $_POST['pin'];
        $gia = $_POST['gia'];
        $sl = $_POST['sl'];
        
        $sql1 = "insert into sanpham values('NULL','$name','$gia','ĐT','$sl')";
        $result1 = $conn->query($sql1);
        if ($result1===true){
            $masp = $conn->insert_id;
            echo "<script>alert('Thêm sản phẩm thành công!')</script>";
        }else{
            echo "Không thể lấy id: ".$conn->error;
        }
        $url = "image/$img";
        $sql2 = "insert into thongtindienthoai values('NULL','$masp','$manhinh','$hdh','$camsau','$camtruoc','$cpu','$ram','$bnt','$thenho','$thesim','$pin')";
        $sql3 = "insert into image values('NULL','$masp','$url')";
        if($conn->query($sql2)){
            echo "<script>alert('Thêm thông tin thành công!')</script>";
        }else{
            echo "Thêm thông tin không thành công: ".$conn->error;
        }
        
        if($conn->query($sql3)){
            move_uploaded_file($_FILES['img']['tmp_name'],"../../public/image/$img");
            echo "<script>";
            echo "alert('Thêm ảnh thành công!');";
            echo "window.location.replace('http://localhost/myproject/DoAnMonWA/admin/quanlydienthoai.html');";
            echo "</script>";
        }else{
            echo "Thêm ảnh không thành công: ".$conn->error;
        }
    }
    
    $conn->close();
?>