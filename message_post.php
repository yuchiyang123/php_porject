<?php
include 'header.php';
include 'connect_message.php';
session_start();
$send=$_POST['send'];
$main=$_POST['main'];
$post=$_SESSION['name'];
if (isset($_SESSION['islogin'])) {
    echo '<span style="color: #162938">'."你好!".$_SESSION['name'].'</span>';
    echo "<a href='logout.php'>登出</a>";
}
//echo $send,$main;
//echo $post;

$sql="insert into message(send,main,post) values ('$send','$main','$post')";
$reslut=mysqli_query($con,$sql);
if (!$reslut){
    die('Error: ' . mysqli_error($con));
}else{
    echo "<br>傳送成功";
    echo "
     <script>
     setTimeout(function(){window.location.href='message.php';},1000);
     </script>";
}
?>