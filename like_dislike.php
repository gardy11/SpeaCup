<?php
    $conn =  mysqli_connect('localhost', 'root', '', 'speacup', 3306);
    $conn->set_charset('utf8');    
     
    if (!isset($_SESSION['unique_id'])) { //未登入 按讚/怒沒反應

      
    } else {  //已登入
          $user_id = $_SESSION['unique_id'];
     $user_id = $_SESSION['unique_id'];

    // if user clicks like or dislike button
    if(isset($_POST['action'])){
        $post_id = $_POST['post_id'];
        $action = $_POST['action'];
        

        switch ($action){
            case 'like':
                $sql = "INSERT INTO like_dislike (post_id, user_id, rating_action) 
                VALUES ('$post_id', '$user_id', 'like')
                ON DUPLICATE KEY UPDATE rating_action='like'";
                break;

            case 'dislike':
                $sql = "INSERT INTO like_dislike (post_id, user_id, rating_action) 
                VALUES ('$post_id', '$user_id', 'dislike')
                ON DUPLICATE KEY UPDATE rating_action='dislike'";
                break;  
                
            case 'unlike':
                $sql = "DELETE FROM like_dislike WHERE user_id = '$user_id' AND post_id = '$post_id' ";
                break;

            case 'undislike':
                $sql = "DELETE FROM like_dislike WHERE user_id = '$user_id' AND post_id = '$post_id' ";
                break;
            default:
                break;
        }

        //execute query
        mysqli_query($conn, $sql);
        //return number of likes
        echo getRating($post_id);       
        exit(0);
    }
  }
 

// Get total number of likes for a particular post
function getLikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM like_dislike  WHERE post_id = '$id' AND rating_action='like'"; 
  //$sql = "SELECT likes FROM posts WHERE aid = '$id'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM like_dislike  WHERE post_id = '$id' AND rating_action='dislike'"; 
  //$sql = "SELECT angry FROM posts WHERE aid = '$id'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of likes and dislikes for a particular post
function getRating($id)
{
  global $conn;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM like_dislike WHERE post_id = $id AND rating_action='like'";
  $dislikes_query = "SELECT COUNT(*) FROM like_dislike 
		  			WHERE post_id = $id AND rating_action='dislike'";
  $likes_rs = mysqli_query($conn, $likes_query);
  $dislikes_rs = mysqli_query($conn, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
  	// 'likes' => $likes[0],
  	// 'dislikes' => $dislikes[0]
    'likes' => $likes[0],
  	'dislikes' => $dislikes[0]


  ];


  // $aa = "UPDATE posts SET likes = $likes[0] AND angry =  $dislikes[0]  WHERE aid = $id '";
  // mysqli_query($conn, $aa);



  return json_encode($rating);
}

 // $aa = "UPDATE posts SET likes = $likes[0] AND angry =  $dislikes[0]  WHERE aid = $id '";
  // mysqli_query($conn, $aa);



function userLiked($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM like_dislike WHERE user_id = '$user_id' 
  		  AND post_id= '$post_id' AND rating_action='like'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

// Check if user already dislikes post or not
function userDisliked($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM like_dislike WHERE user_id = '$user_id' 
  		  AND post_id = '$post_id' AND rating_action='dislike'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}



$sql = "SELECT * FROM posts INNER JOIN users ON posts.unique_id = users.unique_id ORDER BY aid DESC";
$query = mysqli_query($conn, $sql);
// while ($row = mysqli_fetch_assoc($query)) {
$posts = mysqli_fetch_all($query, MYSQLI_ASSOC);    
//}


?>