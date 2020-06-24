<?php
    include 'connect.php';
    $phanloai = $_GET['phanloai'];
    if($phanloai=='ALL'){
        echo "<script>location.reload();</script>";
    }else{
        $sql = "select * from hoadon where trangthai='$phanloai'";
        $result=$conn->query($sql);
        echo "<tr>";
        echo "<th>Mã hóa đơn</th>";
        echo "<th>Mã khách hàng</th>";
        echo "<th>Ngày lập</th>";
        echo "<th>Tổng tiền</th>";
        echo "<th>Trạng thái</th>";
        echo "<th>Thao tác</th>";
        echo "</tr>";
        while($row=$result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row['MAHD']."</td>";
            echo "<td>".$row['MAKH']."</td>";
            echo "<td>".$row['NGAYXUAT']."</td>";
            echo "<td style='color:red;font-weight:bold;'>".$row['TONGTIEN']."</td>";
            if(strtoupper($row['TRANGTHAI'])=="SUCCESS"){
                echo "<td style='color:green;font-weight:bold;'>".$row['TRANGTHAI']."</td>";
            }
            else if($row['TRANGTHAI']=="WAITING"){
                echo "<td style='color:#c8d117;font-weight:bold;'>".$row['TRANGTHAI']."</td>";
            }
            else{
                echo "<td style='color:red;font-weight:bold;'>".$row['TRANGTHAI']."</td>";
            }
            echo "<td>";
            echo "<a href='chitietdonhang.html?mahd=".$row['MAHD']."&makh=".$row['MAKH']."'>";
            echo "<input class='actionbtn' type='button' name='detail' value='Xem'>";
            echo "</a>";
            //echo "<input class='actionbtn' type='button' name='delete' value='Xóa'>";
            echo "</td>";
            echo "</tr>";
        }
    }
    
?>