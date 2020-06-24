<?php
    include 'connect.php';
    $mahd = $_GET['mahd'];
    $makh = $_GET['makh'];
    
    $sql="select * from cthd where mahd=$mahd";
    $result = $conn->query($sql);
    
    
    
    
?>