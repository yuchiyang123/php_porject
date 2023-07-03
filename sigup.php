<?php 
 header("Content-Type: text/html; charset=utf8");

 if(!isset($_POST['submit'])){
  exit("錯誤執行");
 }

 $name=$_POST['name'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $check="select * from user where username='$name' or email='$email'";
 include('connect.php');
 if(mysqli_num_rows(mysqli_query($con,$check))==0){
  $q="insert into user(id,username,email,password) values (null,'$name','$email','$password')";
  $reslut=mysqli_query($con,$q);
  
  if (!$reslut){
   die('Error: ' . mysqli_error($con));
  }else{
   echo "註冊成功";
   echo "
     <script>
     setTimeout(function(){window.location.href='index.php';},1000);
     </script>";
  }
 }else{
    echo 
      "<script>
        alert('該帳號已有人使用');
        setTimeout(function(){window.location.href='index.php';},1000);
      </script>";

    
 }

 mysqli_close($con);

?>