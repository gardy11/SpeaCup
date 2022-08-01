<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: index.php");
}
require_once './php/config.php';
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SpeaCup有話直說</title>
  <link rel="icon" type="image/x-icon" href="assets/fav.ico" />
  <link href="CSS/style.css" rel="stylesheet" />
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
  <div id="fb-root"></div>
 
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

  <div id="siderbarright2">
            聊天
      </div>



  <!-- 登入相關JS -->
  <script src="./Js/pass-show-hide.js"></script>
  <script src="./Js/login.js"></script>

  

</body>


<script>




</script>

</html>