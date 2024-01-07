<?php
    include('connect.php');
    $sql = "select * from phong where TINHTRANG='trống'";
    $result = $con->query($sql);
    $i=1;
    if($result){
        while($row=$result->fetch_assoc()){
            echo "<tr id='row_".$row['MAPHONG']."'>
                <td>".$i++."</td>
                <td>".$row['MAPHONG']."</td>
                <td>".$row['TENPHONG']."</td>
                <td>
                    <button class='add' data-maphong='".$row['MAPHONG']."'>Thêm</button>
                  </td>
                </tr>";
        }
    }
?>
