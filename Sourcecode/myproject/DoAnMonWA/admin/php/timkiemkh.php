<?php
    include 'connect.php';
    $search_val = $_GET['search_val'];
    $sql = "select * from khachhang where makh=$search_val";
    $result=$conn->query($sql);
    echo "<tr>";
    echo "<th>Id khách hàng</th>";
    echo "<th>Tên khách hàng</th>";
    echo "<th>Số điện thoại</th>";
    echo "<th>Loại khách hàng</th>'";
    echo "<th>Thao tác</th>";
    echo "</tr>";
    if(isset($result)&& $result->num_rows>0){
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
    }else{
        $sql = "select * from khachhang where tenkh like '%$search_val%'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
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
        
        }else{
            echo "<script>alert('Không có record nào!');</script>";
        }
    }
?>