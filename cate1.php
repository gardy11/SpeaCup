<?php
session_start();
include_once "php/config.php";

if (!isset($_SESSION['unique_id'])) { //未登入時顯示請登入

      echo $a = "請登入";
      $output = "";
} else {  //已登入時顯示會員暱稱及登出
      $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
      if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
      }

      echo $a = $row['nickname'];
      $output .= '<a href="php/dereout.php" class="link-secondary">
             <p class="h5">登出</p>
             </a>';
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="script.js"></script>
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
                              <a href="index.php" calss="m-2">首頁<i class="fas mt-1 fa-solid fa-home"></i></i> </a>
                        </li>
                        <li style="background-color:wheat;">
                              <a href="cate1.php" calss="m-2">時事<i class="fas mt-1 fa-solid fa-newspaper"></i></i> </a>
                        </li>
                        <li>
                              <a href="cate2.php" calss="p-2">美食<i class="fas mt-1 fa-solid fa-utensils"></i></i> </a>
                        </li>
                        <li>
                              <a href="cate3.php" calss="p-2">演藝<i class="fas mt-1 fa-regular fa-music"></i></i></i>
                              </a>
                        </li>
                  </ul>
            </div>

      </div>


      <!-- 最新與熱門 -->
      <!--最新與熱門連資料庫和query-->
      <?php

      $mysqli = new mysqli('localhost', 'root', '', 'speacup', 3306);

      $sqlIndexHot = "SELECT * ,
  (likes+angry) as total 
  from posts LEFT JOIN board_categories
  ON posts.cid = board_categories.cid 
  LEFT JOIN users ON posts.unique_id = users.unique_id WHERE posts.cid = 1 ORDER BY total DESC;";
      $resultIndexHot = $mysqli->query($sqlIndexHot);
      $sqlIndexNew = "SELECT * ,
  (likes+angry) as total 
  from posts LEFT JOIN board_categories
  ON posts.cid = board_categories.cid 
  LEFT JOIN users ON posts.unique_id = users.unique_id WHERE posts.cid = 1
  ORDER BY created DESC;";
      $resultIndexNew = $mysqli->query($sqlIndexNew);


      ?>
      <!--最新與熱門html-->

      <div id="siderbarindex">

            <div class="w3-container hotnew" style="width: 100%">
                  <div class="w3-bar w3-black row">
                        <button class="w3-bar-item w3-button tablink w3-red col-6" onclick="openArticle(event,'ihot')">熱門發文</button>
                        <button class="w3-bar-item w3-button tablink col-6" onclick="openArticle(event,'inew')">最新發表</button>
                  </div>


                  <div id="ihot" class="article">
                        <?php

                        for ($i = 0; $i < 4; $i++) {
                              $rowIndexHot = $resultIndexHot->fetch_object();
                              echo
                              '<div class="row" style="border: solid 2px orange; width: 100%; height: 300px;">' .
                                    '<div class="col-12 row">' .
                                    '<form class="row col-12" >' .
                                    '<a style="text-decoration:none" href="m-index.php?unser_id=' . $rowIndexHot->unique_id . '">' .
                                    '<img src="./php/img/' . $rowIndexHot->img . ' " class="col-2 dissapear" width="70px" height="70px">' .
                                    '</a>' .

                                    '<a style="text-decoration:none" href="cate' . $rowIndexHot->cid . '.php?c_id=' . $rowIndexHot->cid . '">' .
                                    '<div class="col-2 mt-4 smallerword1" style=" text-align:center; font-size: 20px;color:#EA7500	;">' .
                                    $rowIndexHot->board_name .
                                    '</div>' .
                                    '</a>' .

                                    '<a style="text-decoration:none" href="m-index.php?user_id=' . $rowIndexHot->unique_id . '">' .
                                    '<p class="col-4 mt-4" style=" text-align:center; font-size: 20px;color:#EA7500	;">' . $rowIndexHot->nickname . '</p>' .
                                    '</a>' .

                                    '<p class="col-4 mt-4" style=" text-align:center; font-size: 15px;color:#EA7500	;">' . $rowIndexHot->created . '</p>' .
                                    '</form>' .

                                    '<div class="col-12" style=" text-align:center;font-size: 30px;">' .
                                    '<a style="text-decoration:none" href="post.php?aid=' . $rowIndexHot->aid . '">' .
                                    '<p style="overflow-wrap: break-word;">' . $rowIndexHot->title . '</p>' .
                                    '</a>' .
                                    '</div>' .

                                    '<div class="col-1 material-symbols-outlined" style="color:#ff8c00;">
              thumb_up_off
              </div>' .
                                    '<div class="col-1" style="color:#ff8c00;">' . $rowIndexHot->likes . '</div>' .
                                    '<div class="col-8 nopadding" style="height:12%;background:#FFD306;">' .
                                    '<div style="background:#ff8c00;height:100%; width: calc(100% * (' . $rowIndexHot->likes . '/' . $rowIndexHot->total . '));"></div>' .
                                    '</div>' .
                                    '<div class="col-1" style="color:#FFD306;">' . $rowIndexHot->angry . '</div>' .
                                    '<div class="col-1 material-symbols-outlined" style="color:#FFD306;">
              thumb_down_off
              </div>' .
                                    '<div class="col-12 nopadding" style="height:10%;">' .
                                    '<p>&nbsp</P>' .
                                    '</div>' .

                                    '</div>' .

                                    '</div>';
                        }
                        ?>

                  </div>

                  <div id="inew" class="article" style="display:none">
                        <?php

                        for ($i = 0; $i < 4; $i++) {
                              $rowIndexNew = $resultIndexNew->fetch_object();

                              echo
                              '<div class="row" style="border: solid 2px orange; width: 100%;">' .
                                    '<div class="col-12">' .
                                    '<form class="row">' .

                                    '<a style="text-decoration:none" href="m-index.php?user_id=' . $rowIndexNew->unique_id . '">' .
                                    '<img src="./php/img/' . $rowIndexNew->img . ' " class="col-2" width="70px" height="70px">' .
                                    '</a>' .

                                    '<a style="text-decoration:none" href="cate' . $rowIndexNew->cid . '.php?c_id=' . $rowIndexNew->cid . '">' .
                                    '<div class="col-2 mt-4 smallerword1" style=" text-align:center; font-size: 20px;color:#EA7500	;">' . $rowIndexNew->board_name . '</div>' .
                                    '</a>' .

                                    '<a style="text-decoration:none" href="m-index.php?user_id=' . $rowIndexNew->unique_id . '">' .
                                    '<p class="col-4 mt-4" style=" text-align:center; font-size: 20px;color:#EA7500	;">' . $rowIndexNew->nickname . '</p>' .
                                    '</a>' .
                                    '<p class="col-4 mt-4" style=" text-align:center; font-size: 15px;color:#EA7500	;">' . $rowIndexNew->created . '</p>' .
                                    '</form>' .
                                    '<div class="col-12" style="  text-align:center;font-size: 30px;">' .

                                    '<a style="text-decoration:none" href="post.php?aid=' . $rowIndexNew->aid . '">' .
                                    '<p style="overflow-wrap: break-word;">' . $rowIndexNew->title . '</p>' .
                                    '</a>' .

                                    '</div>' .
                                    '<div class="col-12 nopadding" style="height:12%;background:yellow;">' .
                                    '<div style="background:red;height:100%; width: calc(100% * (' . $rowIndexNew->likes . ' / ' . $rowIndexNew->total . '));"></div>' .
                                    '</div>' .
                                    '<div class="col-12 nopadding" style="height:10%;">' .
                                    '<p>&nbsp</P>' .
                                    '</div>' .
                                    '</div>' .
                                    '</div>';
                        }
                        ?>
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

      <!-- 回到頂部 -->
      <button class="js-back-to-top back-to-top" title="回到頂部"><i class="fa-solid fa-arrow-up"></i></button>
      <!-- 前往發文介面 -->
      <a href="m-posts.php" title="會員中心"><button class="go-posts" title="前往發文">
                  <i class="fa-solid fa-pen-to-square fa-xl" style=color:red></i></a>
      </button>



</body>


<script>
      //熱門最新選擇
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

      //發文介面
      function openvote() {
            window.open("https://open.spotify.com/track/5mxK8CuKCqxW7HlBjBtmRS?si=04d737c4b3614ade");
      }
</script>

</html>