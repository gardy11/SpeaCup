<?php
session_start();
include_once "php/config.php";

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

      <!-- 外部匯入樣式 -->

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="https://kit.fontawesome.com/993da95711.js" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="script.js"></script>
      <link rel="stylesheet" href="./css/style_chat.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <script language="javascript">
            function changeImageString(TargetID, FildAddres) {
                  document.images[TargetID].src = FildAddres;
            }
      </script>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
      <link rel="stylesheet" href="css/responsive.css">
</head>

<body class="body">

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
                        <li style="background-color:wheat;">
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
            <div id="collections" class="m-3 ">
                  <h1 class="ml-5 display-4">收藏文章</h1>
                  <hr class="hr">
            </div>

            <?php include_once "php/cn_posts.php"; ?>

      </div>


      <div id="siderbarright1">
            <!-- 聊天對象選擇介面 -->
            <?php include_once "./php/users_select.php"; ?>
      </div>
      <div id="siderbarright2">
           
           </div>

</body>


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