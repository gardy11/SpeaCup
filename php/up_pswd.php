<?php
session_start();
include_once "config.php";

if (!isset($_SESSION['unique_id'])) { //未登入時導向登入頁
    header("location: login.php");
}
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
}


$uid = $row['uid'];
$old_ps = mysqli_real_escape_string($conn, $_POST['old_pswd']);
$new_ps = mysqli_real_escape_string($conn, $_POST['new_pswd']); 
$ch_pswd = mysqli_real_escape_string($conn, $_POST['ch_pswd']);

if(!empty($old_ps) && !empty($new_ps) && !empty($ch_pswd)){ //確認欄位皆有輸入資料

    if (md5($old_ps) == $row['password']){  //驗證輸入正確的舊密碼
        //echo "ok", $old_ps;

        if($new_ps === $ch_pswd){  //驗證新密碼與確認新密碼輸入一致
            
            
            $encrypt_pswd = md5($new_ps);
            $update_query = mysqli_query($conn, "UPDATE users SET password = '{$encrypt_pswd}' WHERE uid = $uid ");

            if ($update_query) {
                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE password = '{$encrypt_pswd}'");
                if (mysqli_num_rows($select_sql2) > 0) {
                    $result = mysqli_fetch_assoc($select_sql2);
                    $_SESSION['unique_id'] = $result['unique_id']; //使用此 session 搭配其他php
                    echo "OK";
                } else {
                    echo "此密碼不存在";
                }
            } else {
                echo "怪怪的!請再重新嘗試一次!";
            }

        }else {
            echo "請輸入正確的新密碼!!";
        }
    }
    else{
        echo "請輸入正確的舊密碼!!";
        
    }

} else {
    echo '請輸入完整資料!!';
}


?>
