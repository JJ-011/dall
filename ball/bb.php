<?php 
    require('utility/utility.php');
    checkLogin();
    ConnectDB();

    $sql = 'SELECT * FROM booking WHERE user_id 
    = "'.$_SESSION['user']['user_id'].'" ORDER BY No DESC';
    $rs = mysqli_query($conn,$sql);

    
?>
<!DOCTYPE html>
<html>
<head>
    <title>โปรแกรมจองสนามฟุตบอลหญ้าเทียม</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">โปรแกรมจองสนามฟุตบอลหญ้าเทียม</h1>
        <div class="row">
            <div class="col-md-6">
                <h2>จองสนาม</h2>
                <form action="booking.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">ชื่อผู้จอง</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="field" class="form-label">เลือกสนาม</label>
                        <select class="form-select" id="field" name="field" required>
                            <option value="field1">สนามใหญ่ 1 สนาม</option>
                            <option value="field2">สนามเล็ก 1 สนาม</option>
                            <option value="field3">สนามเล็ก 2 สนาม</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">วันที่เริ่ม</label>
                        <input type="date" class="form-control" id="date" name="date1" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">วันที่สิ้นสุด</label>
                        <input type="date" class="form-control" id="date" name="date2" required>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">เวลาเริ่ม</label>
                        <input type="time" class="form-control" id="time1" name="time1" required>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">เวลาสิ้นสุด</label>
                        <input type="time" class="form-control" id="time2" name="time2" required>
                    </div>
                    <button type="submit" class="btn btn-primary">จอง</button>
                </form>
            </div>
            <div class="col-6 container mt-3 text-center">
                <h2>รายการจองของฉัน</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>รายการที่</th>
                            <th>สนาม</th>
                            <th>วันที่</th>
                            <th>เวลา</th>
                            <th>ราคา</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $num = mysqli_num_rows($rs); while($row = mysqli_fetch_assoc($rs)){ 
                    $ssql = 'SELECT * FROM stadium WHERE stadium_id="'.$row['stadium_id'].'"';
                    $srs = mysqli_query($GLOBALS['conn'],$ssql);
                    $srow = mysqli_fetch_assoc($srs);    
                ?>
                <tr>
                    <td><?php echo $num ?></td>
                    <td><?php echo $srow['stadium_name'] ?></td>
                    <td><?php echo $row['day'] ?></td>
                    <td><?php echo $row['time'] ?></td>
                    <td><?php echo $row['cost'] ?></td>
                </tr>
                <?php $num--; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>