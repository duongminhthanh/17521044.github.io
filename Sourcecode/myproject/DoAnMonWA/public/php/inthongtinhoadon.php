<?php
    session_start();
    $makh=$_SESSION['MAKH'];
    include 'connect.php';
    $sql="select * from hoadon where makh=$makh";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
        echo  "<tr>";
        echo "<td>".$row['MAHD']."</td>";
        echo "<td>".number_format($row['TONGTIEN'] , 0, ',', '.')." VNĐ"."</td>";
        echo "<td>".$row['NGAYXUAT']."</td>";;
        if(strtoupper($row['TRANGTHAI'])=="SUCCESS"){
            echo "<td style='color:green;font-weight:bold;'>THÀNH CÔNG</td>";
        }
        else if($row['TRANGTHAI']=="WAITING"){
            echo "<td style='color:#c8d117;font-weight:bold;'>ĐANG CHỜ</td>";
        }
        else{
            echo "<td style='color:red;font-weight:bold;'>THẤT BẠI</td>";
        }
        echo "<td><input style='width:90%;' class='actionbtn xemcthd' type='button' name='".$row['MAHD']."' value='Xem'></td>";
        echo "</tr>";
    }
?>