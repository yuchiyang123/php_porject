<?php
require_once 'connect.php';
require_once 'header.php';
echo '<link rel="stylesheet" href="http://127.0.0.1/0621/style.css">';
include 'index.php';
$id = (INT)$_GET['id'];
if ($id < 1) {
    header("location: $url_path");
}
$sql = "Select * FROM posts WHERE id = '$id'";
$result = mysqli_query($con, $sql);

$invalid = mysqli_num_rows($result);
if ($invalid == 0) {
    header("location: $url_path");
}

$hsql = "SELECT * FROM posts WHERE id = '$id'";
$res = mysqli_query($con, $hsql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$title = $row['title'];
$description = $row['description'];
$author = $row['posted_by'];
$time = $row['date'];

echo '<div class="view">';
echo '<div class="w3-container w3-sand w3-card-4">';
echo "<h3>$title</h3>";
echo '<div class="view-description">';
echo "<p class='aaaa'>$description</p>"."<br>".'</div>';
echo '<div class="w3-text-grey">';
echo "Posted by: " . $author . "<br>";
echo "$time</div>";
echo '</div>';
?>
<?php
include "footer.php";
?>