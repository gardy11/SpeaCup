<?php
session_start();
require_once 'config.php';

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $userinfo = [
    'email' => $google_account_info['email'],
    'account' => $google_account_info['name'],
    'gender' => $google_account_info['gender'],
    'nickname' => $google_account_info['name'],
    'img' => $google_account_info['picture'],
    'mid' => $google_account_info['id'],
  ];

  // checking if user is already exists in database
  $sql = "SELECT * FROM users WHERE email ='{$userinfo['email']}'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) { //已有資料則進行登入
    // user is exists
    $userinfo = mysqli_fetch_assoc($result);
    $token = $userinfo['mid'];

    $status = "上線中";
    //若登入則更新狀態
    $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$userinfo['unique_id']}");
    if ($sql2) {
      $_SESSION['unique_id'] = $userinfo['unique_id'];
      $message = "成功登入!";
      echo "<script type='text/javascript'>alert('$message');window.location.href='../member.php'</script>";
      //header("location: ../member.php");
    } else {
      echo "怪怪的!請再嘗試一次!";
    }
  } else {
    // user is not exists
    $ran_id = rand(time(), 100000000);
    $date = date('y-m-d H:i:s');
    $status = "上線中";  //上線狀態
    $insert_query = "INSERT INTO users (email,account,gender,nickname,img,mid,register,status,unique_id) VALUES ('{$userinfo['email']}','{$userinfo['account']}','{$userinfo['gender']}','{$userinfo['nickname']}', '{$userinfo['img']}', '{$userinfo['mid']}','{$date}','{$status}','{$ran_id}')";
    $result = mysqli_query($conn, $insert_query);
    if ($result) {
      $token = $userinfo['mid'];

      
      if ($insert_query) {
        $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$userinfo['email']}'");
        if (mysqli_num_rows($select_sql2) > 0) {
          $result2 = mysqli_fetch_assoc($select_sql2);
          $_SESSION['unique_id'] = $result2['unique_id']; //使用此 session 搭配其他php
          
          $message = "成功登入!";
          echo "<script type='text/javascript'>alert('$message');window.location.href='../member.php'</script>";
          
          //header("location: ../member.php");


        } else {
          echo "此email不存在";
        }
      }
    } else {
      echo "User is not created";
      die();
    }
  }

  // save user data into session
  $_SESSION['user_token'] = $token;
} else {
  if (!isset($_SESSION['user_token'])) {
    //header("Location: g-login.php");
    echo 'error';
    die();
  }

  // checking if user is already exists in database
  $sql = "SELECT * FROM users WHERE mid ='{$_SESSION['user_token']}'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // user is exists
    $userinfo = mysqli_fetch_assoc($result);
  }
}