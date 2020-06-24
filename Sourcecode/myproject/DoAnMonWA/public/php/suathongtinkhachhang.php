<?php
    session_start();
    include 'connect.php';
    $makh = $_POST['makh'];
    $newvalue = $_POST['newvalue'];
    $name = $_POST['name'];
    switch($name):
        case 'edit_tenkh':
            $sql="update khachhang set tenkh='$newvalue' where makh=$makh";$_SESSION['TENKH']="$newvalue";break;
        case 'edit_mk':
            $sql="update khachhang set matkhau='$newvalue' where makh=$makh";break;
        case 'edit_sdt':
            $checkid = "select * from khachhang where sdt='$newvalue'";
            $checkid_result = $conn->query($checkid);
            if($checkid_result->num_rows>0){
                echo "<script>alert('Số ĐT đã tồn tại!');</script>";
                echo "<script>location.reload();</script>";
                $sql='';
            }else{
                $sql="update khachhang set sdt='$newvalue' where makh=$makh";
            }
            break;
        case 'edit_ngsinh':
            $sql="update khachhang set ngaysinh='$newvalue' where makh=$makh";break;
        case 'edit_diachi':
            $sql="update khachhang set diachi='$newvalue' where makh=$makh";break;
        case 'edit_email':
            $sql="update khachhang set email='$newvalue' where makh=$makh";break;
    endswitch;
    if($sql!=NULL && $sql!='undefined'){
        if($conn->query($sql)){
            echo "<script>alert('Sửa thành công!')</script>";
            if($name=='edit_tenkh'){
                echo "<script>location.reload();</script>";
            }
        }else{
            echo "Sửa không thành công: ".$conn->error;
        }
    }
    
?>