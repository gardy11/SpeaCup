<?php
include_once "myheader.php";
session_start();
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


      </nav>



      <div style="width: 60%;
  height:10%;">
            <?php
    include_once "newpost.php";
    ?>
      </div>
      <!-- <div id="siderbarindex">
    <div class="hotnew"style="border: solid 2px orange; width: 50%;">
  
        <div class="row">
          <img src="assets/img/bell.png " class="col-2"width="100%" >
          
          <p class="col-10">黃色皮卡丘</p>
        </div>
        <from class="row" style="width:95%; margin: 3%;">
          <input type="text"  style="word-wrap:break-word;" class="col-12" placeholder="編輯標題">
           
          </input>
          <div class="col-12">&nbsp</div>
          
          <textarea type="text" style="word-wrap:break-word;" class="col-12" >編輯內文
          </textarea> 
          
        
        
          </br></br>
          <div class="row" style="margin: 20px;">
          <div class="col-2"></div>
          <button type="submit" class="col-4">
                送出發文
    
          </button>
          <div class="col-1"></div>
          <button  class="col-4">
                取消發文
          </button>
          <div class="col-1"></div>
        </from>
    </div>
  </div> -->


      <div id="siderbarright1">
            <!-- 聊天對象選擇介面 -->
            <?php include_once "./php/users_select.php"; ?>
      </div>

      <div id="siderbarright2">
            聊天
      </div>

      <!-- 回到頂部小蝴蝶 -->
      <button class="js-back-to-top back-to-top" title="回到頂部"><i class="fa-solid fa-up-to-line"></i></button>

</body>


<script>
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