<?php

$s_id = $_SESSION['unique_id'];
$sql_friendsList_get = "SELECT * FROM friends where user1 = '$s_id' or user2 = '$s_id'";

$result_friensList_get = mysqli_query($conn, $sql_friendsList_get);

while ($row_friensList_get = mysqli_fetch_assoc($result_friensList_get)) {
      if ($s_id == $row_friensList_get['user2']) {
            $myFriend = $row_friensList_get['user1'];

            $sql_getuser = "SELECT * FROM users where unique_id = '$myFriend'";
            $result_getName = mysqli_query($conn, $sql_getuser);
            $row_getName = mysqli_fetch_assoc($result_getName);

            $result_ProfilePic = mysqli_query($conn, $sql_getuser);
            $row_ProfilePic = mysqli_fetch_assoc($result_ProfilePic);
      } else {
            $myFriend = $row_friensList_get['user2'];

            $sql_getuser = "SELECT * FROM users where unique_id = '$myFriend'";
            $result_getName = mysqli_query($conn, $sql_getuser);
            $row_getName = mysqli_fetch_assoc($result_getName);

            $result_ProfilePic = mysqli_query($conn, $sql_getuser);
            $row_ProfilePic = mysqli_fetch_assoc($result_ProfilePic);
      }
?>

<div id="f-friends" class="row ml-5 m-3">
      <img src="./php/images/<?php echo $row_ProfilePic['img'] ?>" alt="" height=70px width=70px class="ml-3 col-2">
      <h3 class="ml-3 col-5 mt-3"><?php echo $row_getName['nickname']; ?></h3>
      <a style="text-decoration:none" href="m-index.php?user_id=<?php echo $row_getName['unique_id']; ?>">
            <button class='btn btn-danger' id='cancelReq'
                  onclick='cancelAction(1," <?php echo $row_ProfilePic['unique_id']; ?>")'>解除好友</button>
            <button id="f-inform" class="btn ml-3 col-2" title="好友資訊"><i
                        class="fa-solid fa-address-card fa-2x "></i></button>
      </a>
</div>
<hr class="hr">


<?php
}



?>
<script src="./Js/add_cancel_friend.js"></script>