<!-- //查看收藏文章 -->
<?php
while ($row = mysqli_fetch_assoc($query6)) {

   $title_result = $row['title'];
   (strlen($title_result) > 40) ? $title =  mb_substr($title_result, 0, 40, 'utf-8') . '...' : $title = $title_result;

   $content_result = $row['content'];
   (strlen($content_result) > 32) ? $content =  mb_substr($content_result, 0, 32, 'utf-8') . '...' : $content = $content_result;



   $sql2 = "SELECT board_name FROM posts INNER JOIN board_Categories ON posts.cid = board_Categories.cid WHERE aid = '$row[aid]'";
   $query2 = mysqli_query($conn, $sql2);
   $row2 = mysqli_fetch_assoc($query2);

   // $sql3 = "SELECT COUNT(*) AS likes FROM like_dislike 
  	// 	  WHERE post_id = '$row[aid]' AND rating_action='like'";
   $sql3 = "SELECT likes FROM posts WHERE aid = '$row[aid]'";
   $query3 = mysqli_query($conn, $sql3);
   $row3 = mysqli_fetch_assoc($query3);

    // $sql4 = "SELECT COUNT(*) AS dislikes FROM like_dislike 
  	// 	  WHERE post_id = '$row[aid]' AND rating_action='dislike'";
   $sql4 = "SELECT angry FROM posts WHERE aid = '$row[aid]'";
   $query4 = mysqli_query($conn, $sql4);
   $row4 = mysqli_fetch_assoc($query4);

   $sql5 = "SELECT nickname,img FROM users INNER JOIN posts ON users.unique_id = posts.unique_id WHERE users.unique_id = '$row[unique_id]'";
   $query5 = mysqli_query($conn, $sql5);
   $row5 = mysqli_fetch_assoc($query5);

   $output .= '  
  
                    <div id="c1" class="m-3 mb-3">
                    <a style="text-decoration:none" href="m-index.php?user_id=' . $row['unique_id'] . '">
                       <div id="c1" class="row mb-2 ml-5 ">
                          <span style="font-size:20px;">' . $row2['board_name'] . '</span>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <img src="php/images/' . $row5['img'] . '"  alt=""  width="6%" height="6%" ">
                          &nbsp;&nbsp;&nbsp;&nbsp;
                           <span style="font-size:20px;">' . $row5['nickname'] . '</span>
                    

                       </div>
                     </a>
                     <a style="text-decoration:none" href="post.php?aid=' . $row['aid'] . '">
                       <div id="c1" class="mt-4 ml-5">
                        <h2 style="color:black;">'. $title . '</h2>
                        <p style="font-size:20px; color:gray;">'.  $content . '</p> 

      
                       
                    </div>
                   
                     </a>
                  <hr class="hr">';
}

?>