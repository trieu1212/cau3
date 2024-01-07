<?php
    include('connect.php');
    $MAHD = $_POST['MAHD'];
    $MAPHONG = $_POST['MAPHONG'];
    $con->query("update phong set TINHTRANG = 'trống' where MAPHONG='$MAPHONG'");
    $con->query("delete from thue where MAHD = '$MAHD' and MAPHONG = '$MAPHONG'");
?>