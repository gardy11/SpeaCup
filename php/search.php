<?php
session_start();
include_once "config.php";

$outgoing_id = $_SESSION['unique_id'];
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

$sql = "SELECT * FROM users JOIN friends on users.unique_id = friends.user1 or users.unique_id = friends.user2 
WHERE (user1 = {$outgoing_id} or user2 = {$outgoing_id}) AND NOT unique_id = {$outgoing_id} AND (nickname LIKE '%{$searchTerm}%')  ";

$output = "";
$query_checkfriend = mysqli_query($conn, $sql);
if (mysqli_num_rows($query_checkfriend) > 0) {
      include_once "data_friend.php";
} else {
      $output .= '查無資訊!';
}
echo $output;