<?php
session_start();
$_SSESION=[];
session_destroy();

echo "<script type='text/javascript'>alert('已登出');</script>";
header("location: ../index.php");
?>