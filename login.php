<?PHP
 header("Content-Type: text/html; charset=utf8");
 session_start();
 if(!isset($_POST["submit"])){
  exit("錯誤執行");
 }

 include('connect.php');
 $name = $_POST['name'];
 $passowrd = $_POST['password'];

 if ($name && $passowrd){
    $sql = "select * from user where email = '$name' and password='$passowrd'";
    $result = mysqli_query($con,$sql);
    $rows=mysqli_num_rows($result);
    if($rows){
        header("refresh:0;url=index.php");
        $_SESSION['name'] = $name;
        $_SESSION['islogin'] = 1;
     exit;
    }else{
        echo "使用者名稱或密碼錯誤";
        echo "
        <script>
            setTimeout(function(){window.location.href='index.php';},1000);
        </script>";
    }
    

 }else{
    echo "表單填寫不完整";
    echo "
      <script>
       setTimeout(function(){window.location.href='index.php';},1000);
      </script>";

      
 }

 mysqli_close();
?>