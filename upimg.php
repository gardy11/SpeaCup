<?php

// 來源白名單 
$accepted_origins = array("http://localhost", "http://192.168.1.1", "http://example.com");


// 保存圖片的資料夹 
$imageFolder = "php/myimages";

reset ($_FILES);
$temp = current($_FILES);
if (!is_uploaded_file($temp['tmp_name'])){
  // 通知编辑器上傳失敗
  header("HTTP/1.1 500 Server Error");
  exit;
}

if (isset($_SERVER['HTTP_ORIGIN'])) {
  // 驗證來源是否在白名單內
  if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
  } else {
    header("HTTP/1.1 403 Origin Denied");
    exit;
  }
}


//簡單過濾文件名是否合格
if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
    header("HTTP/1.1 400 Invalid file name.");
    exit;
}

// 驗證副檔名
if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
    header("HTTP/1.1 400 Invalid extension.");
    exit;
}

// 都沒問題，就將上船數據移動至目標資料夾，此處直接使用原文件名，建議重命名
//$filetowrite = $imageFolder . $temp['name'];
$filetowrite =  $temp['name'];

move_uploaded_file($temp['tmp_name'], $filetowrite);

// 返回JSON格式的數據
// 如下一行所示，使用location存放圖片URL
// { location : '/your/uploaded/image/file.jpg'}
echo json_encode(array('location' => $filetowrite));
