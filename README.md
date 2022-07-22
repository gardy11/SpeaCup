#SpeaCup

7/22 更新google登入&修改註冊、登入、會員資訊頁

1.需先在speacup資料夾開啟終端機後，執行 composer require google/apiclient:^2.7  以安裝google套件。

2.確認users資料表，含有mid欄位 (varchar 255) 一般應該都有。

2.安裝完成後在speacup資料夾會出現vendor資料夾、composer.json、composer.lock 3個檔案，放著就好。

3.如果出現 "composer' 不是內部或外部命令、可執行的程式或批次檔。" 請先安裝composer。  
  官網：https://getcomposer.org/download/
  
4.google憑證及config.php 有設定絕對路徑，speacup資料夾一定要直接放在htdocs資料夾第一層=> htdocs／speacup　
  
  瀏覽器路徑：http://localhost/speacup

4.註冊頁的我不是機器人先拿掉，後面有空檔再繼續做。
