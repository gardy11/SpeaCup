<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) { //未登入時顯示請登入
      header("location: login.php");
} else {  //已登入時顯示會員暱稱及登出
      $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
      if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
      }

      $a = $row['nickname'];
      $b = ' <a href="member.php" class="link-secondary">
             <p class="h5">會員中心</p>  </a>';
 $c =             '<a href="php/dereout.php" class="link-secondary">
             <p class="h5">登出</p></a>
             ';
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SpeaCup有話直說</title>
      <link href="CSS/style.css" rel="stylesheet" />
      <link rel="icon" type="image/x-icon" href="assets/fav.ico" />
      <script src="JS/scripts.js"></script>
      <script src="js/jquery-3.6.0.js"></script>
      <link rel="stylesheet" href="./css/style_chat.css">

      <!-- 外部匯入樣式 -->

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="https://kit.fontawesome.com/993da95711.js" crossorigin="anonymous"></script>
      <script language="javascript">
      function changeImageString(TargetID, FildAddres) {
            document.images[TargetID].src = FildAddres;
      }
      </script>
</head>




<body class="body">
      <header>
            <?php
            //個人資料
            $user_id =  $_REQUEST['user_id'];
            $unique_id = mysqli_real_escape_string($conn, $_GET['user_id']); //抓取連結過來的unique_id以取得對應資料
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id =  $unique_id ORDER BY  uid DESC");
            if ($$unique_id === "") {
                  header("location: login.php");
            }
            if (mysqli_num_rows($sql) > 0) {
                  $row = mysqli_fetch_assoc($sql);
            } else {
                  header("location: apply.php");
            }

            //已發表文章
            $sql5 = "SELECT * FROM users INNER JOIN posts ON posts.unique_id = users.unique_id  WHERE posts.unique_id = $unique_id ORDER BY aid DESC";
            $query1 = mysqli_query($conn, $sql5);
            $output = "";
            if (mysqli_num_rows($query1) == 0) {
                  $output .= "<p class=\"ml-5\">還沒有文章喔!</p>";
            } elseif (mysqli_num_rows($query1) > 0) {
                  while ($row5 = mysqli_fetch_assoc($query1)) {

                        $title_result = $row5['title'];
                        (strlen($title_result) > 40) ? $title =  mb_substr($title_result, 0, 40, 'utf-8') . '...' : $title = $title_result;

                        $content_result = $row5['content'];
                        //(strlen($content_result) > 70) ? $content =  substr($content_result, 0, 100) . '...' : $content = $content_result;
                        (strlen($content_result) > 32) ? $content =  mb_substr($content_result, 0, 32, 'utf-8') . '...' : $content = $content_result;

                        $sql2 = "SELECT board_name FROM posts INNER JOIN board_Categories ON posts.cid = board_Categories.cid WHERE aid = '$row5[aid]'";
                        $query2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($query2);

                        $sql3 = "SELECT COUNT(*) AS likes FROM like_dislike 
             WHERE post_id = '$row5[aid]' AND rating_action='like'";
                        $query3 = mysqli_query($conn, $sql3);
                        $row3 = mysqli_fetch_assoc($query3);

                        $sql4 = "SELECT COUNT(*) AS dislikes FROM like_dislike 
             WHERE post_id = '$row5[aid]' AND rating_action='dislike'";
                        $query4 = mysqli_query($conn, $sql4);
                        $row4 = mysqli_fetch_assoc($query4);

                        //文章內容&格式
                        $output .= '  
                        
                         <div id="c1" class="m-3 mb-3">
                            <div id="c1" class="row mb-2 ml-5 ">
                               <span style="font-size:20px;">' . $row2['board_name'] . '</span>
                               <img src="php/images/' . $row5['img'] . '"  alt=""  width="6%" height="6%" ">
                          
                                <span style="font-size:20px;">' . $row5['nickname'] . '</span>
                         

                            </div>
     
                          <a style="text-decoration:none" href="post.php?aid=' . $row5['aid'] . '">
                            <div id="c1" class="mt-4 ml-5">
                             <h2 style="color:black;">' . $title . '</h2>
                             <p style="font-size:20px; color:gray;">' .  $content . '</p> 
   

                         </div>
                        
                          </a>
                       <hr class="hr">';
                  }
            }


            ?>


      </header>

      <!-- navbar -->
      <nav class="navbar fixed-top navbar-expand-md navbar-dark mr-1">
            <div clss="col-3">
                  <a class="navbar-brand" href="index.php">
                        <img src="assets/img/有話 直說 (1).png" width="35" height="35" class="d-inline-block align-top">
                        <img src="assets/img/SpeaCup.png" width="150" height="35" class="d-inline-block align-top">
                  </a>
            </div>

            <button class="navbar-toggler navbar-left" type="button" data-toggle="collapse"
                  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>

            <div class="nav-navbar collapse navbar-collapse navbar-right " id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto pl-1">
                        <form class="form-inline">
                              <input class="form-control mr-sm-1" type="search" placeholder="SpeaCup"
                                    aria-label="Search">
                              <button class="btn btn-outline-danger my-2 my-sm-0 " type="submit"><i
                                          class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                        <li class="nav-item pl-5 mr-5">
                        <li><a href=""><i class="fa-solid fa-bell">&ensp;&ensp;</i></a></li>
                        <li><a href="login.php" title="會員中心"><i class="fa-solid fa-user">&ensp;&ensp;</i></a></li>
                        </li>
            </div>


      </nav>

      <div id="siderbarleft" class="siderbarleft">
            <div id="sidebar">
                  <button type="button" id="collapse" class="collapse-btn">
                        <i class="fas fa-align-left"></i>
                  </button>
                  <ul class="list-unstyled p-1 ">
                        <li>
                              <a href="member.php" calss="m-2">基本資料<i class="fas mt-1 fa-solid fa-user-check"></i></i>
                              </a>
                        </li>
                        <li>
                              <a href="collections.php" calss="m-2">收藏文章<i
                                          class="fas mt-1 fa-solid fa-file-circle-plus"></i></i> </a>
                        </li>
                        <li>
                              <a href="posts.php" calss="p-2">發表過文章<i
                                          class="fas mt-1 fa-regular fa-pen-to-square"></i></i> </a>
                        </li>
                        <li>
                              <a href="friends.php" calss="m-2">好友列表<i class="fas mt-1  fa-solid fa-users"></i> </a>
                        </li>
                        <li>
                              <a href="apply.php" calss="m-2">好友申請<i class="fas mt-1 fa-solid fa-user-pen"></i></i> </a>
                        </li>
                  </ul>
            </div>
      </div>


      <div id="siderbarindex">
            <div id="m-inform" class="mr-3 ml-3 mb-3">
                  <h1 id="m-nickname-n" class="ml-5 text-primary"><?php echo $row['nickname']; ?></h1>
                  <h1 class="ml-5 text-dark display-5">基本資料</h1>
                  <div class="col-12 pt-2">
                        <?php
                        $sendFrom = $_SESSION["unique_id"];
                        $sql_CheckReq = "SELECT * FROM requests where sendingfrom = '$sendFrom' and sendingto = '$user_id' ";
                        $sql_CheckFriend = "SELECT * FROM friends where (user1 = '$sendFrom' and user2 = '$user_id') or (user1 = '$user_id' and user2 = '$sendFrom')";

                        $result_CheckReq = mysqli_query($conn, $sql_CheckReq);
                        $result_CheckFriend = mysqli_query($conn, $sql_CheckFriend);


                        if (mysqli_num_rows($result_CheckReq) > 0 || mysqli_num_rows($result_CheckFriend) > 0) {
                              echo "已經申請過好友或已經是朋友囉!";
                        } else {
                              if ($sendFrom == $user_id) {
                              } else {

                        ?>

                        <button class='btn btn-primary' id='sendReq'
                              onclick='sendAction(1,"<?php echo $user_id ?>")'>加好友</button>

                        <?php
                              }
                        }
                        ?>
                  </div>
                  <hr class="hr">
            </div>

            <div id="m-img " class="m-3 ">
                  <h4 class="ml-5 text-muted">頭貼</h4>
                  <div class="row">
                        <input type="hidden" name="old_img" value="/<?php echo $row['img']; ?>" />
                        <img src="php/images/<?php echo $row['img']; ?>" width="200px" height="200px"
                              class="ml-5 col-3 rounded" alt="大頭貼">

                               </div>
                  <div id="m-bd" class="m-3">
                        <h4 class="ml-5 text-muted">生日</h4>
                        <label id="m-bd-b" class="ml-5"><?php echo $row['birth']; ?></label>
                        <hr class="hr">
                  </div>
            </div>


            <div id="m-index-p" class="m-3">
                  <h1 class="ml-5 display-4">發表過文章 !!</h1>
            </div>
          

            <?php echo $output;  ?>

            <div id="siderbarright1">
                  <!-- 聊天對象選擇介面 -->
                  <?php include_once "./php/users_select.php"; ?>
            </div>

            <div id="siderbarright2">
              
            </div>


            <script src="./JS/add_cancel_friend.js"></script>
            <script>
            $('#postStatus').click(function() {
                  $statusTXT = $('#status').val();
                  $.post(`php/action.php?action=postStatus&status=${ $statusTXT }&postTo=<?php echo $user_id; ?>`,
                        function(res) {

                              loadStatus()
                              $('#status').val(' ');
                        })
            })


            $(document).ready(function() {
                  loadStatus()
            })

            function loadStatus() {

                  $.post('php/action.php?action=fetchAllStatus&uid=<?php echo $user_id; ?>', function(res) {
                        // alert(res);
                        $('#all-status').html(res)
                  })
            }

            function loadRelatedComment(pid) {
                  $.post(`php/action.php?action=relatedComments&pid=${ pid }`, function(res) {
                        // console.log(res);
                        $('#displayRelatedComment' + pid).html(res);
                        $('#displayRelatedComment' + pid).prev().hide();
                  })
            }

            function openArticle(evt, articleName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("article");
            for (i = 0; i < x.length; i++) {
                  x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                  tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
            }
            document.getElementById(articleName).style.display = "block";
            evt.currentTarget.className += " w3-red";
      }

      function doAnimateShow() {
            document.getElementById("box").style.top = "90px";
            event.cancelBubble = true;
      }

      function doAnimateHide() {
            document.getElementById("box").style.top = "-200px";

      }

      function doAnimateShowbell() {
            document.getElementById("bell").style.top = "90px";
            event.cancelBubble = true;
      }

      function doAnimateHidebell() {
            document.getElementById("bell").style.top = "-200px";

      }

      window.onclick = function(ev) {
            if (ev.target.nodeName !== 'A') {
                  doAnimateHide();
                  doAnimateHidebell();
            }
      };
            </script>


</body>



</html>