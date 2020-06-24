<?php
    include 'connect.php';
    if(isset($_SESSION['cart'])){
        $sql="select * from sanpham where masp in(";
        foreach($_SESSION['cart'] as $id => $value){
            $sql.=$id.",";
        }
        
        $thanhtien=0;
        $sql=substr($sql, 0, -1).") order by tensp asc";
        $result = $conn->query($sql);
        if(!$result){
            echo "Bạn không có sản phẩm nào trong giỏ hàng.";
        }else{
            while($row=$result->fetch_assoc()){
                if($_SESSION['cart'][$row['MASP']]>0){
                    $gia = $row['GIASP']*$_SESSION['cart'][$row['MASP']];
                    echo "<tr>";
                    echo "<td>".$row['TENSP']."</td>";

                    if($_SERVER['REQUEST_URI']!="/myproject/DoAnMonWA/public/thongtinhoadon.html"){
                        echo "<td style='min-width:90px;'><input class='actionbtn add_plus' style='margin-right:10px;width:25%;' type='button' name='detail' value='-'>";
                    }else{
                        echo "<td>";
                    }
                    
                    echo "<input class='sl' style='width:33px;font-size:15px;text-align:center;' type=text value='".$_SESSION['cart'][$row['MASP']]."'>";
                    
                    if($_SERVER['REQUEST_URI']!="/myproject/DoAnMonWA/public/thongtinhoadon.html"){
                        echo "<input class='actionbtn add_plus' style='margin-left:10px;width:25%;' type='button' name='detail' value='+'></td>";
                    }else{
                        echo "</td>";
                    }
                    
                    echo "<td>".number_format($gia , 0, ',', '.')." VNĐ"."</td>";
                    
                    if($_SERVER['REQUEST_URI']!="/myproject/DoAnMonWA/public/thongtinhoadon.html"){
                        echo "<td><input class='actionbtn' type='button' name='".$row['MASP']."' value='X'></td>";
                    }
            
                    $thanhtien+=$gia;
            }else{
                echo "";
            }
            
               
        }
        }
        
    }else{
        echo "Giỏ hàng trống";
    }
?>