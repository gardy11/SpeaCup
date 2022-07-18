<?php
//session_start();
include_once "config.php";
$sql = "SELECT * FROM posts INNER JOIN users ON posts.unique_id = users.unique_id ORDER BY aid DESC";


$query = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($query) == 0) {
      $output .= "還沒有文章喔!";
} elseif (mysqli_num_rows($query) > 0) {
      include_once "post-data.php";
}
echo $output;




 