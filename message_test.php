<?php
$server = "127.0.0.1";
$db_username = "root";
$db_password = "0983231211a";
$db = "test01";
$con = mysqli_connect($server, $db_username, $db_password, $db);
error_reporting(0);
ini_set('display_errors', 0);
session_start();
$name = $_SESSION['name'];
$post = $_GET['post'];
$sql = "SELECT * FROM message WHERE send='$name' AND post='$post'";

$result = mysqli_query($con, $sql);
$data = array();
if (mysqli_num_rows($result) == 0) {
    $data[] = '<div>没有消息</div>';
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = '<div>內容:' . $row['main'] . "</div><div>發送者:" . $row['post'] . '</div>';
    }
}
$response = implode("", $data);
echo $response;
?>