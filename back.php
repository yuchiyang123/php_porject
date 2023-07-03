<?php
session_start();
$post=$_SESSION['name'];
$servername = "127.0.0.1";
$username = "root";
$password = "0983231211a";
$dbname = "test01";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("資料庫連線失敗: " . $conn->connect_error);
}


$sql="select * from message  where send='$post'";
$result = mysqli_query($conn,$sql);
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