<?php 
    require('utility/utility.php');
    ConnectDB();
    $err='';
    if(isset($_POST['btn1'])){
        $sql = 'SELECT * FROM users WHERE user_id="'.$_POST['user_id'].'" AND user_password = "'.md5($_POST['user_password']).'"';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        $data = mysqli_fetch_assoc($rs);
        if(mysqli_num_rows($rs)==1){
            $_SESSION['user'] = $data;
            header('Location:index.php');
        }else{$err='<div style="margin: 0.4cm" class="alert alert-danger text-center">เกิดข้อผิดพลาด</div>'; }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

<header>
    <h2 class="logo" >Football Field</h2>
    <nav class="navigation">
        <a href="index.php" >หน้าหลัก</a>
        <a href="test2.php" >รายการจอง</a>
        <p><button name="login" class="btnLogin-popup" type="submit" >Login</button></p>
    </nav>
</header>
<div class="wrapper">
    <div class="form-box login">
        <h2>Login</h2>
        <form method="POST" action="#">
            <div class="input-box">
                <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                <input type="text" name="user_id" required>
                <label class="label">UserName</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" name="user_password" required>
                <label class="label">Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">จำรหัสฉันไว้</label>
            </div>
            <button name="btn1" class="btn  p-3 w-100 mt-3" type="submit">Log in</button>
            <div class="login-register">
                <p>ยังไม่ลงทะเบียนใช่ไหม?<a href="register.php" class="register-link" >  ลงทะเบียน</a></p>
            </div>
        </form>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>