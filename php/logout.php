<?php

session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if (isset($logout_id)) {
        $status = "下線囉";
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$_GET['logout_id']}");
        if ($sql) {
            session_unset();
            $client->revokeToken();
            session_destroy();
            header("location: ../login.php");
        }
    } else {
        header("location: ../userInfo.php");
    }
} else {
    header("location: ../login.php");
}

//google登出
// session_start();
// require_once 'config.php';
// unset($_SESSION['user_token']);
// $client->revokeToken();
// session_destroy();
// header("Location: ../index.php");