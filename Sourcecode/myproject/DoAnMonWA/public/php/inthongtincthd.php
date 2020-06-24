<?php
    include 'connect.php';
    $mahd = $_GET['mahd'];
    $sql="select * from cthd,sanpham sp where cthd.masp=sp.masp and mahd=$mahd";
    $result=$conn->query($sql);
    echo "<table>";
    $n=0;
    while($row=$result->fetch_assoc()){
        if($n==0){
            echo "<tr><th colspan='2'>Mã HD</th>";
            echo "<td>$mahd</td></tr>";
            echo "<tr>";
            echo "<th>Tên sản phẩm</th>";
            echo "<th>SL</th>";
            echo "<th>Giá</th>";
            echo "</tr>";
        }
        $n++;
        echo "<tr>";
        echo "<td><a href='chitietsp.html?masp=".$row['MASP']."' target='_blank'>".$row['TENSP']."</a></td>";
        echo "<td>".$row['SL']."</td>";
        echo "<td>".number_format($row['GIASP'] , 0, ',', '.')."</td>";
        echo "</tr>";
    }
    echo "</table>";
?>