<?php //查看發表文章
//session_start();
include_once "config.php";
//$sql = "SELECT * FROM posts INNER JOIN users ON posts.unique_id = users.unique_id ORDER BY aid DESC";
$sql = "SELECT * FROM users INNER JOIN posts ON posts.unique_id = users.unique_id  WHERE posts.unique_id = {$_SESSION['unique_id']} ORDER BY aid DESC";


$query1 = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($query1) == 0) {
      $output .= "還沒有文章喔!";
} elseif (mysqli_num_rows($query1) > 0) {
      include_once "user_post-data.php";
}
echo $output;




 