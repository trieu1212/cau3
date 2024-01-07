<?php
    include('connect.php');
    $MAHD=$_GET['MAHD'];
    $sql = "select * from phong join thue on phong.MAPHONG=thue.MAPHONG where thue.MAHD='$MAHD' and TINHTRANG='đã thêm'";
    $result = $con->query($sql);
    $i=1;
    if($result){
        while($row=$result->fetch_assoc()){
            echo "<tr id='row_".$row['MAPHONG']."'>
                <td>".$i++."</td>
                <td>".$row['MAPHONG']."</td>
                <td>".$row['TENPHONG']."</td>
                <td>
                    <button class='del' data-maphong='".$row['MAPHONG']."'>Xóa</button>
                  </td>
                </tr>";
        }
    }
?>
