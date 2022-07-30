<?php //查看發表文章
//session_start();
include_once "config.php";
$sql = "SELECT * FROM users WHERE unique_id != {$_SESSION['unique_id']} ORDER BY uid DESC";


$query = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($query) == 0) {
      $output .= "還沒有朋友喔!";
} elseif (mysqli_num_rows($query) > 0) {
      include_once "user_fri-data.php";
}
echo $output;




 