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


  <!-- 最新與熱門 -->
  <!--最新與熱門連資料庫和query-->
  <?php

  $mysqli = new mysqli('localhost', 'root', '', 'speacup', 3306);

  $sqlsearch = "SELECT * ,
  (likes+angry) as total FROM `posts` LEFT JOIN board_categories
  ON posts.cid = board_categories.cid 
  LEFT JOIN users ON posts.unique_id = users.unique_id WHERE title OR content LIKE '%$_POST[searchcontent]%';";
  $resultsearch = $mysqli->query($sqlsearch);
  $howmanysqlsearch = "SELECT count(*) AS searchcount
  FROM `posts` WHERE title OR content LIKE '%$_POST[searchcontent]%';";
  
  $resulthowmanysearch = $mysqli->query($howmanysqlsearch);
  ?>
  <!--最新與熱門html-->
    <div id="siderbarindex">
    
      


      
        <?php
        $rowmanysearch = $resulthowmanysearch->fetch_object();
        for ($i = 0; $i < $rowmanysearch->searchcount; $i++) {
          $rowsearch = $resultsearch->fetch_object();
          echo
          '<a href="post.php?aid=' . $rowsearch->aid . '" class="row" style="border: solid 2px orange; width: 100%; height: 300px;">' .
            '<div class="col-12 row">' .
              '<form class="row col-12">' .
              '<img src="./php/images/'.$rowsearch->img.' " class="col-2 dissapear" width="70px" height="70px">' .
                '<div class="col-2 mt-4 smallerword1" style=" text-align:center; font-size: 20px;color:#EA7500	;">' .
                $rowsearch->board_name .
                '</div>' .
                '<p class="col-4 mt-4" style=" text-align:center; font-size: 20px;color:#EA7500	;">' . $rowsearch->nickname . '</p>' .
              '</form>' .
              '<div class="col-12" style=" text-align:center;font-size: 30px;">' .
                '<p style="overflow-wrap: break-word;">>' . $rowsearch->title . '</p>' .
              '</div>' .
              '<div class="col-1 material-symbols-outlined" style="color:#ff8c00;">
              thumb_up_off
              </div>'.
              '<div class="col-1" style="color:#ff8c00;">'.$rowsearch->likes.'</div>'.
              '<div class="col-8 nopadding" style="height:12%;background:#FFD306;">'.
                '<div style="background:#ff8c00;height:100%; width: calc(100% * ('.$rowsearch->likes.'/'.$rowsearch->total.'));"></div>'.
              '</div>'.
              '<div class="col-1" style="color:#FFD306;">'.$rowsearch->angry.'</div>'.
              '<div class="col-1 material-symbols-outlined" style="color:#FFD306;">
              thumb_down_off
              </div>'.
              '<div class="col-12 nopadding" style="height:10%;">'.
                        '<p>&nbsp</P>'.
              '</div>'.
            '</div>' .
          '</a>';
        }
        ?>
        
      

      
      
    </div>
      

            

           

            

            

    <!-- 回到頂部 -->
    <button class="js-back-to-top back-to-top" title="回到頂部"><i class="fa-solid fa-arrow-up"></i></button>
    <!-- 前往發文介面 -->
    <a href="m-posts.php" title="會員中心"><button class="go-posts" title="前往發文">
        <i class="fa-solid fa-pen-to-square fa-xl" style=color:red></i></a>
    </button>


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

  window.onclick = function(ev) {
    if (ev.target.nodeName !== 'A') {
      doAnimateHide();
    }
  };
</script>

</html>