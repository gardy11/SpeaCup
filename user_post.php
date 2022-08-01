<?php
session_start();
include_once "php/config.php";
include('php/like_dislike.php');
include('php/collection.php');


?>
<?php
if (!isset($_SESSION['unique_id'])) { //未登入只可瀏覽文章 


} else {  //已登入時按收藏/讚/怒才有反應
      $user_id = $_SESSION['unique_id'];
      $sql = "SELECT * FROM posts INNER JOIN users ON posts.unique_id = users.unique_id ORDER BY aid DESC";
      $query = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($query)) {
            $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
      }
}

if (!isset($_SESSION['unique_id'])) { //未登入時顯示請登入

$a = '<a href="login.php" class="link-secondary">
<p class="h5">請登入</p> </a>';
$b = "";
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




<?php
/*刪除該筆文章的內文、收藏、讚資料表內容*/
if (isset($_POST['delete_btn'])) {
      $id2 = $_POST['delete_id'];
      //刪除文章
      $query2 = "DELETE FROM posts WHERE posts.aid ='$id2'";
      $query_run2 = mysqli_query($conn, $query2);
      //刪除收藏紀錄
      $query3 = "DELETE FROM collection WHERE collection.post_id ='$id2'";
      $query_run3 = mysqli_query($conn, $query3);
      //刪除讚/怒紀錄
      $query4 = "DELETE FROM like_dislike WHERE like_dislike.post_id ='$id2'";
      $query_run4 = mysqli_query($conn, $query4);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SpeaCup有話直說</title>
      <link href="CSS/style.css" rel="stylesheet" />
      <link rel="stylesheet" href="./css/style_chat.css">
      <link rel="icon" type="image/x-icon" href="assets/fav.ico" />
      <script src="JS/scripts.js"></script>
      <script src="js/jquery-3.6.0.js"></script>


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
      <!-- navbar -->
      <nav class="navbar fixed-top navbar-expand-md navbar-dark mr-1">
            <div clss="col-3">
                  <a class="navbar-brand" href="index.php">
                        <img src="assets/img/有話 直說 (1).png" width="35" height="35" class="d-inline-block align-top">
                        <img src="assets/img/SpeaCup.png" width="150" height="35" class="d-inline-block align-top">
                  </a>
            </div>

            <button class="navbar-toggler navbar-left" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>

            <div class="nav-navbar  navbar-collapse navbar-right " id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto pl-1">
                        <form class="form-inline" method="POST" action="searchresult.php">
                              <input class="form-control mr-sm-1" type="search" placeholder="SpeaCup" aria-label="Search" name="searchcontent">
                              <button class="btn btn-outline-danger my-2 my-sm-0 " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                        <li class="nav-item pl-5 mr-5">
             
                        <li><a class="fa-solid fa-user mt-2" onclick="doAnimateShow();">&ensp;&ensp;</a></li>
                        </li>
            </div>

            <!-- 會員圖案click後的box -->
            <div class="box" id="box">
                  <div class="row">
                        <p class="h5">&ensp;&ensp;HI!&ensp;&ensp;</p>
                        <p class="h5 text-primary"><?php echo $a; ?></p>
                  </div>
                  <?php echo $b; ?>
                  <?php echo $c; ?>
            </div>
            <!-- 小鈴鐺裡面的東西 -->
            <div class="bell" id="bell">
                  <p></p>
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
                              <a href="apply.php" calss="m-2">好友申請<i class="fas mt-1 fa-solid fa-user-pen"></i></a>
                        </li>


                  </ul>
            </div>
      </div>

      <div id="siderbarindex">



            <div class="wrapper_post">
                  <section class="post-area">
                        <header style="height: 10%;">
                              <?php

                              $aid = mysqli_real_escape_string($conn, $_GET['aid']);
                              $sql = mysqli_query($conn, "SELECT * FROM posts INNER JOIN users ON posts.unique_id = users.unique_id LEFT JOIN board_categories  ON posts.cid = board_categories.cid WHERE aid =  $aid ORDER BY aid DESC");
                              if ($aid === "") {
                                    //header("location: login.php");
                              }
                              if (mysqli_num_rows($sql) > 0) {
                                    $row = mysqli_fetch_assoc($sql);
                              } else {
                                    //header("location: posts.php");
                              }

                              ?>
                              <!--看板、頭貼、發文者、發文時間-->
                              <a href="cate<?php echo $row['cid']; ?>.php?c_id=<?php echo $row['cid']; ?>">
                                    <span class="col-2"
                                          style="font-size: 20px;"><?php echo $row['board_name']; ?></span>
                              </a>

                              <a href="m-index.php?user_id=<?php echo $row['unique_id']; ?>">
                                    <img src="php/images/<?php echo $row['img']; ?>" style="border-radius: 50%;" alt=""
                                          width="6%" height="6%">
                              </a>

                              <a href="m-index.php?user_id=<?php echo $row['unique_id']; ?>">
                                    <span class="col-2" style="font-size: 20px;"><?php echo $row['nickname']; ?></span>
                              </a>

                              <span class="time-text col-4"><?php echo nl2br($row['created']) ?></span>

                              <!--編輯、刪除-->
                              <form method="post" action="" style="position:relative ;left:45%;">
                                    <a style="text-decoration:none" href="edit_post.php?aid=<?php echo $row['aid']; ?>">
                                          <i class="fa-solid fa-pen-to-square fa-lg"
                                                style="position:relative; left:240px;">編輯</i>
                                    </a>
                                    <!-- input type="hidden" 表示要刪除的文章aid -->
                                    <input type="hidden" name="delete_id" value="<?php echo $row['aid']; ?>">
                                    <button name="delete_btn" onclick="script:return del();return false;"
                                          class="btn btn-outline-danger">
                                          <i class='fas fa-trash-alt'>刪除</i>
                                    </button>
                              </form>








                        </header>
                        <!--文章標題、內容、讚按鈕、收藏紐-->
                        <div class="container">
                              <div class="content">
                                    <p class="content-text">

                                    <h1 class="text-body title-text "><strong> <?php echo $row['title'] ?></strong></h1>
                                    <hr class="hr" align="left" />
                                    <!-- 讓內容可以顯示出換行 -->
                                    <p style="font-size: 20px;"><?php echo str_replace("\n", "<br/>", $row['content']) ?></p>


                                    <br><br><br>
                                    <hr class="hr" align="left" />
                                    <i <?php if (userLiked($row['aid'])) : ?> class="fa fa-thumbs-up like-btn bluei" <?php else : ?> class="fa fa-thumbs-o-up like-btn bluei" <?php endif ?> data-id="<?php echo $row['aid'] ?>" style="font-size: 1.5em;">
                                    </i>
                                    <span class="likes"><?php echo getLikes($row['aid']); ?></span>

                                    &nbsp;&nbsp;&nbsp;&nbsp;

                                    <!-- if user dislikes post, style button differently -->
                                    <i <?php if (userDisliked($row['aid'])) : ?> class="fa fa-thumbs-down dislike-btn bluei" <?php else : ?> class="fa fa-thumbs-o-down dislike-btn bluei" <?php endif ?> data-id="<?php echo $row['aid'] ?>" style="font-size: 1.5em;">
                                    </i>
                                    <span class="dislikes"><?php echo getDislikes($row['aid']); ?></span>


                                    <i <?php if (userCollected($row['aid'])) : ?> class="fa fa-bookmark collection-btn redi" <?php else : ?> class="fa fa-bookmark-o collection-btn redi" <?php endif ?> data-id="<?php echo $row['aid'] ?>" style="position:relative;left:5%;font-size: 1.5em;">
                                          收藏</i>

                              </div>
                        </div>
                  </section>
            </div>


      </div>


      <div id="siderbarright1">
            <!-- 聊天對象選擇介面 -->
            <?php include_once "./php/users_select.php"; ?>
      </div>

      <div id="siderbarright2">
            聊天
      </div>

      <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="Myjs/like_dislike.js"></script>
      <script src="Myjs/collection.js"></script>
      <script src="./Myjs/post.js"></script>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
            integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">



</body>
<script>
// 回到頂端樣式
$(function() {
      var $win = $(window);
      var $backToTop = $('.js-back-to-top');

      $win.scroll(function() {
            if ($win.scrollTop() > 300) {
                  $backToTop.show();
            } else {
                  $backToTop.hide();
            }
      });


      $backToTop.click(function() {
            $('html, body').animate({
                  scrollTop: 0
            }, 200);
      });
});
</script>
<!-- 刪除確認的JS -->
<script type="text/javascript">
function del() {
      console.log ("delet?");
      var msg = confirm('請再確認是否刪除本文章!');

      if (msg == true) {

            
            
            alert("文章已刪除!");window.location = "posts.php";
            console.log ("delet ok");
            

      } else {
            console.log ("no delet");
            return false;
            
      }


};
</script>

<script>
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

      // 回到頂端樣式
      $(function() {
            var $win = $(window);
            var $backToTop = $('.js-back-to-top');

            $win.scroll(function() {
                  if ($win.scrollTop() > 100) {
                        $backToTop.show();
                  } else {
                        $backToTop.hide();
                  }
            });


            $backToTop.click(function() {
                  $('html, body').animate({
                        scrollTop: 0
                  }, 200);
            });
      });
</script>


</html>