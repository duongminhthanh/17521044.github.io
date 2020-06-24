<?php
    session_start();
    if(isset($_SESSION['MAKH'])&&isset($_SESSION['TENKH'])){
        unset($_SESSION['MAKH']);
        unset($_SESSION['TENKH']);
        header('Location: ../trangchu.html', true, 301);
    }
    
?>

