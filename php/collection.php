<?php
//session_start();
$conn =  mysqli_connect('localhost', 'root', '', 'speacup', 3306);
$conn->set_charset('utf8');

if (!isset($_SESSION['unique_id'])) { //未登入按收藏沒反應


} else {  //已登入
  $user_id = $_SESSION['unique_id'];




  if (isset($_POST['action1'])) {
    $post_id = $_POST['post_id'];
    $action1 = $_POST['action1'];
    echo  $_POST['action'];

    switch ($action1) {
      case 'collect':
        $sql = "INSERT INTO `collection` (post_id, user_id, collection_action) 
            VALUES ('$post_id', '$user_id', 'collect') ON DUPLICATE KEY UPDATE collection_action ='collect'";
        break;

      case 'uncollect':
        $sql = "DELETE FROM `collection` WHERE user_id = '$user_id' AND post_id = '$post_id' ";
        break;

      default:
        break;
    }

    //execute query
    mysqli_query($conn, $sql);
    //return number of likes
    //echo getRating($post_id);
    exit(0);
  }
}


function userCollected($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM `collection` WHERE user_id = '$user_id' 
  		  AND post_id= '$post_id' AND collection_action='collect'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    return true;
  } else {
    return false;
  }
}

// // Check if user already dislikes post or not
// function userDiscollected($post_id)
// {
//   global $conn;
//   global $user_id;
//   $sql = "SELECT * FROM `collection` WHERE user_id=$user_id 
//   		  AND post_id = '$post_id' AND collection_action='uncollect'";
//   $result = mysqli_query($conn, $sql);
//   if (mysqli_num_rows($result) > 0) {
//   	return true;
//   }else{
//   	return false;
//   }
// }


// $sql = "SELECT * FROM posts order by aid DESC";
// $result = mysqli_query($conn, $sql);

// $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);


$sql = "SELECT * FROM posts INNER JOIN users ON posts.unique_id = users.unique_id ORDER BY aid DESC";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) {
  $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
}