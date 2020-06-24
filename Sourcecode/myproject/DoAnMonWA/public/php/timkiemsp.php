<?php
    include 'connect.php';
    $search_val = $_GET['search_val'];
    $sql = "select * from sanpham, image where image.masp=sanpham.masp and soluong > 0 and tensp like '%$search_val%'";
    $result=$conn->query($sql);
    $n=0;
    while($row = $result->fetch_assoc()){
        if($n==0){
            echo "<div class='showdiv1'>";;
        }
        echo "<div>";
        echo "<a href='chitietsp.html?masp=".$row['MASP']."'>";
        echo "<div><img src=../public/".$row['URL']."></div>";
        echo "</a>";
        echo "<div>".$row['TENSP']."</div>";
        echo "<div><b>".number_format($row['GIASP'] , 0, ',', '.')." VNĐ"."</b></div>";
        echo "<input class='addbtn' type='button' name='".$row['MASP']."' value='Thêm Vào Giỏ Hàng'/>";
        echo "</div>";
        $n++;
        if($n==4||!$row){
            echo "</div>";
            $n = 0;
        }
    }
?>