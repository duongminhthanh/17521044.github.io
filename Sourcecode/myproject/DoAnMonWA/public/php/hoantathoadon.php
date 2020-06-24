<?php
    session_start();
    include 'connect.php';
    $tenkh = $_GET['tenkh'];
    $sdt = $_GET['sdt'];
    $diachi = $_GET['diachi'];
    $loaikh = 'VL';
    $sql = "select * from khachhang where sdt='$sdt'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $row=$result->fetch_assoc();
        $makh = $row['MAKH'];
        $diachi = $row['DIACHI'];
        $loaikh = 'TV';
        $sql = "update khachhang set diachi='$diachi',loaikh='$loaikh' where makh=$makh";
        $conn->query($sql);
    }else{
        $sql = "insert into khachhang values('','$tenkh','','','$sdt','','$diachi','','$loaikh')";
        if(!$conn->query($sql)){
        echo "Thêm khách hàng không thành công: ".$conn->error;
        }
        $makh = $conn->insert_id;
    }

    $ngayxuat = date("Y-m-d");
    $sql1 = "insert into hoadon values ('','$makh','$ngayxuat',0,'WAITING')";
    if(!$conn->query($sql1)){
        echo "Thêm hóa đơn không thành công: ".$conn->error;
    }

    $mahd = $conn->insert_id;
    foreach($_SESSION['cart'] as $masp => $sl){
        if ($sl==0){
            unset($_SESSION['cart'][$masp]);
        }
    }
    foreach($_SESSION['cart'] as $masp => $sl){
        $sl= intval($sl);
        $sql2 = "insert into cthd values('$masp','$mahd',$sl)";
        $sql3 = "update sanpham set soluong=soluong-$sl where masp=$masp";
        if(!$conn->query($sql2)){
            echo "Thêm cthd không thành công: ".$conn->error;
        }
        if(!$conn->query($sql3)){
            echo "Giảm số lượng không thành công: ".$conn->error;
        }
        unset($_SESSION['cart'][$masp]);
    }
    echo "<script>alert('Chân thành cảm ơn quý khách đã mua sản phẩm tại cửa hàng!');</script>";
    echo "<script>window.location.replace('http://localhost/myproject/DoAnMonWA/public/trangchu.html');</script>";
    
?>