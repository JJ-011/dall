<?php
    date_default_timezone_set("Asia/Bangkok");
    $GLOBALS['conn']=null;
        session_start();


    
    $choosetime = ['time1','time2','time3','time4','time5','time6','time7','time8'];
    $choosetime2 = ['10:00 - 11:00','11:00 - 12:00','12:00 - 13:00','13:00 - 14:00',
                    '14:00 - 15:00','15:00 - 16:00','16:00 - 17:00','17:00 - 18:00'];
    function ConnectDB(){
        $GLOBALS['conn'] = mysqli_connect('localhost','root','66309010022','football');
        if(mysqli_errno($GLOBALS['conn'])){
            echo '<h1>เชื่อมต่อฐานข้อมูลไม่ได้</h1>';
            exit();
        }
    }
    function checkLogin(){
        if(!isset($_SESSION['user'])){
            echo "<script>
            alert('ล็อกอินก่อน!');
            window.location.href = 'login.php';
            </script>";
        }
    }
?>