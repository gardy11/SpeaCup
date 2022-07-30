<?php
    session_start();
   
    if (! (empty($_POST['title']) || empty($_POST['content']) )) {
    include('config.php');
    
    
    $unique_id = $_SESSION['unique_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $cid = $_POST['cid'];
    
    

    date_default_timezone_set('Asia/Taipei');
	$created = date('Y/m/d H:i:s');

    $sql_query = "INSERT INTO posts ( cid, unique_id, title, content,created)
                  VALUES ('$cid', '$unique_id', '$title', '$content','$created') ";

    mysqli_query($conn, $sql_query);

  
 
}else{
    header("location: ../login.php");
}
?>