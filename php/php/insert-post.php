<?php
    session_start();
   
    if (! (empty($_POST['title']) || empty($_POST['content']) )) {
    include('config.php');
    
    
    $unique_id = $_SESSION['unique_id'];
   

    $title = $_POST['title'];
    $content = $_POST['content'];
    $post_img = $_POST['post_img'];
    $cid = $_POST['cid'];

    
    

    date_default_timezone_set('Asia/Taipei');
	$created = date('Y/m/d H:i:s');

    //$created = time();    
    //$created = date("Y年m月d日");



   
if(isset($_FILES['post_img'])){
    $fileCount = count($_FILES['post_img']['name']);
    for($i=0;$i<$countfiles;$i++){
        $img_name = $_FILES['post_img']['name'][$i];
        // $sql = "INSERT INTO fileup(id,name) VALUES ('$filename','$filename')";
        // $db->query($sql);
        $time = time(); 
        $new_img_name = $time . $img_name;
        move_uploaded_file($_FILES['post_img']['tmp_name'][$i],'myimages/'.$new_img_name);
    }
}


    // //檢驗上傳檔案
    // //if ($_FILES["img"]["error"] == 0) {
    //     if (isset($_FILES['img'])){
       
    //     $fileCount = count($_FILES['img']['name']); // 取得上傳檔案數量

    //     for ($i = 0; $i < $fileCount; $i++) {

    //         $img_name = $_FILES['img']['name'][$i]; //擷取上傳圖片名
    //         $img_type = $_FILES['img']['type'][$i]; //擷取上傳圖片類型
    //         $tmp_name = $_FILES['img']['tmp_name']; //用以存或移動檔案到我方資料夾中
    //         //$file = $_FILES['img']['tmp_name'][$i];


    //     // if (in_array($img_ext, $extensions) === true) {
    //     //   $types = ["image/jpeg", "image/jpg", "image/png"];
    //     //   if (in_array($img_type, $types) === true) {
    //         $time = time(); //透過此時間，及時修改users上傳檔案名
    //         $new_img_name = $time . $img_name;
    //         //(isset($_FILES['img'])) ? $new_img_name = $time . $img_name : $new_img_name = "";
    //         move_uploaded_file($tmp_name, "myimages/" . $new_img_name); 

            
    //         //$dest = 'myimages/' . $new_img_name;
    
    //         # 將檔案移至指定位置
    //         //move_uploaded_file($file, $dest);
        
    //         }
    //     }
          
        
    
   
// # 取得上傳檔案數量
// $fileCount = count($_FILES['img']['name']);

// for ($i = 0; $i < $fileCount; $i++) {
//   # 檢查檔案是否上傳成功
//   if ($_FILES['img']['error'][$i] === UPLOAD_ERR_OK){
//     echo '檔案名稱: ' . $_FILES['img']['name'][$i] . '<br/>';
//     echo '檔案類型: ' . $_FILES['img']['type'][$i] . '<br/>';
//     echo '檔案大小: ' . ($_FILES['img']['size'][$i] / 1024) . ' KB<br/>';
//     echo '暫存名稱: ' . $_FILES['img']['tmp_name'][$i] . '<br/>';

//     # 檢查檔案是否已經存在
//     if (file_exists('myimages/' . $_FILES['img']['name'][$i])){
//       echo '檔案已存在。<br/>';
//     } else {
//       $file = $_FILES['img']['tmp_name'][$i];
//       $dest = 'myimages/' . $_FILES['img']['name'][$i];

//       # 將檔案移至指定位置
//       move_uploaded_file($file, $dest);
//     }
//   } else {
//     echo '錯誤代碼：' . $_FILES['img']['error'] . '<br/>';
//   }
// }


        // $uid = mysqli_real_escape_string($conn, $_POST['uid']);
        // $cid = mysqli_real_escape_string($conn, $_POST['cid']);
        
        // $title = mysqli_real_escape_string($conn, $_POST['title']);
        // $content = mysqli_real_escape_string($conn, $_POST['content']);
        
   
    $sql_query = "INSERT INTO posts ( cid, unique_id, title, content, post_img, created)
                  VALUES ('$cid', '$unique_id', '$title', '$content', '$new_img_name', '$created') ";

    mysqli_query($conn, $sql_query);

  
 
}else{
    header("location: ../login.php");
}
?>