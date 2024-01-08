<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <label for="">Mã hóa đơn</label>
    <select name="MAHD" id="MAHD">
        <?php
        include('connect.php');
        $sql = "select * from hoadon";
        $result = $con->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['MAHD'] . "'>" . $row['MAHD'] . "</option>";
        }
        ?>
    </select>
    <div>
        <h2>Danh sách các phòng còn trống</h2>
        <div>
            <table border="1">
                <tr>
                    <th>STT</th>
                    <th>Mã phòng</th>
                    <th>Tên phòng</th>
                    <th>Chức năng</th>
                </tr>
                <tbody id="dsempty">
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <h2>Danh sách phòng đã thêm</h2>
        <div>
            <table border="1">
                <tr>
                    <th>STT</th>
                    <th>Mã phòng</th>
                    <th>Tên phòng</th>
                    <th>Chức năng</th>
                </tr>
                <tbody id="dsadd">
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            loadphongtrong();
            $('#MAHD').on('change', function() {
                var MAHD = $('#MAHD').val();
                loadphongdathem(MAHD);
            })
        })
        $(document).on('click', '.add', function() {
            var MAPHONG = $(this).data('maphong');
            var MAHD = $('#MAHD').val();
            add(MAHD, MAPHONG);
        })
        $(document).on('click', '.del', function() {
            var MAPHONG = $(this).data('maphong');
            var MAHD = $('#MAHD').val();
            del(MAHD, MAPHONG);
        })
        // load thông tin phòng trống
        function loadphongtrong() {
            $.ajax({
                type: 'GET',
                url: 'loadphongtrong.php',
                success: function(data) {
                    $('#dsempty').html(data);
                }
            })
        }
        //load thông tin phồng đã thêm của hóa đơn
        function loadphongdathem(MAHD) {
            $.ajax({
                type: 'GET',
                url: 'loadphongdathem.php',
                data: {
                    MAHD: MAHD
                },
                success: function(data) {
                    $('#dsadd').html(data);
                }
            })
        }
        // thêm phòng 
        function add(MAHD, MAPHONG) {
            $.ajax({
                type: 'post',
                url: 'add.php',
                data: {
                    MAHD: MAHD,
                    MAPHONG: MAPHONG
                },
                success: function(data) {
                    loadphongtrong();
                    loadphongdathem(MAHD);
                }
            })
        }
        // //xóa phòng khỏi danh sách
        function del(MAHD, MAPHONG) {
            $.ajax({
                type: 'post',
                url: 'del.php',
                data: {
                    MAHD: MAHD,
                    MAPHONG: MAPHONG
                },
                success: function(data) {
                    loadphongtrong();
                    loadphongdathem(MAHD);
                }
            })
        }
    </script>
</body>

</html>