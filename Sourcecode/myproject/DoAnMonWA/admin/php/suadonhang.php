<?php
    include 'connect.php';
    $trangthai=$_POST['newvalue'];
    $mahd=$_POST['mahd'];
    $sql="update hoadon set trangthai='$trangthai' where mahd=$mahd";
    if($trangthai=="FAIL"){
        $sql1="select * from hoadon, cthd where hoadon.mahd=cthd.mahd";
        $result=$conn->query($sql1);
        while($row=$result->fetch_assoc()){
            $sl = intval($row["SL"]);
            $sql2="update sanpham set soluong=soluong+$sl where masp=".$row['MASP'].";";
            if(!$conn->query($sql2)){
                echo "Sửa số lượng không thành công: ".$conn->error;
            }else{
                echo "<script>location.reload();</script>";
            }
        }
    }
    if($conn->query($sql)){
        echo "<script>alert('Sửa thành công!');</script>";
    }else{
        echo "Sửa không thành công: ".$conn->error;
    }
?>