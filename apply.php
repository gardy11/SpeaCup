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
      <div id="friends" class="m-3">
        <h1 class="ml-5 display-4">申請好友</h1>
      </div>
      <hr class="hr"> 

      <div id="a-apply" class="row ml-5 m-3">
        <img src="assets/img/有話 直說 (1).png" width="70px" height="70px" class="ml-3 col-2">
        <h3  class="ml-3 col-6 mt-3">超吉利吉利蛋</h3>     
        <button id="a-inform"class="btn ml-3 col-2" title="好友資訊"><i class="fa-solid fa-address-card fa-2x "></i></button>
      </div>
      <hr class="hr">
  
      <div id="f-friends" class="row ml-5 m-3">
        <img src="assets/img/有話 直說 (1).png" width="70px" height="70px" class="ml-3 col-2">
        <h3  class="ml-3 col-6 mt-3">袋獸媽媽</h3>       
        <button id="a-inform"class="btn ml-3 col-2" title="好友資訊"><i class="fa-solid fa-address-card fa-2x "></i></button>
      </div>
      <hr class="hr">
  
      <div id="f-friends" class="row ml-5 m-3">
        <img src="assets/img/有話 直說 (1).png" width="70px" height="70px" class="ml-3 col-2">
        <h3  class="ml-3 col-6 mt-3">乘風破浪的成龍</h3>       
        <button id="a-inform"class="btn ml-3 col-2" title="好友資訊"><i class="fa-solid fa-address-card fa-2x "></i></button>
      </div>
      <hr class="hr">
  
      <div id="f-friends" class="row ml-5 m-3">
        <img src="assets/img/有話 直說 (1).png" width="70px" height="70px" class="ml-3 col-2">
        <h3 class="ml-3 col-6 mt-3">世界第一超夢</h3>       
        <button id="a-inform"class="btn ml-3 col-2" title="好友資訊"><i class="fa-solid fa-address-card fa-2x "></i></button>
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