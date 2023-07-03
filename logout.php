<?php 
header('Content-type:text/html; charset=utf-8');

session_start();

$name = $_SESSION['name'];  
$_SESSION = array();
session_destroy();
 
// 提示資訊


echo "
    <script>
    setTimeout(function(){window.location.href='index.php';},1000);
    </script>";

 ?>
<script language="javascript">
    alert("已登出")
</script>