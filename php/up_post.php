<?php
    session_start();
    include_once "config.php";
    
    if (!isset($_SESSION['unique_id'])) { //未登入時導向登入頁
        header("location: login.php");
    }
    
    $sql = mysqli_query($conn, "SELECT * FROM posts INNER JOIN users ON posts.unique_id = users.unique_id LEFT JOIN board_categories  ON posts.cid = board_categories.cid 
                                WHERE posts.unique_id = {$_SESSION['unique_id']}");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
    }
    $aid = $row['aid']; 
    $title = $_POST['up_title'];
    $content = $_POST['up_content'];
    if (!empty($title) && !empty($content)) {
        
        
        
        
        $sql_query = "UPDATE posts SET title = '{$title}', content = '{$content}' WHERE aid = $aid";

        mysqli_query($conn, $sql_query);
        $message = "修改成功!";
        echo "<script type='text/javascript'>alert('$message');window.location.href='../user_post.php?aid=$aid'</script>";
    
    
    }else{
        $message = "標題或文章內容不可空白!";
        echo "<script type='text/javascript'>alert('$message');window.location.href='../edit_post.php?aid= $aid'</script>";
        

    }
?>