<?php
session_start();

include('php/like_dislike.php');
include('php/collection.php');

$user_id = $_SESSION['unique_id'];
?>
<?php
$sql = "SELECT * FROM posts INNER JOIN users ON posts.unique_id = users.unique_id ORDER BY aid DESC";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) {
      $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
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

            <div class="nav-navbar collapse navbar-collapse navbar-right " id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto pl-1">
                        <form class="form-inline">
                              <input class="form-control mr-sm-1" type="search" placeholder="SpeaCup" aria-label="Search">
                              <button class="btn btn-outline-danger my-2 my-sm-0 " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
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
                              <a href="member.php" calss="m-2">基本資料<i class="fas mt-1 fa-solid fa-user-check"></i></i> </a>
                        </li>
                        <li>
                              <a href="collections.php" calss="m-2">收藏文章<i class="fas mt-1 fa-solid fa-file-circle-plus"></i></i> </a>
                        </li>
                        <li>
                              <a href="posts.php" calss="p-2">發表過文章<i class="fas mt-1 fa-regular fa-pen-to-square"></i></i> </a>
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
            <div id="collections" class="m-3 ">
                  <h1 class="ml-5 display-4">編輯文章</h1>
                  <hr class="hr">
            </div>


            <div class="wrapper">
                  
                        <header style="height: 10%;">
                              <?php

                              $aid2 = mysqli_real_escape_string($conn, $_GET['aid']);
                              $sql2 = mysqli_query($conn, "SELECT * FROM posts INNER JOIN users ON posts.unique_id = users.unique_id LEFT JOIN board_categories  ON posts.cid = board_categories.cid WHERE aid =  $aid2 ORDER BY aid DESC");
                              if ($aid2 === "") {
                                    header("location: login.php");
                              }
                              if (mysqli_num_rows($sql2) > 0) {
                                    $row = mysqli_fetch_assoc($sql2);
                              } else {
                                    header("location: posts.php");
                              }

                              ?>
                              <!--看板、頭貼、發文者、發文時間-->
                              
                              <a href="cate<?php echo $row['cid']; ?>.php?c_id=<?php echo $row['cid']; ?>">
                                    <span class="col-2" style="font-size: 20px;"><?php echo $row['board_name']; ?></span>
                              </a>

                              <a href="m-index.php?user_id=<?php echo $row['unique_id']; ?>">
                                    <img src="php/images/<?php echo $row['img']; ?>" style="border-radius: 50%;" alt="" width="6%" height="6%">
                              </a>

                              <a href="m-index.php?user_id=<?php echo $row['unique_id']; ?>">
                                    <span class="col-2" style="font-size: 20px;"><?php echo $row['nickname']; ?></span>
                              </a>

                              <span class="time-text col-4"><?php echo nl2br($row['created']) ?></span>
                              

                        </header>
                        <!--文章標題、內容、讚按鈕、收藏紐-->
                        <div class="container">
                              <div class="content">
                              <section class="form edit_post">

                                 <form method="POST" action="./php/up_post.php" class="posting-area" enctype="multipart/form-data">
                                    <p class="content-text">
                                    
                                    <label id="autoresizing" style="font-size:30px;">標題：</label></br>
                                    <textarea rows="1" type ="text" name="up_title" id="autoresizing" spellcheck="false"
                                              style="width: 70%; font-size:30px;resize:none;">
                                    <?php echo $row['title'] ?>
                                    </textarea>
                                    </br>
                                    <!-- 讓內容可以顯示出換行 -->
                                    <label id="input-content" style="font-size:30px;">內文：</label></br>
                                    <textarea contenteditable name="up_content" id="input-content" spellcheck="false" 
							    style="resize:none; overflow-y:auto; height: 600px; width: 70%;font-size:20px;">
                                    <?php echo $row['content'] ?>
                                    </textarea>
                                    
                                    <button type="button" class="btn btn-light" onclick="location.href ='user_post.php?aid=<?php echo $row['aid'] ?>'">取消</button>
						<input type="submit" name="submitbtn" id="submitbtn" class="btn btn-light submit-btn" value="確認修改"/>
                                    

                                    </form>
                                    </section> 

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

                        
                  
            </div>


      </div>


      <div id="siderbarright1">
            <!-- 聊天對象選擇介面 -->
            <?php include_once "./php/users_select.php"; ?>
      </div>

      <div id="siderbarright2">
            聊天
      </div>








      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="Myjs/like_dislike.js"></script>
      <script src="Myjs/collection.js"></script>
      <script src="./Myjs/post.js"></script>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">



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

</html>