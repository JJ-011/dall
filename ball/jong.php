<?php 
    require('utility/utility.php');
    checkLogin();
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

    if(isset($_POST['btn1'])){
        $day = date('Y-m-d', strtotime($_GET['day']));
        $dayx = date('Y-m-d', strtotime($day));

        echo "<script>
        window.location.href = 'madjam.php?stadium_id=".$_GET['stadium_id']."&day=".$day."&time=".$_GET['time']."';
        </script>";

    }
    if(isset($_POST['btn2'])){
        echo "<script>
        window.location.href = 'test.php?stadium_id=".$_GET['stadium_id']."';
        </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองสนาม</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
    min-height: 100%;
    width: 100%;
    background-color: #FF9966;
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

</style>
<div class="row">
    <div class="col-sm-2" >
    </div>
    <div class="col-8 container mt-4 text-center row">
    <form method="post">
        <div class="col-14 mt-4 text-center row">
            <div class="col-6 mt-4"><br><br><br><?php echo '<img src="./img/'.$_SESSION['stadium']['stadium_pic'].'" class="img-thumbnail">'; ?></div>
            <div class="col-6">
                <br><h3 style="margin-top: 2cm; text-align: left;">จองสนาม : <?php echo $_SESSION['stadium']['stadium_name'] ?></h3>
                <br><h3 style="text-align: left;">รายละเอียด :<p style="margin-left: 0.1  cm"> <?php echo $_SESSION['stadium']['stadium_detail'] ?></p></h3>
                <br><h3 style="margin-top: 1cm; text-align: left;">ราคา : <?php echo $_SESSION['stadium']['cost'] ?></h3>
            </div>
            <div class="col-6">
                <button name="btn2" style="margin: 0.5cm;" class="btn btn-warning">เลือกใหม่</button>
            </div>
            <div class="col-5">
                <button name="btn1" style="margin: 0.4cm;" class="btn btn-success" type="submit">ชำระเงิน</button>
            </div>
        </div>
    </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
