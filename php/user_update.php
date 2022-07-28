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
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$old_img = $_POST["old_img"];
$birth = mysqli_real_escape_string($conn, $_POST['birth']);

$gender = mysqli_real_escape_string($conn, $_POST['gender']);

if (!empty($fname) && !empty($email)) {
    //email 檢查
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //有效判斷
        //檢驗email fname是否被其他使用者使用
        $sql_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' && uid != $uid");

        $sql_fname = mysqli_query($conn, "SELECT * FROM users WHERE nickname = '{$fname}' && uid != $uid ");


        if (
            mysqli_num_rows($sql_email) > 0
        ) {
            echo "$email - 此email已存在!";
        } else if (
            mysqli_num_rows($sql_fname) > 0
        ) {
            echo "$fname - 此暱稱已存在!";
        } else {
            //檢驗上傳檔案
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name']; //擷取上傳圖片名
                $img_type = $_FILES['image']['type']; //擷取上傳圖片類型
                $tmp_name = $_FILES['image']['tmp_name']; //用以存或移動檔案到我方資料夾中

                //抓檔案格式
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                $extensions = ["jpeg", "png", "jpg"];

                if (in_array($img_ext, $extensions) === true) {
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if (in_array($img_type, $types) === true) {
                        $time = time(); //透過此時間，及時修改users上傳檔案名
                        $date = date('y-m-d H:i:s');
                        $new_img_name = $time . $img_name;
                        if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                            $update_query = mysqli_query($conn, "UPDATE users SET nickname = '{$fname}', email = '{$email}', img = '{$new_img_name}' ,birth = '{$birth}',gender = '{$gender}'
                                                    WHERE uid = $uid ");


                            if ($update_query) {
                                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if (mysqli_num_rows($select_sql2) > 0) {
                                    $result = mysqli_fetch_assoc($select_sql2);
                                    $_SESSION['unique_id'] = $result['unique_id']; //使用此 session 搭配其他php
                                    echo "OK";
                                } else {
                                    echo "此email不存在";
                                }
                            } else {
                                echo "怪怪的!請再重新嘗試一次!";
                            }
                        }
                    } else {
                        echo "圖片格式請上傳2 - jpeg, png, jpg";
                    }
                } else {  //大頭貼不更新時，回傳舊頭貼檔名
                    if (isset($_FILES['image'])) {
                        //echo $old_img;
                        $new_img_name = $old_img;
                        $update_query = mysqli_query($conn, "UPDATE users SET nickname = '{$fname}', email = '{$email}', img = '{$new_img_name}' ,birth = '{$birth}',gender = '{$gender}'
                                                WHERE uid = $uid ");

                        if ($update_query) {
                            $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($select_sql2) > 0) {
                                $result = mysqli_fetch_assoc($select_sql2);
                                $_SESSION['unique_id'] = $result['unique_id']; //使用此 session 搭配其他php
                                echo "OK";
                            } else {
                                echo "此email不存在";
                            }
                        } else {
                            echo "怪怪的!請再重新嘗試一次!";
                        }
                    } else {
                        echo "圖片格式請上傳1 - jpeg, png, jpg";
                    }
                }
            }
        }
    } else {
        echo "$email - 無效的email格式!";
    }
} else {
    echo "請輸入生日及性別資料!";
}