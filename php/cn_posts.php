<?php //查看收藏文章
//session_start();
include_once "config.php";

   
$sql = "SELECT * FROM users INNER JOIN collection ON users.unique_id = collection.user_id LEFT JOIN posts ON collection.post_id = posts.aid  WHERE users.unique_id ={$_SESSION['unique_id']}";

$query6 = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($query6) == 0) {
      $output .= "還沒有收藏文章喔!";
} elseif (mysqli_num_rows($query6) > 0) {
      include_once "cn_post-data.php";
}
echo $output;




 