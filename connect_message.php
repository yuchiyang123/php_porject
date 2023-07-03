<?php

$server="127.0.0.1";//主機
$db_username="root";//你的資料庫使用者名稱
$db_password="0983231211a";//你的資料庫密碼
$db="test01";

$con = mysqli_connect($server,$db_username,$db_password,$db);


if(!$con){
  die("can't connect".mysql_error());//如果連結失敗輸出錯誤
 }

?>