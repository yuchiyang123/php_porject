<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();
$name=$_SESSION['name'];
$post=$_GET['post'];
$sql="select * from message where send='$name' and post='$post' ";
$result=mysqli_query($con,$sql);
$data = array();
if(mysqli_num_rows($result)==0){
    echo '<div>沒有訊息</div>';
}else{
   while($row=mysqli_fetch_assoc($result)){ 
        $data[] = '內容:' . $row['main'] . "<br>發送者:" . $row['post'];
   }
}
$response = array();
$response['data'] = $data;
header('Content-Type: application/json');
echo json_encode($response);
?>