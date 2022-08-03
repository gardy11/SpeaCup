<?php
session_start();
include_once "php/config.php";

if (!isset($_SESSION['unique_id'])) { //未登入時顯示請登入

      $a = '<a href="login.php" class="link-secondary">
      <p class="h5">請登入</p> </a>';
      $b = "";
      $c = "";
} else {  //已登入時顯示會員暱稱及登出
      $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
      if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
      }

      $a = $row['nickname'];
      $b = ' <a href="member.php" class="link-secondary">
             <p class="h5">會員中心</p>  </a>';
      $c = '<a href="php/dereout.php" class="link-secondary">
             <p class="h5">登出</p></a>';
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




  <div id="siderbarindex">
    <section class="form login">

      <div id="l-login" class="mr-3 ml-3 mb-3">
        <h1 class="ml-5 text-dark display-5">會員登入</h1>
        <hr class="hr">
      </div>
      <form action="#">
        <div class="error-txt"></div>
        <!--顯示輸入錯誤訊息-->
        <div id="l-email" class="mb-3 ml-3 field input">
          <label for="l-email" class="form-label h4 ml-5">信箱/帳號</label>
          <div class="row">
          <input type="text" name="email_account" class="form-control ml-5 mt-2 col-5" id="l-email" placeholder="輸入信箱或帳號">
          <p class="col-2 mt-2"></p>
        </div>
        </div>

        <div id="l-password" class="mb-3 ml-3 field input">
          <label for="l-password" class="form-label h4 ml-5">密碼</label>
          <div class="row">
            <input type="password" name="password" class="form-control ml-5 mt-2 col-5" id="l-password" placeholder="輸入密碼">
            <i class="fa fa-eye col-2 mt-3"></i>
          </div>
        </div>
        <hr class="hr">
        <div id="l-login-l" class="row ml-4 mb-3 field button">
          <input type="submit" id="l-login-l" class="btn btn-outline-warning ml-5 col-4 btn-lg" value="會員登入" />
          <button onclick="location.href ='<?php echo $client->createAuthUrl() ?>'" 
                  class="btn btn-outline-primary btn-lg ml-5 col-4"><i class="bi bi-google"></i>Google Login</button>

          <p class="col-6 mt-2">還沒有會員嗎?<a href="register.php">點我註冊</a></p>
        </div>
        
      </form>
      
    </section>
  </div>




  <!-- 登入相關JS -->
  <script src="./Js/pass-show-hide.js"></script>
  <script src="./Js/login.js"></script>

  

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
