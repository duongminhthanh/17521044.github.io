<?php
    include 'connect.php';
    if(isset($_POST['phone'])){
        $img = $_FILES['img']['name'];
        $masp = $_GET['masp'];
        $url = "image/$img";
        $tim_anh = "select * from image where masp=$masp";
        $result = $conn->query($tim_anh);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            unlink("../../public/".$row['URL']);
            $xoa_anh="delete from image where masp=$masp";
            if($conn->query($xoa_anh)){
                echo "<script>alert('Xóa ảnh cũ thành công!')</script>";
            }else{
                echo "Không thể xóa ảnh cũ: ".$conn->error;
            }
        }
        $them_anh = "insert into image values('NULL','$masp','$url')";
        if($conn->query($them_anh)){
            move_uploaded_file($_FILES['img']['tmp_name'],"../../public/image/$img");
            echo "<script>";
            echo "alert('Thêm ảnh mới thành công!');";
            if($_GET['loai']=="PK"){
                echo "window.location.replace('http://localhost/myproject/DoAnMonWA/admin/chitietphukien.html?mapk=$masp');";
            }else{
                echo "window.location.replace('http://localhost/myproject/DoAnMonWA/admin/chitietdienthoai.html?madt=$masp');";
            }
            
            echo "</script>";
        }else{
            echo "Thêm ảnh không thành công: ".$conn->error;
        }
    }
    $conn->close();
?>