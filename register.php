<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SpeaCup有話直說</title>
  <link rel="icon" type="image/x-icon" href="assets/fav.ico" />
  <link href="css/style.css" rel="stylesheet" />
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

  <div id="siderbarindex">
    <section class="form signup">
      <div id="register" class="mr-3 ml-3 mb-3">
        <h1 class="ml-5 text-dark display-5">會員註冊</h1>
      </div>
      <hr class="hr">

      <form action="#" enctype="multipart/form-data" autocomplete="off" class="register">
        <div class="error-txt"></div>

        <div id="r-email" class="m-3 field input">
          <h4 class="ml-5 ">信箱</h4>
          <input type="email" name="email" class="form-control ml-5" id="r-email" 
                 placeholder="輸入電子信箱" maxlength="20" require 
                 pattern="[a-z0-9._]+@[a-z0-9._]+\.[a-z]{2,4}$"/>
        </div>
      
        <div id="r-account" class="m-3">
          <div class="row">
            <h4 class="ml-5 col-3">帳號</h4>
            <span id="passwordHelpInline" class="form-text mt-2 pr-5 col-6 text-muted" >&ensp;帳號長度為大小寫英數字8-20字。</span>
          </div>
          <div class="col-auto row field input">
            <input type="text" name="account" id="inputAccount6" class="form-control ml-5 account" 
                   placeholder="輸入帳號" aria-describedby="passwordHelpInline"  
                   pattern="^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]{8,20}$" require/>
                   
                    
          </div>

        </div>

        <div id="r-password" class="m-3 field input">
          <div class="row">
            <h4 class="ml-5 col-3">密碼</h4>
            <span id="passwordHelpInline" class="form-text mt-2 pr-5 col-6 text-muted">&ensp;密碼長度為大小寫英數字8-20字。</span>
          </div>
          <div class="col-auto row field input">
            <input type="password" name="password" id="inputPassword6" class="form-control ml-5 password" 
                   placeholder="輸入密碼" aria-describedby="passwordHelpInline" 
                   pattern="^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]{8,20}$" require />
                   
            <i class="fa fa-eye col-2 mt-3"></i>
            
          </div>
        </div>

        <div class="name-details" >
          <div class="m-3 field input">
            <h4 class="ml-5 ">暱稱:</h4>
            <input type="text" name="fname" class="form-control ml-5" placeholder="請輸入暱稱" maxlength="20" required />
          </div>
        </div>

        <div id="r-bd" class="m-3 ">
          <h4 class="ml-5 ">生日</h4>
          <!-- 限制日期只可選取不可自行輸入! -->
          <div id="r-bd-r" class="ml-5 field">
            <input type="date" name="birth" id="r-bd" 
                   onkeydown="return false"    
                   required />
            <span class="validity"></span>
          </div>
          
        </div>

        <div class="gender m-3 mt-2">
          <h4 class="ml-5 ">性別:</4>
            <input type="radio" name="gender" value="男" checked="checked" required /><label>男</label>
            <input type="radio" name="gender" value="女" required /><label>女</label>
        </div>

        <div class="field image m-3">
          <h4 class="ml-5 ">頭貼:</4>
          <img id="preview_img" src="php/images/review.png" width="200px" height="200px" />  
          <input type="file" name="image" id="src_img" required />
        </div>

        <div id="r-register" class="m-3 pl-5 field button row">
          <input type="submit" id="l-login-l" class="btn btn-outline-warning ml-5 col-3" value="會員註冊" />
          <div class="link col-5 mt-2">已經註冊了嗎?<a href="login.php"> 馬上登入</a></div>
        </div>

        
        

      </form>
      
    </section>


  </div>

  <script src="./JS/pass-show-hide.js"></script>
  <script src="./JS/chk_userInfo.js"></script>
  <script src="./JS/signup.js"></script>
  
</body>


<script>
  export default {
    data() {
      const now = new Date()
      const today = new Date(now.getFullYear(), now.getMonth(), now.getDate())
      // 15th two months prior
      const minDate = new Date(today)
      minDate.setMonth(minDate.getMonth() - 2)
      minDate.setDate(15)
      // 15th in two months
      const maxDate = new Date(today)
      maxDate.setMonth(maxDate.getMonth() + 2)
      maxDate.setDate(15)

      return {
        value: '',
        min: minDate,
        max: maxDate
      }
    }
  }
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

  $("#src_img").change(function() {

    readURL(this);

  });
</script>

</html>