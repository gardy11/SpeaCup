#SpeaCup

7/28 總整合、資料庫刪除部分沒用到的資料表

1.目前版本出現的問題：

　１.未登入時，在首頁點擊小鈴鐺沒有反應
 
　２．發文頁 m-posts.php 更新樣式後似乎無法進行發文

  　３．按加好友功能沒有反應
  
２．資料庫

　　刪除discussion_board資料表（內容與　board_categories　一樣），首頁有用到該資料表的地方，須注意要改為board_categories
  



－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－



7/22 更新google登入&修改註冊、登入、會員資訊頁

1.需先在speacup資料夾開啟終端機後，執行 composer require google/apiclient:^2.7  以安裝google套件。

2.確認users資料表，含有mid欄位 (varchar 255) 一般應該都有。

2.安裝完成後在speacup資料夾會出現vendor資料夾、composer.json、composer.lock 3個檔案，放著就好。

  (安裝完如登出後出現錯誤畫面，去分支Wang-0714下載壓縮檔，覆蓋這3個檔案並執行 composer update)

3.如果出現 "composer' 不是內部或外部命令、可執行的程式或批次檔。" 請先安裝composer。  
  官網：https://getcomposer.org/download/
  
  
4.google憑證及config.php 有設定絕對路徑，speacup資料夾一定要直接放在htdocs資料夾第一層=> htdocs／speacup　
  
  瀏覽器路徑：http://localhost/speacup

4.註冊頁的我不是機器人先拿掉，後面有空檔再繼續做。
