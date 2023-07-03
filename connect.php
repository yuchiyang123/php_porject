<?php
 $server="localhost";//主機
 $db_username="root";//你的資料庫使用者名稱
 $db_password="0983231211a";//你的資料庫密碼
 $db="users";

 $con = mysqli_connect($server,$db_username,$db_password,$db);//連結資料庫
 if(!$con){
  die("can't connect".mysql_error());//如果連結失敗輸出錯誤
 }
 

?>