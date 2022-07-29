<?php
include_once "myheader.php";
session_start();
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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SpeaCup有話直說</title>
<link href="CSS/style.css" rel="stylesheet" />
<link rel="icon" type="image/x-icon" href="assets/fav.ico" />
<link rel="stylesheet" href="./css/style_chat.css">
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
        <li><a class="fa-solid fa-user" onclick="doAnimateShow();">&ensp;&ensp;</a></li>
        </li>
    </div>

    <!-- 會員圖案click後的box -->
    <div class="box" id="box">
      <div class="row">
        <p class="h5">&ensp;&ensp;HI!&ensp;&ensp;</p>
        <p class="h5 text-primary"><?php echo $row['nickname']; ?></p>
      </div>
      <a href="member.php" class="link-secondary">
        <p class="h5">會員中心</p>
      </a>
      <a href="php/dereout.php" class="link-secondary">
        <p class="h5">登出</p>
      </a>
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
        <li>
          <a href="cate1.php" calss="m-2">時事<i class="fas mt-1 fa-solid fa-newspaper"></i></i> </a>
        </li>
        <li>
          <a href="cate2.php" calss="p-2">美食<i class="fas mt-1 fa-solid fa-utensils"></i></i> </a>
        </li>
        <li>
          <a href="cate3.php" calss="p-2">演藝<i class="fas mt-1 fa-regular fa-music"></i></i></i> </a>
        </li>
      </ul>
    </div>

  </div>


  <div id="siderbarindex">
    <div class="mr-3 ml-3 mb-3" style="width:100%;text-align:left;">
      <h1 class="ml-5 display-5">發表文章</h1>
      
    </div>
    <hr class="hr">
    <div style="border: solid 2px orange;width:90%;height: 600px;margin:0% auto;">



      <!--發文介面-->
      <?php
      include_once "newpost.php";
      ?>

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

  window.onclick = function(ev) {
    if (ev.target.nodeName !== 'A') {
      doAnimateHide();
    }
  };
</script>

</html>