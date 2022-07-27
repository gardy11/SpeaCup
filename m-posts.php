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
  </div>
  <!-- /////////////////////發文 -->
  
  <div id="siderbarindex" style="border: solid 2px orange;width: 50%;margin: 10%;margin-top: 3%;">
  <section class="users">
                  <header>
                        <div class="content">
                              
							  <?php
							 
                              $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                              if (mysqli_num_rows($sql) > 0) {
                                    $row = mysqli_fetch_assoc($sql);
                              }else {
								header("location: users.php");
						     }
                              ?>					  
							

							<div class="dropdown" style="width: 200px">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" >
									點此選擇發文看板
								</button>
								<div class="dropdown-menu" id="SelectMe">
									<a class="dropdown-item" href="#" value="1" >時事</a>
									<a class="dropdown-item" href="#" value="2" >美食</a>
									<a class="dropdown-item" href="#" value="3" >演藝</a>
									
								</div>
							</div>
															

                              <img src="php/images/<?php echo $row['img']; ?>" alt="" />
                              <div class="details">
                                    <span><?php echo $row['nickname']; ?></span>
                                    <div><p style="font-weight: lighter;"><?php date_default_timezone_set('Asia/Taipei');
												echo date('Y/m/d H:i');
											?></p>
									</div>
							</div>							 					
                        </div>						
				 </header>
				 
				 
				        <form  method="POST" action="php/insert-post.php" class="posting-area" enctype="multipart/form-data" > 

							  <input type="text" name="cid" class="cid" value="" hidden>	
							  <input type="text" name="aid" class="aid" value="<?php echo $aid; ?>" hidden>
							  <input type="text" name="unique_id" class="unique_id" value="<?php echo $unique_id; ?>" hidden>
							  <textarea rows="1" type ="text" name="title" id="autoresizing" spellcheck="false" class="input-field input-title" placeholder="標題" style="position:relative; top:5px; overflow:hidden; border:none; outline:none; width:540px; font-size:30px;"></textarea><br /><br />
							  
							  
							  <textarea contenteditable name="content" id="input-content" class="input-field input-content" spellcheck="false" placeholder="內容..." 
							  style="position:relative; top:2px; resize:none; overflow-y:auto; border:none; outline:none; height: 400px; width:540px;"></textarea>
							  

							  <!-- <div contenteditable="true" name="content" id="input-content" class="input-field input-content" placeholder="內容..." style="position:relative; top:2px; resize:none; overflow:hidden;  border:none; outline:none; height: 400px; width:540px;"><img contenteditable="false" style="max-width:540px" id="myimg" /></div> -->

							  <!-- <div contenteditable="true" data-placeholder="(內容...)" class="input-content" name="content" id="input-content"   
							  style="position: relative; flex: 1 1 0%; line-height: 22px; font-size: 16px; 
							  outline: none; border: none; word-break: break-word; height: 400px; width:540px;"></div> -->
							  <!-- <div data-dcard-editor-index="0"><div style="caret-color: transparent;">
							  <div class="sc-ce377132-0 btqnSF"><div class="sc-ce377132-6 fRnKqK"> -->
								

							  <!-- <div id="textarea" contenteditable>
								<img contenteditable="false" style="width:45px" id="myimg" />
								I look like a textarea

								</div> -->

								<!-- <div id="textarea" contenteditable>
								<img contenteditable="false" style="max-width:540px" id="myimg" />
								I look like a textarea

								</div> -->

							  <br/><br/>	
							  <!-- <label for = "post_img">
							  <i class="fa-solid fa-image" style="cursor:pointer;"></i>
							  </label> -->
							  <input type ="file" name="post_img[]" id="post_img" accept="image/*" multiple style="display:none;"></input>

							  

							  <button type="button" >取消</button>
							  <button type="submit" name="submitbtn" id="submitbtn"   >下一步</button>
							 
						</form>	  
						
			</section>
  </div>
  <div id="siderbarright1">
      廣告
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