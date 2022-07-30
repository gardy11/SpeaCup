<!-- 顯示每則貼文 -->
<?php
while ($row = mysqli_fetch_assoc($query)) {

      $title_result = $row['title'];
      (strlen($title_result) > 40) ? $title =  mb_substr($title_result, 0, 40, 'utf-8') . '...' : $title = $title_result;

      $content_result = $row['content'];
      //(strlen($content_result) > 70) ? $content =  substr($content_result, 0, 100) . '...' : $content = $content_result;
      (strlen($content_result) > 32) ? $content =  mb_substr($content_result, 0, 32, 'utf-8') . '...' : $content = $content_result;



      $sql2 = "SELECT board_name FROM posts INNER JOIN board_Categories ON posts.cid = board_Categories.cid WHERE aid = '$row[aid]'";
      $query2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($query2);

      $sql3 = "SELECT COUNT(*) AS likes FROM like_dislike 
  		  WHERE post_id = '$row[aid]' AND rating_action='like'";
      $query3 = mysqli_query($conn, $sql3);
      $row3 = mysqli_fetch_assoc($query3);

      $sql4 = "SELECT COUNT(*) AS dislikes FROM like_dislike 
  		  WHERE post_id = '$row[aid]' AND rating_action='dislike'";
      $query4 = mysqli_query($conn, $sql4);
      $row4 = mysqli_fetch_assoc($query4);

      
   //    //$row['content']
   //    function timeago($timestamp) {
   //       $strTime = array("秒", "分鐘", "小時", "天", "月", "年");
   //       $length = array("60", "60", "24", "30", "12", "10");
   //       $currentTime = time();
   //       if ($currentTime >= $timestamp) {
   //           $diff = time() - $timestamp;
   //           for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
   //               $diff = $diff / $length[$i];
   //           }
   //           $diff = round($diff);
   //           return $diff . " " . $strTime[$i] . "前";
   //       }
   //   }

   //   //$row['created']
   //   $diff_time = timeago('$row[created]');
   

      $output .= '<a style="text-decoration:none" href="post.php?aid=' . $row['aid'] . '">  
                    <div class="content posts_content" >
                    
                    <img src="php/images/' . $row['img'] . '" alt=""  style="position:relative; bottom:75px; ">
                  
                    <div class="details" >
                    <span>' . $row2['board_name'] . '</span>

                    &nbsp;&nbsp;&nbsp;&nbsp;

                        <span>' . $row['nickname'] . '</span>
                         <div style="position:relative; border:0; min-width:490px; max-width:490px;";>  
                        <span style="position:absolute; right:10px;">' . $row['created'] . '</span></br></br>
                        </div>
                        <span style="font-size:25px;">' . $title . '</span>
                       
                        <p>' .  $content . '</p> 

                        <i class="fa fa-thumbs-up like-btn" style="font-size: 0.8em; color:gray"
                           data-id=' .  $row['aid']. '"> 
                        </i>
                        <span class="likes" style="font-size: 1em; color:gray">'.$row3['likes'].'</span>

                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <i class="fa fa-thumbs-down dislike-btn" style="font-size: 0.8em; color:gray"
                           data-id=' .  $row['aid']. '"> 
                        </i>
                        <span class="dislikes" style="font-size: 1em; color:gray">'.$row4['dislikes'].'</span>
                        
                    </div>
                    </div>
                  </a>';

}
                  
