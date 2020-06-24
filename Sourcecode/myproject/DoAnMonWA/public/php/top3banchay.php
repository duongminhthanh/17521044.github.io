<?php
    include 'connect.php';
    $result=$conn->query($sql);
    while($row = $result->fetch_assoc()){
        echo "<li class='list'><a href='chitietsp.html?masp=".$row['MASP']."'>".$row['TENSP']."</a></li>";
    }
?>