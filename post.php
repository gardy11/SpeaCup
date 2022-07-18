<?php 
      session_start(); 
                 
      include('php/like_dislike.php'); 
      include('php/collection.php'); 
      include_once "myheader.php";   
      $user_id = $_SESSION['unique_id'];
?>




<?php 
 $sql = "SELECT * FROM posts INNER JOIN users ON posts.unique_id = users.unique_id ORDER BY aid DESC";
 $query = mysqli_query($conn, $sql);
 while ($row = mysqli_fetch_assoc($query)) {
 $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
 }
?>

<body>
      <div class="wrapper">
            <section class="chat-area">
                  <header>
                        <?php                       

                        $aid = mysqli_real_escape_string($conn, $_GET['aid']);
                        $sql = mysqli_query($conn, "SELECT * FROM posts INNER JOIN users ON posts.unique_id = users.unique_id WHERE aid =  $aid ORDER BY aid DESC");
                        if ($aid === "") {
                              header("location: login.php");
                        }
                        if (mysqli_num_rows($sql) > 0) {
                              $row = mysqli_fetch_assoc($sql);
                        } else {
                              header("location: posts.php");
                        }

                        ?>
                        
                        <a href="posts.php" class="back-icon"><i class="fa fa-arrow-left"></i></a>
                        <img src="php/images/<?php echo $row['img']; ?>" alt="">
                        <div class="details">
                              <span><?php echo $row['nickname']; ?></span>
                              <p class="time-text"><?php echo nl2br($row['created']) ?></p>
                        </div>
                        <i class="fa-solid fa-pen-to-square fa-lg" style="position:relative; left:240px;"></i>
                  </header>

            <div class="container"> 
                  <div class="content">
                        <p class="content-text"> 
                              <h6 class="text-body title-text"> <?php echo $row['title'] ?></h6>    
                              <?php echo str_replace("\n", "<br/>", $row['content']) ?> <!-- 讓內容可以顯示出換行 -->

                              <br><br><br>

                              <i 
                                    <?php if(userLiked($row['aid'])): ?>
                                          class="fa fa-thumbs-up like-btn bluei" 
                                    <?php else: ?>
                                          class="fa fa-thumbs-o-up like-btn bluei" 
                                    <?php endif ?>
                                    
                                    data-id="<?php echo $row['aid'] ?>">
                              </i>
                              <span class="likes"><?php echo getLikes($row['aid']); ?></span>

                               &nbsp;&nbsp;&nbsp;&nbsp;

                              <!-- if user dislikes post, style button differently -->
                              <i 
                                    <?php if(userDisliked($row['aid'])): ?>
                                          class="fa fa-thumbs-down dislike-btn bluei" 
                                    <?php else: ?>
                                          class="fa fa-thumbs-o-down dislike-btn bluei" 
                                    <?php endif ?>  
                                    data-id="<?php echo $row['aid'] ?>">
                              </i>  
                                    <span class="dislikes"><?php echo getDislikes($row['aid']); ?></span>

                              <!-- <i id="browers" style="position:relative;left:120px;" class="far fa-eye"> 5</i>
                              <i id="comments" style="position:relative;left:150px;" class="far fa-comment ml-2"> 3</i>  -->
                              <i 
                                    <?php if(userCollected($row['aid'])): ?>
                                          class="fa fa-bookmark collection-btn redi" 
                                    <?php else: ?>
                                          class="fa fa-bookmark-o collection-btn redi" 
                                    <?php endif ?>  
                                    data-id="<?php echo $row['aid'] ?>"
                                    style="position:relative;left:400px;" >      
                              </i>
                        </p>
                  </div>
            </div>  


                  <form action="#" class="typing-area">
                        <input type="text" name="message" class="input-field" placeholder="留個言吧.."
                              autocomplete="off" />
                        <button><i class="fa fa-telegram"></i></button>
                  </form>
            </section>
      </div>

      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>  
      <script src="Myjs/like_dislike.js"></script>
      <script src="Myjs/collection.js"></script>
      <script src="./Myjs/post.js"></script> 
      <link rel="stylesheet" href="mystyle.css">
      <link rel="stylesheet" href="main.css"> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> 



</body>


      