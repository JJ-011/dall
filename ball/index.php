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

    $sql = 'SELECT * FROM stadium';
    $rs = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>หน้าหลัก</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <h2 class="logo">Football Field</h2>
        <nav class="navigation">
            <a href="index.php">หน้าหลัก</a>
            <a href="test2.php">รายการจอง</a>
            <p class="btnname-popup center">ชื่อผู้ใช้ <?php echo $user_name; ?></p>
            <a href="<?php echo $login_url; ?>" class="btnLogin-popup" style="text-align: center; display: block; padding-top: 10px;">logout</a>
        </nav>
    </header>
<div class="wrapper">
    <form>
<div class="ball">
        <h2>ข้อมูลสนาม</h2>
    <div class="image-container">
    <?php while($row = mysqli_fetch_assoc($rs)){ ?>
                    <div class="col-4 mt-3 text-center">
                    <table class="table text-center table-Info">
                        <tr>
                        <th><?php echo $row['stadium_name']; ?></th>
                        </tr>
                    </table>
                    <tbody>
                        <tr>
                            <td><a href="test.php?stadium_id=<?php echo $row['stadium_id']?>">
                            <?php echo '<img src="./img/'.$row['stadium_pic'].'" class="img-thumbnail">'; ?></td>
                        </tr>
                    </tbody>
                    <br>
                    <br>
                        <tr>
                            <td><a href="test.php?stadium_id=<?php echo $row['stadium_id']?>" class="nav-link">
                            <button class="btn btn-warning">จอง</a></td>
                        </tr>
            </div>
        <?php } ?>
    </div>
</div>    
</div>
    </form>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>