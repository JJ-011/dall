<?php 
    require('utility/utility.php');
    checkLogin();
    ConnectDB();

    $sql = 'SELECT * FROM booking WHERE user_id 
    = "'.$_SESSION['user']['user_id'].'" ORDER BY No DESC';
    $rs = mysqli_query($conn,$sql);

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPTG Sport</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

<body>
<div class="row">
    <div class="col-sm-0">
    </div>
    <div class="col-8 container mt-3 text-center">
        <h2>รายการจองของฉัน</h2>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>รายการที่</th>
                    <th>ชื่อสนาม</th>
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
                <tr align="left">
                        <td colspan="6">ท่านมีประวัติการจองเวลารวมทั้งสิ้น <?php echo mysqli_num_rows($rs) ?> รายการ</td>
                    </tr>
                </th>
            </tbody>
        </table>
    </div>
</div>
<div class="col-8 container mt-3 text-center"><button class="btn btn-danger" onclick="window.location.href='index.php'">กลับ</button></div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
