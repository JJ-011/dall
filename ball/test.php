<?php
    require('utility/utility.php');
    ConnectDB();

    $user_name = "Login"; 
    if(isset($_SESSION['user'])) {
        $user_name = $_SESSION['user']['user_name']; 
        $login_url = "logout.php"; 
    } else {
        $login_url = "login.php"; 
    }

    $sql = 'SELECT * FROM stadium WHERE stadium_id = "'.$_GET['stadium_id'].'"';
    $rs = mysqli_query($conn,$sql);
    $_SESSION['stadium'] = mysqli_fetch_assoc($rs);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>หน้าหลัก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header>
        <h2 class="logo" >Football Field</h2>
        <nav class="navigation">
            <a href="index.php" >หน้าหลัก</a>
            <a href="test2.php" >รายการจอง</a>
            <p class="btnname-popup center color: white;" >ชื่อผู้ใช้ <?php echo $user_name; ?></p>
            <a href="<?php echo $login_url; ?>" class="btnLogin-popup" style="text-align: center; display: block; padding-top: 10px;">logout</a>
        </nav>
    </header>
    <style>
        body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;
    background: url('img/ball.jpg') no-repeat;
    background-position: center;
    background-size: cover;
}

header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 100px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 99;
}

.logo {
    font-size: 2em;
    color: #fff;
    user-select: none;
}
.navigation {
    display: flex;
    align-items: center;
}
.navigation a {
    position: relative;
    font-size: 1.1em;
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    margin-left: 40px;
}

.navigation a::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 100%;
    height: 3px;
    background: #ffffff;
    border-radius: 5px;
    transform-origin: right;
    transform: scaleX(0);
    transition: transform 0.3s;
}

.navigation a:hover::after {
    transform-origin: left;
    transform: scaleX(1);
}

.navigation .btnLogin-popup {
    width: 130px;
    height: 50px;
    background: transparent;
    border: 2px solid #ffffff;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1.1em;
    color: #ffffff;
    font-weight: 500;
    margin-left: 40px;
    transition: 0.5s;
}

.navigation .btnLogin-popup:hover {
    background: #ffffff;
    color: #162938;
}
.navigation .btnname-popup 
{
    font-size: 1.2em;
    color: #ffffff;
    padding-top: 15px;
    padding-left: 20px;
}

        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .table-success {
            background-color: #d4edda !important;
        }
        
        .table-primary {
            background-color: #b8daff !important;
        }
        
        .table-danger {
            background-color: #f8d7da !important;
        }
        
        .btn {
            padding: 10px;
        }
    </style>
<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-9 container mt-4 text-center row">
        <div class="col-12 mt-3 text-center row">
            <h3>จองสนาม : <?php echo $_SESSION['stadium']['stadium_name'] ?></h3>
            <table class="table table-info border-darks text-center" style="height: 60vh;">
            
                <tr valign="middle"><th></th>
                    <th>16:00 - 17:00</th>
                    <th>17:00 - 18:00</th>
                    <th>18:00 - 19:00</th>
                    <th>19:00 - 20:00</th>
                    <th>20:00 - 21:00</th> 
                    <th>21:00 - 22:00</th>
                </tr>
            
            
                <?php $n=0; while($n < 7){ 
                    $day = date('Y-m-d', strtotime("+$n day"));
                    $dayx = date('Y-m-d', strtotime($day));
                    $sql = 'SELECT * FROM program WHERE stadium_id = "'.$_GET['stadium_id'].'" and day="'.$day.'" ';
                    $rs = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rs)==0){
                        $sql = 'INSERT INTO program (stadium_id,day,time1,time2,time3,time4,time5,time6)
                            VALUES ("'.$_GET['stadium_id'].'",
                                    "'.$dayx.'",
                                    "ว่าง","ว่าง","ว่าง","ว่าง",
                                    "ว่าง","ว่าง")';
                            mysqli_query($GLOBALS['conn'],$sql);
                    }

                    $sql = 'SELECT * FROM program WHERE stadium_id = "'
                    .$_GET['stadium_id'].'" and day="'.$day.'" ';
                    $rs = mysqli_query($GLOBALS['conn'],$sql);
                    $row = mysqli_fetch_assoc($rs);
                ?>
                <tr valign="middle">
                    <td>วันที่ <?php echo date('d-m-Y', strtotime("+$n day")); ?></td>

                    <td <?php if($row['time1']=="จองแล้ว"){echo "class='table-danger'";}
                    if($row['time1']=="ว่าง"){echo "class='table-success'";}
                    if($row['time1']=="ปรับปรุง"){echo "class='table-danger'";} ?>>
                        <?php if($row['time1']=="จองแล้ว"){
                            $sql = 'SELECT * FROM booking WHERE stadium_id = "'.$_GET['stadium_id'].'" 
                            and day="'.$day.'" and time="'.$choosetime2[0].'"';
                            $rs = mysqli_query($GLOBALS['conn'],$sql);
                            $_SESSION['booking'] = mysqli_fetch_assoc($rs);

                            $sql = 'SELECT * FROM users WHERE user_id = "'.$_SESSION['booking']['user_id'].'"';
                            $rs = mysqli_query($GLOBALS['conn'],$sql);
                            $_SESSION['showuser'] = mysqli_fetch_assoc($rs);

                            echo "จองแล้ว <br> โดย ".$_SESSION['showuser']['user_name'];}
                        if($row['time1']=="ว่าง"){echo "<a href='jong.php?stadium_id=".$_GET['stadium_id']."&day=".$day."&time=1' class='nav-link'>" ; 
                            echo "<button class='btn w-100 h-100'>ว่าง</button>";}  
                        if($row['time1']=="ปรับปรุง"){echo "ปรับปรุง";} ?>
                    </td>
                    <td <?php if($row['time2']=="จองแล้ว"){echo "class='table-danger'";}
                    if($row['time2']=="ว่าง"){echo "class='table-success'";}
                    if($row['time2']=="ปรับปรุง"){echo "class='table-danger'";} ?>>
                        <?php if($row['time2']=="จองแล้ว"){
                            $sql = 'SELECT * FROM booking WHERE stadium_id = "'.$_GET['stadium_id'].'" 
                            and day="'.$day.'" and time="'.$choosetime2[1].'"';
                            $rs = mysqli_query($GLOBALS['conn'],$sql);
                            $_SESSION['booking'] = mysqli_fetch_assoc($rs);

                            $sql = 'SELECT * FROM users WHERE user_id = "'.$_SESSION['booking']['user_id'].'"';
                            $rs = mysqli_query($GLOBALS['conn'],$sql);
                            $_SESSION['showuser'] = mysqli_fetch_assoc($rs);

                            echo "จองแล้ว <br> โดย ".$_SESSION['showuser']['user_name'];}
                        if($row['time2']=="ว่าง"){echo "<a href='jong.php?stadium_id=".$_GET['stadium_id']."&day=".$day."&time=2' class='nav-link'>" ; 
                            echo "<button class='btn w-100 h-100'>ว่าง</button>";}  
                        if($row['time2']=="ปรับปรุง"){echo "ปรับปรุง";} ?>
                    </td>
                    <td <?php if($row['time3']=="จองแล้ว"){echo "class='table-danger'";}
                    if($row['time3']=="ว่าง"){echo "class='table-success'";}
                    if($row['time3']=="ปรับปรุง"){echo "class='table-danger'";} ?>>
                        <?php if($row['time3']=="จองแล้ว"){
                            $sql = 'SELECT * FROM booking WHERE stadium_id = "'.$_GET['stadium_id'].'" 
                            and day="'.$day.'" and time="'.$choosetime2[2].'"';
                            $rs = mysqli_query($GLOBALS['conn'],$sql);
                            $_SESSION['booking'] = mysqli_fetch_assoc($rs);

                            $sql = 'SELECT * FROM users WHERE user_id = "'.$_SESSION['booking']['user_id'].'"';
                            $rs = mysqli_query($GLOBALS['conn'],$sql);
                            $_SESSION['showuser'] = mysqli_fetch_assoc($rs);

                            echo "จองแล้ว <br> โดย ".$_SESSION['showuser']['user_name'];}
                        if($row['time3']=="ว่าง"){echo "<a href='jong.php?stadium_id=".$_GET['stadium_id']."&day=".$day."&time=3' class='nav-link'>" ; 
                            echo "<button class='btn w-100 h-100'>ว่าง</button>";}  
                        if($row['time3']=="ปรับปรุง"){echo "ปรับปรุง";} ?>
                    </td>
                    <td <?php if($row['time4']=="จองแล้ว"){echo "class='table-danger'";}
                    if($row['time4']=="ว่าง"){echo "class='table-success'";}
                    if($row['time4']=="ปรับปรุง"){echo "class='table-danger'";} ?>>
                        <?php if($row['time4']=="จองแล้ว"){
                            $sql = 'SELECT * FROM booking WHERE stadium_id = "'.$_GET['stadium_id'].'" 
                            and day="'.$day.'" and time="'.$choosetime2[3].'"';
                            $rs = mysqli_query($GLOBALS['conn'],$sql);
                            $_SESSION['booking'] = mysqli_fetch_assoc($rs);

                            $sql = 'SELECT * FROM users WHERE user_id = "'.$_SESSION['booking']['user_id'].'"';
                            $rs = mysqli_query($GLOBALS['conn'],$sql);
                            $_SESSION['showuser'] = mysqli_fetch_assoc($rs);

                            echo "จองแล้ว <br> โดย ".$_SESSION['showuser']['user_name'];}
                        if($row['time4']=="ว่าง"){echo "<a href='jong.php?stadium_id=".$_GET['stadium_id']."&day=".$day."&time=4' class='nav-link'>" ; 
                            echo "<button class='btn w-100 h-100'>ว่าง</button>";}  
                        if($row['time4']=="ปรับปรุง"){echo "ปรับปรุง";} ?>
                    </td>
                    <td <?php if($row['time5']=="จองแล้ว"){echo "class='table-danger'";}
                    if($row['time5']=="ว่าง"){echo "class='table-success'";}
                    if($row['time5']=="ปรับปรุง"){echo "class='table-danger'";} ?>>
                        <?php if($row['time5']=="จองแล้ว"){
                            $sql = 'SELECT * FROM booking WHERE stadium_id = "'.$_GET['stadium_id'].'" 
                            and day="'.$day.'" and time="'.$choosetime2[4].'"';
                            $rs = mysqli_query($GLOBALS['conn'],$sql);
                            $_SESSION['booking'] = mysqli_fetch_assoc($rs);

                            $sql = 'SELECT * FROM users WHERE user_id = "'.$_SESSION['booking']['user_id'].'"';
                            $rs = mysqli_query($GLOBALS['conn'],$sql);
                            $_SESSION['showuser'] = mysqli_fetch_assoc($rs);

                            echo "จองแล้ว <br> โดย ".$_SESSION['showuser']['user_name'];}
                        if($row['time5']=="ว่าง"){echo "<a href='jong.php?stadium_id=".$_GET['stadium_id']."&day=".$day."&time=5' class='nav-link'>" ; 
                            echo "<button class='btn w-100 h-100'>ว่าง</button>";}  
                        if($row['time5']=="ปรับปรุง"){echo "ปรับปรุง";} ?>
                    </td>
                    <td <?php if($row['time6']=="จองแล้ว"){echo "class='table-danger'";}
                    if($row['time6']=="ว่าง"){echo "class='table-success'";}
                    if($row['time6']=="ปรับปรุง"){echo "class='table-danger'";} ?>>
                        <?php if($row['time6']=="จองแล้ว"){
                            $sql = 'SELECT * FROM booking WHERE stadium_id = "'.$_GET['stadium_id'].'" 
                            and day="'.$day.'" and time="'.$choosetime2[5].'"';
                            $rs = mysqli_query($GLOBALS['conn'],$sql);
                            $_SESSION['booking'] = mysqli_fetch_assoc($rs);

                            $sql = 'SELECT * FROM users WHERE user_id = "'.$_SESSION['booking']['user_id'].'"';
                            $rs = mysqli_query($GLOBALS['conn'],$sql);
                            $_SESSION['showuser'] = mysqli_fetch_assoc($rs);

                            echo "จองแล้ว <br> โดย ".$_SESSION['showuser']['user_name'];}
                        if($row['time6']=="ว่าง"){echo "<a href='jong.php?stadium_id=".$_GET['stadium_id']."&day=".$day."&time=6' class='nav-link'>" ; 
                            echo "<button class='btn w-100 h-100'>ว่าง</button>";}  
                        if($row['time6']=="ปรับปรุง"){echo "ปรับปรุง";} ?>
                    </td>
                </tr>
                    <?php $n++; } ?>
            
            </table>
            <div class="col-6 col-sm-2"><button class="btn btn-warning" onclick="window.location.href='index.php'">เลือกสนามอื่น</button></div>
            
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
