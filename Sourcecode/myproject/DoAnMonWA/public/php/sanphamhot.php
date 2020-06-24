<?php
    include 'connect.php';
    
    $result=$conn->query($sql);
    $n=0;
    while($row = $result->fetch_assoc()){
        echo "<div class='";
        if($n==0){
            echo "highlight";
        }else{
            echo "sale";
        }
        echo "'>";
        echo "<a href='chitietsp.html?masp=".$row['MASP']."'>";
        echo "<div><img src=".$row['URL']."></div>";
        echo "</a>";
        echo "<div>".$row['TENSP']."</div>";
        echo "<div><b>".number_format($row['GIASP'] , 0, ',', '.')." VNĐ"."</b></div>";
        echo "<input class='addbtn' type='button' name='".$row['MASP']."' value='Thêm Vào Giỏ Hàng'/>";
        echo "</div>";
        $n++;
    }
?>