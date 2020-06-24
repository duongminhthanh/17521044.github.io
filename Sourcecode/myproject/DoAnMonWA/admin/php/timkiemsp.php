<?php
    include 'connect.php';
    $search_val = $_GET['search_val'];
    $loai = $_GET['loai'];
    $sql = "select * from sanpham where masp=$search_val and upper(loai)='$loai'";
    $result=$conn->query($sql);
    echo "<tr>";
    echo "<th>Id sản phẩm</th>";
    echo "<th>Tên sản phẩm</th>";
    echo "<th>Giá</th>";
    echo "<th>Số lượng</th>";
    echo "<th>Thao tác</th>";
    echo "</tr>";
    if(isset($result)&& $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td class='masp'>".$row['MASP']."</td>";
            echo "<td>".$row['TENSP']."</td>";
            echo "<td><b>".number_format($row['GIASP'] , 0, ',', '.')." VNĐ"."</b></td>";
            echo "<td style='font-weight:bold;'>";
            echo "<input class='actionbtn add_plus' style='margin-right:10px;width:25%;' type='button' name='detail' value='-'>";
            echo "<span class='sl'>".$row['SOLUONG']."</span>";
            echo "<input class='actionbtn add_plus' style='margin-left:10px;width:25%;' type='button' name='detail' value='+'>";
            echo "</td>";
            echo "<td>";
            if(strtoupper($loai)=="ĐT"){
                echo "<a href='chitietdienthoai.html?madt=".$row['MASP']."'>";
            }else{
                echo "<a href='chitietphukien.html?mapk=".$row['MASP']."'>";
            }
            echo "<input class='actionbtn' type='button' name='detail' value='Xem'>";
            echo "</a>";
            //echo "<input class='actionbtn' type='button' name='deletecthd' value='Xóa'>";
            echo "</td>";
            echo "</tr>";
        }
    }else{
        $sql = "select * from sanpham where tensp like '%$search_val%' and upper(loai)='$loai'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td class='masp'>".$row['MASP']."</td>";
                echo "<td>".$row['TENSP']."</td>";
                echo "<td><b>".number_format($row['GIASP'] , 0, ',', '.')." VNĐ"."</b></td>";
                echo "<td style='font-weight:bold;'>";
                echo "<input class='actionbtn add_plus' style='margin-right:10px;width:25%;' type='button' name='detail' value='-'>";
                echo "<span class='sl'>".$row['SOLUONG']."</span>";
                echo "<input class='actionbtn add_plus' style='margin-left:10px;width:25%;' type='button' name='detail' value='+'>";
                echo "</td>";
                echo "<td>";
                if(strtoupper($loai)=="ĐT"){
                    echo "<a href='chitietdienthoai.html?madt=".$row['MASP']."'>";
                }else{
                    echo "<a href='chitietphukien.html?mapk=".$row['MASP']."'>";
                }
                echo "<input class='actionbtn' type='button' name='detail' value='Xem'>";
                echo "</a>";
                //echo "<input class='actionbtn' type='button' name='deletecthd' value='Xóa'>";
                echo "</td>";
                echo "</tr>";
        }
        
        }else{
            echo "<script>alert('Không có record nào!');</script>";
        }
    }
    
    
?>