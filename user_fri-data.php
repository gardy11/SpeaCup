<!-- //查看發表文章 -->
<?php
while ($row = mysqli_fetch_assoc($query)) {

   

   $output .= '<div id="f-friends" class="row ml-5 m-3">
               <img src="php/images/' . $row['img'] . '" width="70px" height="70px" class="ml-3 col-2">
               <h3 class="ml-3 col-5 mt-3">' . $row['nickname'] . '</h3>     

               <a style="text-decoration:none" href="m-index.php?unique_id=' . $row['unique_id'] . '">
               <button id="f-inform"class="btn ml-3 col-2" title="好友資訊"><i class="fa-solid fa-address-card fa-2x "></i></button>
               </div>
               </a>    
                   
                  <hr class="hr">';
}

?>