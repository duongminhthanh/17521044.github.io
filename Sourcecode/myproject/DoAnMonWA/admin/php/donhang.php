<?php
    include 'connect.php';
    $sql="select * from hoadon";
    $result = $conn->query($sql);
     while($row = $result->fetch_assoc()){
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
?>