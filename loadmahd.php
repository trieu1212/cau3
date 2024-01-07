<?php
    include('connect.php');
    $sql = "select * from hoadon";
    $result = $con->query($sql);
    while($row=$result->fetch_assoc()){
        echo "<option value='".$row['MAHD']."'>".$row['MAHD']."</option>";
    }
?>