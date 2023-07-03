<?php
$server="127.0.0.1";//主機
$db_username="root";//你的資料庫使用者名稱
$db_password="0983231211a";//你的資料庫密碼
$db="test01";
$con = mysqli_connect($server,$db_username,$db_password,$db);
error_reporting(0);
ini_set('display_errors', 0);
session_start();
$name=$_SESSION['name'];
$post = $_GET['post'];
$sql = "SELECT * FROM message WHERE send='$name' AND post='$post'";

$result=mysqli_query($con,$sql);
$data = array();
if(mysqli_num_rows($result)==0){
    
}else{
   while($row=mysqli_fetch_assoc($result)){ 
        $data[] = '內容:' . $row['main'] . "<br>發送者:" . $row['post'];
   }
}
$response = array();
$response['data'] = $data;
header('Content-Type: application/json');
echo $response;
?>