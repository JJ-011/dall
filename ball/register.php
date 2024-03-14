<?php
    require('utility/utility.php');
    ConnectDB();
    $err = '';
    if(isset($_POST['btn1'])){
        $sql = 'SELECT * FROM users WHERE user_id="'.$_POST['user_id'].'"';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        if(mysqli_num_rows($rs)!=0){$err = '<div class="alert alert-danger">ชื่อผู้ใช้นี้มีอยู่แล้ว</div>';}

        $sql = 'SELECT * FROM users WHERE user_name="'.$_POST['user_name'].'"';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        if(mysqli_num_rows($rs)!=0 && $err == ''){$err = '<div class="alert alert-danger">มีอยู่แล้ว</div>';}

        if($_POST['user_id']=="admin"){$err = '<div class="alert alert-danger">ไม่สามารถใช้ชื่อนี้ได้</div>';}

        if($err == ''){
            $sql = 'INSERT INTO users (user_id,user_name,user_password)
            VALUES ("'.$_POST['user_id'].'",
                    "'.$_POST['user_name'].'",
                    "'.md5($_POST['user_password']).'")';
            mysqli_query($GLOBALS['conn'],$sql);
            header("Location:./login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="jj.css">
</head>

<body>

<header>
    <h2 class="logo" >Football Field</h2>
        <nav class="navigation">
        <a href="index.php" >หน้าหลัก</a>
        <a href="test2" >รายการจอง</a>
        <button class="btnLogin-popup" >Login</button>
    </nav>
</header>
<div class="wrapper">
    <div class="form-box register">
        <h2>register</h2>
        <form action="#" method="post">
            <div class="input-box">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <input type="text" name="user_id" required>
                <label class="label">UserName</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <input type="text" name="user_name" required>
                <label class="label">Name</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" name="user_password" required>
                <label class="label">Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">จำรหัสฉันไว้
            </div>
            <button name="btn1" type="submit" class="btn" >register</button>
            <div class="login-register">
                <p>ลงทะเบียนเเล้วใช่ไหม?  <a href="login.php" class="login-link" >Login</a></p>
            </div>
            <?php echo $err; ?>
        </form>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>