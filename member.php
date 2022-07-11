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
<?php  //更新資料庫
    $editFormAction = $_SERVER['PHP_SELF'];
    if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
    }

    if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
    
    $updateSQL ="UPDATE users SET nickname = '$fname', email = '$email' WHERE unique_id = {$_SESSION['unique_id']}";

    
    $Result1 = mysqli_query($conn, $updateSQL);

    $updateGoTo = "member.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $updateGoTo));
    }
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SpeaCup有話直說</title>
  <link href="CSS/style.css" rel="stylesheet" /><link rel="icon" type="image/x-icon" href="assets/fav.ico" />
  <script src="JS/scripts.js"></script>
  <script src="js/jquery-3.6.0.js"></script>

  <!-- 外部匯入樣式 -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/993da95711.js" crossorigin="anonymous"></script>
  <script
    language="javascript">function changeImageString(TargetID, FildAddres) { document.images[TargetID].src = FildAddres; }</script>
</head>


<body class="body">
  <!-- navbar -->
  <nav class="navbar fixed-top navbar-expand-md navbar-dark mr-1">
    <div clss="col-3">
      <a class="navbar-brand" href="index.php">
        <img src="assets/img/有話 直說 (1).png" width="35" height="35" class="d-inline-block align-top" >
        <img src="assets/img/SpeaCup.png" width="150" height="35" class="d-inline-block align-top" >
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
          <input class="form-control mr-sm-1" type="search" placeholder="SpeaCup" aria-label="Search">
          <button class="btn btn-outline-danger my-2 my-sm-0 " type="submit"><i
              class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <li class="nav-item pl-5 mr-5">
        <li><a href=""><i class="fa-solid fa-bell">&ensp;&ensp;</i></a></li>
        <li><a href="login.php" title="會員中心"><i class="fa-solid fa-user">&ensp;&ensp;</i></a></li>
        </li>
    </div>


  </nav>

  <div id="siderbarleft">
    <ul class="nav flex-column ind ">
      <li class="nav-item">
        <a class="nav-link " aria-current="page" href="member.php"><i class="fa-solid fa-bell">&ensp;基本資料</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="posts.php"><i class="fa-solid fa-bell">&ensp;發表過文章</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="collections.php"><i class="fa-solid fa-bell">&ensp;收藏文章</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="friends.php"><i class="fa-solid fa-bell">&ensp;好友列表</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="apply.php"><i class="fa-solid fa-bell">&ensp;申請好友</i></a>
      </li>
    </ul>
  </div>

  <div id="siderbarindex">
    <form  method="POST" action="<?php echo $editFormAction; ?>"  name="form1" id="form1">
      <div id="m-inform" class="mr-3 ml-3 mb-3">
        <h1 class="ml-5 text-dark display-5">基本資料</h1>
        <p class="ml-5">(暫放)狀態：<?php echo $row['status']; ?>
         <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">登出</a>
        </p>
        <hr class="hr">
      </div>
      <div id="m-nickname" class="m-3">
        <h4 class="ml-5 text-muted">帳號</h4>
        <p id="m-nickname-n" class="ml-5">@<?php echo $row['account']; ?></p>
        <hr class="hr">
      </div>
      <div id="m-nickname" class="m-3">
        <h4 class="ml-5 text-muted">暱稱</h4>
        <input type="text" name="fname" value="<?php echo $row['nickname']; ?>" 
               id="m-nickname-n" class="ml-5" required />
        <hr class="hr">
      </div>
      <div id="m-password" class="m-3">
        <h4 class="ml-5 text-muted">密碼</h4>
        <div class="row ">
          <!-- <label id="m-password-p" class="border border-secondary ml-5 col-3 ">******</label>
          <a class="col-2"></a> -->
          <button type="button" class="btn btn-outline-warning ml-5 col-2">更改密碼</button>
        </div>
        <hr class="hr">
      </div>
      <div id="m-img " class="m-3">
        <h4 class="ml-5 text-muted">頭貼</h4>
        <div class="row">
          <img src="php/images/<?php echo $row['img']; ?>" width="200px" height="200px" class="ml-5 col-3 rounded" alt="大頭貼">
          <div class="input-group mb-1 pb-5 col-7" width="300px">
            <input type="file" class="form-control " id="inputGroupFile02" width="300px">
          </div>
        </div>
        <hr class="hr">
      </div>
      <div id="m-bd" class="m-3">
        <h4 class="ml-5 text-muted">生日</h4>
        <label id="m-bd-b" class="ml-5"><?php echo $row['birth']; ?></label>
        <hr class="hr">
      </div>
      <div id="m-bd" class="m-3">
        <h4 class="ml-5 text-muted">性別：</h4>
        <label id="m-bd-b" class="ml-5"><?php echo $row['gender']; ?></label>
        <hr class="hr">
      </div>
      <div id="m-email" class="m-3">
        <h4 class="ml-5 text-muted">綁定信箱</h4>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" id="m-email-e" class="ml-5 " required />
      </div>
      <div id="m-bd" class="m-3">
        <h4 class="ml-5 text-muted">註冊日期：</h4>
        <label id="m-bd-b" class="ml-5"><?php echo substr($row['register'], 0, 10); ?></label>
        <hr class="hr">
      </div>

      <div id="m-c" class="m-3"><input type="submit" name="submit2" class="btn btn-outline-warning  m-3 ml-5 mb-5" value="儲存修改"></div>
      <input type="hidden" name="MM_update" value="form1">
    </form>

  </div>


  <div id="siderbarright1">
    廣告
  </div>

  <div id="siderbarright2">
    <p>聊天室暫放</p>

    <iframe src="users.php" ></iframe>
  </div>

  <!-- 回到頂部小蝴蝶 -->


</body>


<script>
  // 回到頂端樣式
  $(function () {
    var $win = $(window);
    var $backToTop = $('.js-back-to-top');

    $win.scroll(function () {
      if ($win.scrollTop() > 300) { $backToTop.show(); }
      else { $backToTop.hide(); }
    });


    $backToTop.click(function () { $('html, body').animate({ scrollTop: 0 }, 200); });
  });



</script>

</html>
