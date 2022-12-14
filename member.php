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
                        <li style="background-color:wheat;">
                              <a href="member.php" calss="m-2">基本資料<i class="fas mt-1 fa-solid fa-user-check"></i></i>
                              </a>
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
            <section class="form update">
                  <form method="POST" action="#" enctype="multipart/form-data" autocomplete="off">
                        <div id="m-inform" class="mr-3 ml-3 mb-3">
                              <h1 class="ml-5 text-dark display-5">基本資料</h1>
                              <hr class="hr">
                        </div>
                        <div id="m-nickname" class="m-3">
                              <h4 class="ml-5 text-muted">帳號</h4>
                              <p id="m-nickname-n" class="ml-5">@<?php echo $row['account']; ?></p>
                              <hr class="hr">
                        </div>
                        <div id="m-nickname" class="m-3 field input">
                              <h4 class="ml-5 text-muted">暱稱</h4>
                              <input type="text" name="fname" value="<?php echo $row['nickname']; ?>" id="m-nickname-n" class="ml-5" required />
                              <!-- <p id="m-nickname-n" class="ml-5"><?php echo $row['nickname']; ?></p> -->
                              <hr class="hr">
                        </div>

                        <div id="m-password" class="m-3">
                              <h4 class="ml-5 text-muted">密碼</h4>
                              <div class="row ">
                                    <button class="btn btn-outline-warning ml-5 col-2" onclick="location.href='update_pw.php'">更改密碼</button>

                              </div>
                              <hr class="hr">
                        </div>

                        <div id="m-img " class="m-3 ">
                              <h4 class="ml-5 text-muted">頭貼</h4>
                              <div class="row">

                                    <input type="hidden" name="old_img" value="/<?php echo $row['img']; ?>" />

                                    <img src="php/images/<?php echo $row['img']; ?>" width="200px" height="200px" class="ml-5 col-3 rounded" alt="大頭貼">

                                    <div class="col" style="padding-left:10%">
                                          <div class="input-group mb-1 pb-5 col-7 field image" width="200px">
                                                <img id="preview_img" src="php/images/review.png" width="200px" height="200px" style="padding-bottom:2%" />
                                                <input type="file" name="image" accept="image/*,.jpeg, .png, .jpg" class="form-control " id="inputGroupFile02" width="200px">
                                          </div>
                                    </div>

                              </div>
                              <hr class="hr">
                        </div>


                        <div id="m-bd" class="m-3">
                              <h4 class="ml-5 text-muted">生日</h4>
                              <?php if ($row['birth'] != "0000-00-00") { ?>
                                    <!-- google登入者須填寫生日，一般登入回傳預設值 -->
                                    <p id="m-nickname-n" class="ml-5"><?php echo $row['birth']; ?></p>
                                    <!-- 隱藏區塊 回傳預設值到後端以進行更新作業 -->
                                    <div id="r-bd-r" class="ml-5 field" style="display:none">
                                          <input type="date" name="birth" id="r-bd" value="<?php echo $row['birth'] ?>" required />
                                    </div>
                              <?php } else { ?>
                                    <!-- 限制日期只可選取不可自行輸入 -->
                                    <div id="r-bd-r" class="ml-5 field">
                                          <input type="date" name="birth" id="r-bd" onkeydown="return false" required />
                                          <label style="color: red;padding-left:2.5%;">*生日待填寫(填好不可修改)</label>
                                    </div>
                              <?php  } ?>

                              <hr class="hr">
                        </div>

                        <div id="m-bd" class="m-3 mt-2">
                              <h4 class="ml-5 text-muted">性別：</h4>
                              <?php if ($row['gender'] != "") { ?>
                                    <!-- google登入者須填寫性別，一般登入回傳預設值 -->
                                    <p id="m-nickname-n" class="ml-5"><?php echo $row['gender']; ?></p>
                                    <!-- 隱藏區塊 回傳預設值到後端以進行更新作業 -->
                                    <div class="gender m-3 mt-2" style="display:none">
                                          <input id="g1" type="radio" name="gender" value="男" class="ml-5" required /><label for="g1">男</label>
                                          <input id="g2" type="radio" name="gender" value="女" class="ml-5" required /><label for="g2">女</label>
                                          <!-- 未勾選按鈕的情況下 回傳預設值 -->
                                          <input type="hidden" name="gender" value="<?php echo $row['gender']; ?>" class="ml-5" required />
                                    </div>
                              <?php } else { ?>
                                    <div class="gender m-3 mt-2">
                                          <input id="g1" type="radio" name="gender" value="男" class="ml-5" required /><label for="g1">男</label>
                                          <input id="g2" type="radio" name="gender" value="女" class="ml-5" required /><label for="g2">女</label>
                                          <label style="color: red; padding-left:3%;">*性別待填寫(填好不可修改)</label>
                                    </div>
                              <?php  } ?>

                              <hr class="hr">
                        </div>


                        <div id="m-email" class="m-3 field input">
                              <h4 class="ml-5 text-muted">綁定信箱</h4>
                              <?php if ($row['mid'] != 0) { ?>
                                    <!-- 一般登入信箱可修改，google登入信箱不可修改-->
                                    <!-- 傳回預設值以讓後端更新-->
                                    <input type="email" name="email" value="<?php echo $row['email']; ?>" id="m-email-e" class="ml-5 " readonly required />
                                    <label style="color: red; padding-left:3%;">*使用google登入的帳戶信箱不可修改</label>
                              <?php } else { ?>
                                    <input type="email" name="email" value="<?php echo $row['email']; ?>" id="m-email-e" class="ml-5 " required />
                              <?php  } ?>

                        </div>

                        <hr class="hr">
                        <div id="m-bd" class="m-3">
                              <h4 class="ml-5 text-muted">註冊日期：</h4>
                              <label id="m-bd-b" class="ml-5"><?php echo substr($row['register'], 0, 10); ?></label>
                              <hr class="hr">
                        </div>

                        <div class="error-txt"></div>
                        <div id="m-c" class="m-3 field button">
                              <input type="submit" name="submit2" class="btn btn-outline-warning  m-3 ml-5 mb-5" value="儲存修改">
                        </div>


                  </form>
            </section>
      </div>


      <div id="siderbarright1">
            <!-- 聊天對象選擇介面 -->
            <?php include_once "./php/users_select.php"; ?>
      </div>

      <div id="siderbarright2">

      </div>


      <script src="./Js/user_update.js"></script>

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

<script>
      //選擇大頭貼預覽

      function readURL(input) {
            if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                        if (input.files[0]) {

                        }
                        $("#preview_img").attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);
            }
      }

      $("#inputGroupFile02").change(function() {

            readURL(this);

      });
      //會員中心
      function doAnimateShow() {
            document.getElementById("box").style.top = "90px";
            event.cancelBubble = true;
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


<script>
     
</script>

</html> 