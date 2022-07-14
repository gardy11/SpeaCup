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
        <li><a href="member.php" title="會員中心"><i class="fa-solid fa-user">&ensp;&ensp;</i></a></li>
        </li>
    </div>


  </nav>

  <div id="siderbarleft">
    <ul class="nav flex-column ind ">
      <li class="nav-item">
        <a class="nav-link " aria-current="page" href="index.php"><i class="fa-solid fa-mug-hot">&ensp;首頁</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cate1.php"><i class="fa-solid fa-mug-hot">&ensp;類別一</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="cate2.php"><i class="fa-solid fa-mug-hot">&ensp;類別二</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cate3.php"><i class="fa-solid fa-mug-hot">&ensp;類別三</i></a>
      </li>

    </ul>
  </div>


  <div id="siderbarindex">
    <div class="w3-container hotnew" style="width: 100%">
      <div class="w3-bar w3-black row">
        <button class="w3-bar-item w3-button tablink w3-red col-6" onclick="openArticle(event,'ihot')">熱門發文</button>
        <button class="w3-bar-item w3-button tablink col-6" onclick="openArticle(event,'inew')">最新發表</button>
      </div>

      
      <div id="ihot" class="article">
        <div class="row" style="border: solid 2px orange; width: 100%;">
          <div class="col-12">
            <form class="row">
              <img src="assets/img/bell.png " class="col-2" width="70px" height="70px">
              <div class="col-2 mt-4" style=" text-align:center; font-size: 20px;">類別一</div>
              <p class="col-4 mt-4" style=" text-align:center; font-size: 20px;">黃色皮卡丘</p>
            </form>
            <div class="col-12" style=" text-align:center;font-size: 30px;">
              <p>大標題就決定字體20px了</p>
            </div>
            <div class="col-12">
              <p>比例列</p>
            </div>
          </div>
        </div>
      </div>

      <div id="inew" class="article" style="display:none">
        <div class="row" style="border: solid 2px orange; width: 100%;">
          <div class="col-12">
            <form class="row">
              <img src="assets/img/bell.png " class="col-2" width="70px" height="70px">
              <div class="col-2 mt-4" style=" text-align:center; font-size: 20px;">類別一</div>
              <p class="col-2 mt-4" style=" text-align:center; font-size: 20px;">黃色皮卡丘</p>
            </form>
            <div class="col-12" style=" text-align:center;font-size: 30px;">
              <p>這是最新發表的文章喔</p>
            </div>
            <div class="col-12">
              <p>比例列</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="siderbarright1">
      廣告
    </div>

    <div id="siderbarright2">
      聊天
    </div>




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

</script>

</html>