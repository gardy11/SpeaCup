<?php include_once "config.php";
session_start();



//好友
if ($_REQUEST['action'] === 'sendReq') {
    $reqSendingTo  = $_REQUEST['user_id'];
    $reqSendingFrom = $_SESSION['unique_id'];
    $dateAdded_now = date('y-m-d H:i:s');

    $sql = "INSERT INTO requests (sendingfrom, sendingto, dateAdded) VALUES ('$reqSendingFrom', '$reqSendingTo', '$dateAdded_now')";

    $sql_requestFrom_name = "SELECT * FROM users where unique_id = '$reqSendingFrom'";
    $sql_requestTo_name = "SELECT * FROM users where unique_id = '$reqSendingTo'";

    $result_From = mysqli_query($conn, $sql_requestFrom_name);
    $result_To = mysqli_query($conn, $sql_requestTo_name);

    $row_name_From = mysqli_fetch_assoc($result_From);
    $row_name_To = mysqli_fetch_assoc($result_To);

    $message =
        '<img src="./php/images/' . $row_name_From['img'] . '"  height=70px width=70px>' .
        '<a style="text-decoration:none" href="m-index.php?user_id=' . $row_name_From['unique_id'] . '">' . $row_name_From['nickname'] . '</a>' . ' 希望與你當朋友' .
        '</br>
        <button class="btn btn-primary btnAccept" data-type="1" data-reqSendingFrom="' . $reqSendingFrom . '">同意</button> 
        <button class="btn btn-success btnReject" data-type="2" data-reqSendingFrom="' . $reqSendingFrom . '">抱歉</button>';




    $sql_notification = "INSERT INTO notifications (noti_From, noti_To, message, date_Added) VALUES ('$reqSendingFrom', '$reqSendingTo', '$message', '$dateAdded_now')";


    if (mysqli_query($conn, $sql_notification) && mysqli_query($conn, $sql)) {
        $success  =  "Request send, saved into DB";
    } else {
        $success  =  "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    echo $success;
} else if ($_REQUEST['action'] === 'RequestSection') {

    $sentRequest = $_REQUEST['sentRequest'];
    $type = $_REQUEST['type'];

    if ($type == 1) {
        $sql_acceptReq = "UPDATE requests SET accepted='1' WHERE sendingfrom='$sentRequest'";
        $dateNow = date('y-m-d H:i:s');
        $MyId = $_SESSION['unique_id'];
        $sql_insert_friends = "INSERT INTO friends (user1, user2, date_Added) VALUES ('$sentRequest', '$MyId', '$dateNow')";


        if (mysqli_query($conn, $sql_acceptReq) and mysqli_query($conn, $sql_insert_friends)) {
            echo "success_accepted";
        } else {
            echo  mysqli_error($conn);
        }
    } else if ($type == 2) {
        $sql_rejectReq = "UPDATE requests SET accepted='2' WHERE sendingfrom='$sentRequest'";
        $sql_deleteReq = "DELETE FROM requests WHERE sendingfrom='$sentRequest'";
        $sql_deleteNoti = "DELETE FROM notifications WHERE noti_From='$sentRequest'";

        if (mysqli_query($conn, $sql_rejectReq)) {
            echo "success_Reject";
            mysqli_query($conn, $sql_deleteReq);
            mysqli_query($conn, $sql_deleteNoti);
        } else {
            echo  mysqli_error($conn);
        }
    }
} else if ($_REQUEST['action'] === 'cancelReq') {
    $cancelSendingTo  = $_REQUEST['user_id'];
    $cancelSendingFrom = $_SESSION['unique_id'];

    $sql_cancelFriend = "DELETE FROM friends WHERE (user1 = '$cancelSendingTo' AND user2 = '$cancelSendingFrom') OR (user2 = '$cancelSendingTo' AND user1 = '$cancelSendingFrom')";
    $sql_deleteReq = "DELETE FROM requests WHERE (sendingfrom = '$cancelSendingTo' AND sendingto = '$cancelSendingFrom') OR (sendingfrom = '$cancelSendingTo' AND sendingto = '$cancelSendingFrom')";
    $sql_deleteNoti = "DELETE FROM notifications WHERE (noti_From = '$cancelSendingTo' AND noti_To = '$cancelSendingFrom') OR (noti_From = '$cancelSendingTo' AND noti_To = '$cancelSendingFrom')";

    if (
        mysqli_query($conn, $sql_cancelFriend) &&   mysqli_query($conn, $sql_deleteReq) && mysqli_query($conn, $sql_deleteNoti)
    ) {
        echo "Request send, delete from DB";
    } else {
        echo  mysqli_error($conn);
    }
}

//回覆
else if ($_REQUEST['action'] === 'postStatus') {
    // echo $_REQUEST['status'];
    $dateAdded_now = date('y-m-d H:i:s');
    $memID = $_SESSION['unique_id'];
    $status = $_REQUEST['status'];
    $aid = $_REQUEST['aid'];   //文章id


    $sql_selectPostUser = "SELECT * FROM posts where aid = '$aid'";
    $sql_PostUser = mysqli_query($conn, $sql_selectPostUser);
    $PostUser = mysqli_fetch_assoc($sql_PostUser);
    $postTo = $PostUser['unique_id'];

    $sql_statusINSERT = "INSERT INTO replys (userid, post_to, post_status, date_added) VALUES ('$memID','$postTo', '$status', '$dateAdded_now')";

    if (mysqli_query($conn, $sql_statusINSERT)) {

        echo 'success';
    } else {
        $success  =  "Error: " . $sql_statusINSERT . "<br>" . mysqli_error($conn);
    }
} else if ($_REQUEST['action'] === 'fetchAllStatus') {
    // $memID = $_SESSION['unique_id'];
    $aid = $_REQUEST['aid'];   //文章id

    $sql_selectPostUser = "SELECT * FROM posts where aid = '$aid'";
    $sql_PostUser = mysqli_query($conn, $sql_selectPostUser);
    $PostUser = mysqli_fetch_assoc($sql_PostUser);
    $uid = $PostUser['unique_id'];

    // $sql_fetchAllSTATUS = "SELECT * FROM replys where user_id = '$memID' order by pid DESC";
    if ($uid == $_SESSION['unique_id']) {
        $s_ID = $_SESSION['unique_id'];
        // $sql_fetchAllSTATUS = "SELECT * FROM replys where userid = '$s_ID' or post_to = '$s_ID' order by pid DESC";
        $sql_fetchAllSTATUS = "SELECT * FROM replys where  post_to = '$s_ID' order by pid DESC";
    } else {
        // $sql_fetchAllSTATUS = "SELECT * FROM replys where userid = '$uid' or post_to = '$uid' order by pid DESC";
        $sql_fetchAllSTATUS = "SELECT * FROM replys where  post_to = '$uid' order by pid DESC";
    }




    $result_fetchAllSTATUS = mysqli_query($conn, $sql_fetchAllSTATUS);

    $posts = '';
    while ($row_fetchAllSTATUS = mysqli_fetch_assoc($result_fetchAllSTATUS)) {
        $storedID = $row_fetchAllSTATUS['userid'];
        $sql_profilePIC = "SELECT * FROM users where unique_id = '$storedID'";
        $result_profilePIC = mysqli_query($conn, $sql_profilePIC);
        $row_profilePIC = mysqli_fetch_assoc($result_profilePIC);


        $sql_getName = "SELECT * FROM users where unique_id = '$storedID'";
        $result_getName = mysqli_query($conn, $sql_getName);
        $row_getName = mysqli_fetch_assoc($result_getName);
        $postingTo = '';
        $post_to = $row_fetchAllSTATUS['post_to'];
        if ($post_to != 0 && $post_to != $_SESSION['unique_id']) {
            $sql_getName_post = "SELECT * FROM users where unique_id = '$post_to'";
            $result_getName_post = mysqli_query($conn, $sql_getName_post);
            $row_getName_post = mysqli_fetch_assoc($result_getName_post);
            $postingTo = " <small> > </small>" . $row_getName_post['nickname'];
        }
        //文章參考可能要在這處理   .= 顯示全部
        $posts .=
            '
    <div class="row mt-4">
       <div class="col-2">
            <img src="php/images/' . $row_profilePIC['img'] . '" height=50 width=50>
       </div>
       <div class="col-10">
          <p class="text-uppercase p-0 m-0"><a href="m-index.php?user_id=' . $storedID . '">' . $row_getName['nickname'] . '</a>

            <a href="timeline.php?user_id=' . $post_to . '">' . $postingTo . '</a>

         </p>

            ' . $row_fetchAllSTATUS['post_status'] . '

       </div>
        <div class="col-2"></div>
            <div class="col-10 d-flex justify-content-end "> 
                <input type="text" class="form-control" id="comment_input_' . $row_fetchAllSTATUS['pid'] . '" placeholder="請輸入留言"> 
                <input type="button" value="留言"  id="comment_button_' . $row_fetchAllSTATUS['pid'] . '" class="btn btn-primary">
            </div>
       </div>
        <div class="col-12 text-right">
            <a href="javascript:void(0)" onclick="loadRelatedComment(' . $row_fetchAllSTATUS['pid'] . ')">查看更多留言...</a>
            <div id="displayRelatedComment' . $row_fetchAllSTATUS['pid'] . '">
            </div>
        </div>
    </div>

    <script>
    $("#comment_button_' . $row_fetchAllSTATUS['pid'] . '").click(function(){
       $comment = $("#comment_input_' . $row_fetchAllSTATUS['pid'] . '").val();
       $.post(`php/action.php?action=postComment&pid=' . $row_fetchAllSTATUS['pid'] . '&comment=${$comment}`,function(res){

      $("#comment_input_' . $row_fetchAllSTATUS['pid'] . '").val(" ");
      loadRelatedComment(' . $row_fetchAllSTATUS['pid'] . ');

       })
    })
    </script>
    ';
    }

    echo $posts;
} else if ($_REQUEST['action'] === 'postComment') {
    $comment =  $_REQUEST['comment'];
    $pid = $_REQUEST['pid'];
    $uid = $_SESSION['unique_id'];
    $dateAdded_now = date('y-m-d H:i:s');

    $sql_insertComment = "INSERT INTO comments (post_id, userid, comment, date_added) VALUES ('$pid', '$uid', '$comment', '$dateAdded_now')";

    if (mysqli_query($conn, $sql_insertComment)) {

        echo 'success comment Inserted';
    } else {
        $success  =  "Error: " . $sql_statusINSERT . "<br>" . mysqli_error($conn);
    }
} else if ($_REQUEST['action'] === 'relatedComments') {
    $pid  = $_REQUEST['pid'];
    $sql_relatedComments = "SELECT * FROM comments where post_id = '$pid' order by cid DESC";

    $result_relatedComments = mysqli_query($conn, $sql_relatedComments);

    $comments = '';
    while ($row_relatedComments = mysqli_fetch_assoc($result_relatedComments)) {
        $storedID = $row_relatedComments['userid'];
        $sql_profilePIC = "SELECT * FROM users where unique_id = '$storedID'";
        $result_profilePIC = mysqli_query($conn, $sql_profilePIC);
        $row_profilePIC = mysqli_fetch_assoc($result_profilePIC);

        $comments .=
            '<div class="row my-2">
          <div class="col-2">
            <img src="php/images/' . $row_profilePIC['img'] . '" height=30>
                 <a href="m-index.php?user_id=' . $storedID . '">' . $row_profilePIC['nickname'] . '<a>
            </div>
          <div class="col-8 text-left">' . $row_relatedComments['comment'] . '</div>
        </div>';
    }
    echo $comments;
}