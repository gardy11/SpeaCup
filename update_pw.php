<?php
session_start();
include_once "php/config.php";

if (!isset($_SESSION['unique_id'])) { //未登入時導向登入頁
  header("location: login.php");
}
?>

<?php //撈資料
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql) > 0) {
  $row = mysqli_fetch_assoc($sql);
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

      <div id="siderbarindex">
            <section class="form update_pw">
                  <form method="POST" action="#" enctype="text/plain" autocomplete="off">
                        <div id="m-inform" class="m-3">
                              <h1 class="ml-5 text-dark display-4">修改密碼</h1>

                              <hr class="hr">
                        </div>



                        <div id="m-password" class="m-3 field input">
                              <label class="ml-5 text-muted">請輸入舊密碼</label>
                              <div class="row ">
                                    <input type="password" name="old_pswd" class="form-control ml-5" id="m-password"
                                          placeholder="輸入舊密碼" />
                                    <i class="fa fa-eye"></i>
                              </div>
                              <hr class="hr">
                        </div>

                        <div id="m-password2" class="m-3 field input">
                              <label class="ml-5 text-muted">請輸入新密碼 密碼長度為大小寫英數字8-20字。</label>
                              <div class="row ">
                                    <input type="password" name="new_pswd" class="form-control ml-5" id="m-password2"
                                          placeholder="輸入新密碼" pattern="^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]{8,20}$" />
                                    <i class="fa fa-eye"></i>
                              </div>
                              <hr class="hr">
                        </div>

                        <div id="m-password3" class="m-3 field input">
                              <label class="ml-5 text-muted">確認新密碼</label>
                              <div class="row ">
                                    <input type="password" name="ch_pswd" class="form-control ml-5" id="m-password3"
                                          placeholder="再次輸入新密碼" pattern="^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]{8,20}$" />
                                    <i class="fa fa-eye"></i>
                              </div>
                              <hr class="hr">
                        </div>





                        <div class="error-txt"></div>
                        <div class="m-3 pl-5 field button">
                              <input type="submit" name="submit3" value="儲存修改">
                        </div>


                  </form>
            </section>


      </div>


      <div id="siderbarright1">
            廣告
      </div>

      <div id="siderbarright2">

      </div>


      <script src="./Js/pass-show-hide.js"></script>
      <script src="./Js/up_pswd.js"></script>
      <script src="./JS/chk_userInfo.js"></script>

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