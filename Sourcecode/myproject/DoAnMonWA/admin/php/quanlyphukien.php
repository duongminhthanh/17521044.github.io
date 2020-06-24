<?php
    include 'connect.php';
    $sql = "select * from sanpham where upper(loai)='PK'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td class='masp'>".$row['MASP']."</td>";
            echo "<td>".$row['TENSP']."</td>";
            echo "<td><b>".number_format($row['GIASP'] , 0, ',', '.')." VNĐ"."</b></td>";
            echo "<td style='min-width:80px;'>";
            echo "<input class='actionbtn add_plus' style='margin-right:7px;width:25%;' type='button' name='detail' value='-'>";
            echo "<span class='sl'>".$row['SOLUONG']."</span>";
            echo "<input class='actionbtn add_plus' style='margin-left:7px;width:25%;' type='button' name='detail' value='+'>";
            echo "</td>";
            echo "<td>";
            echo "<a href='chitietphukien.html?mapk=".$row['MASP']."'>";
            echo "<input class='actionbtn' type='button' name='detail' value='Xem'>";
            echo "</a>";
            //echo "<input class='actionbtn' type='button' name='deletecthd' value='Xóa'>";
            echo "</td>";
            echo "</tr>";
        }
    }
    else{
        echo "Không có record nào!";
    }

    $conn->close();
?>