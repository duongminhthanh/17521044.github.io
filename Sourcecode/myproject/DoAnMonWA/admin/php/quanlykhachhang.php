<?php
    include 'connect.php';
    $sql = "select * from khachhang";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['MAKH']."</td>";
        echo "<td>".$row['TENKH']."</td>";
        echo "<td>".$row['SDT']."</td>";
        if(strtoupper($row['LOAIKH'])==="TV"){
            echo "<td>Thành Viên</td>";
        }
        else{
            echo "<td>Vãng Lai</td>";
        }
        echo "<td>";
        echo "<a href='chitietkhachhang.html?makh=".$row['MAKH']."'>";
        echo "<input class='actionbtn' type='button' name='detail' value='Xem'>";
        echo "</a>";
        //echo "<input class='actionbtn' type='button' name='delete' value='Xóa'>";
        echo "</td>";
        echo "</tr>";
    }
    $conn->close();
?>