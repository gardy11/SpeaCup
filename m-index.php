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

  <div id="siderbarleft" class="siderbarleft">
    <div id="sidebar">
      <button type="button" id="collapse" class="collapse-btn">
        <i class="fas fa-align-left"></i>
      </button>
      <ul class="list-unstyled p-1 ">
        <li>
          <a href="member.php" calss="m-2">基本資料<i class="fas mt-1 fa-solid fa-user-check"></i></i> </a>
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
          <a href="apply.php" calss="m-2">好友申請<i class="fas mt-1 fa-solid fa-user-pen"></i></i> </a>
        </li>
      </ul>
    </div>
  </div>


  <div id="siderbarindex">
    <div id="m-index-m" class="m-3">
      <h1 class="ml-5 display-4">個人主頁</h1>
    </div>
    <hr class="hr">

    <div id="m-img-m " class="m-3">
      <h4 class="ml-5 text-muted">頭貼</h4>
      <img src="assets/img/有話 直說 (1).png" width="200px" height="200px" class="ml-5  rounded">
      <h4 class="ml-5 mt-5 text-muted">暱稱</h4>
      <label id="m-bd-b" class="ml-5 ">黃色的皮卡丘</label>
 <hr class="hr">
    </div>
   

    <div id="m-bd-m" class="m-3">
      <h4 class="ml-5 text-muted">生日</h4>
      <label id="m-bd-b" class="ml-5">1996/02/23</label>
      <hr class="hr">
    </div>
    <div id="m-email-m" class="m-3">
      <h4 class="ml-5 text-muted">綁定信箱</h4>
      <label id="m-email-e" class="ml-5 ">pika@gmail.com</label>
    </div>

    <div id="m-index-p" class="m-3">
      <h1 class="ml-5 display-4">發表過文章</h1>
    </div>
    <hr class="hr">
    
    <div id="p1" class="m-3 mb-3">
      <div id="p1" class="row mb-2 ml-5 ">
        <img src="" class="" width="40px" height="40px"></img>
        <h5 class="ml-5">類別二</h5>
        <h5 class="ml-5">黃色的皮卡丘</h5>
      </div>
      <div id="p1" class="row mt-4 ml-5">
        <h3 class="">一個大標題1</h3>
        <p class="ml-5">2022/01/13</p>
      </div>
    </div>
    <hr class="hr">
  </div>


  <div id="siderbarright1">
    廣告
  </div>

  <div id="siderbarright2">
    聊天
  </div>




</body>


<script>


</script>

</html>