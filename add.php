<?php
    include('connect.php');
    $MAHD = $_POST['MAHD'];
    $MAPHONG = $_POST['MAPHONG'];
    $con->query("update phong set TINHTRANG = 'đã thêm' where MAPHONG='$MAPHONG'");
    $con->query("insert into thue (MAHD,MAPHONG) values('$MAHD','$MAPHONG')");
?>