<?php
    include 'connect.php';
    $sql="select tensp,sum(sl) as sl from cthd, sanpham, hoadon where cthd.masp=sanpham.masp and cthd.mahd=hoadon.mahd and upper(trangthai)='SUCCESS' and upper(loai)='ĐT' group by sanpham.masp order by sum(sl) desc limit 5";
    $result = $conn->query($sql);
    $dt_ten=array();
    $dt_sl = array();
    while($row=$result->fetch_assoc()){
        array_push($dt_ten,$row['tensp']);
        array_push($dt_sl,$row['sl']);
    }
    $dt_ten=json_encode($dt_ten);
    $dt_sl=json_encode($dt_sl);
    
    $sql2="select tensp,sum(sl) as sl from cthd, sanpham, hoadon where cthd.masp=sanpham.masp and hoadon.mahd = cthd.mahd and upper(trangthai)='SUCCESS' and upper(loai)='PK' group by sanpham.masp order by sum(sl) desc limit 5";
    $result2 = $conn->query($sql2);
    $pk_ten=array();
    $pk_sl = array();
    while($row2=$result2->fetch_assoc()){
        array_push($pk_ten,$row2['tensp']);
        array_push($pk_sl,$row2['sl']);
    }
    $pk_ten=json_encode($pk_ten);
    $pk_sl=json_encode($pk_sl);
?>