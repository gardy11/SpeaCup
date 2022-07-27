<!-- 看所有人的貼文 -->
<br/><br/><br/><br/><br/><br/>
<?php 
session_start();
include_once "myheader.php"; ?>

<body>
      <div class="wrapper">
            <section class="users">
                  <header>
                        <div class="content">
                              <?php
                              $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                              if (mysqli_num_rows($sql) > 0) {
                                    $row = mysqli_fetch_assoc($sql);
                              }
                              ?>
                              <div class="details">
                              <span>全部</span><span>追蹤</span><span>主題</span>
                              </div>
                        </div>
                  </header>
                  <div class="search">
                        <span class="text">搜尋文章</span>
                        <input type="text" placeholder="尋找對象..." />
                        <button><i class="fa fa-search"></i></button>
                  </div>
            
                  <div class="users-list" style="margin:top; 100px;">                                  
                  </div>  
                  
            </section>
      </div>

      <script src="./Myjs/posts.js"></script>
      <!-- <link rel="stylesheet" href="mystyle.css">
      <link rel="stylesheet" href="main.css"> -->
