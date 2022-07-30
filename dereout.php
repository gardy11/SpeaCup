<?php
session_start();
$_SSESION=[];
session_destroy();

echo "<script type='text/javascript'>alert('已登出');window.location.href='../index.php'</script>";
//header("location: ../index.php");
?>
