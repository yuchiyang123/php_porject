<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<div id="post-container">
<?php
require_once 'index.php';
require_once 'header.php';
include('footer.php');
include('connect.php');
$sql="select * from posts order by id DESC";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)==0){
    echo '<div>No post yet!</div>';
}else{
    while($row=mysqli_fetch_assoc($result)) {
        $id = htmlentities($row['id']);
        $title = htmlentities($row['title']);
        $des = htmlentities(strip_tags($row['description']));
        $slug = htmlentities($row['slug']);
        $time = htmlentities($row['date']);
        $permalink = "p/".$id ."/".$slug;
        echo '<div class="page-title">';
        echo '<div class="b">'."<h3><a href='$permalink'>$title</a></h3><p>";

        echo substr($des, 0, 100);

        echo '<div>';
        echo "<a href='$permalink'>Read more...</a></p>";

        echo '</div>';
        
        echo "<div class=''> $time </div>";
        echo '</div>';
        
    }
}
?>

</div>
<a href="post.php"><button class="posts">發文</button></a>
</html>