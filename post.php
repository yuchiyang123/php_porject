<?php
include('header.php');
include('index.php');
include('connect.php');
?>
<?php
if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST ['description']);
    $slug = slug($title);
    $date = date('Y-m-d H:i');
    $posted_by = mysqli_real_escape_string($con, $_SESSION['name']);
    $sql="insert into posts (title, description, slug,posted_by, date) values ('$title', '$description', '$slug', '$posted_by', '$date')";
    mysqli_query($con, $sql) or die("失敗" . mysqli_connect_error());
    $permalink = "p/".mysqli_insert_id($con) ."/".$slug;
    printf("Posted successfully. <meta http-equiv='refresh' content='2; url=%s'/>",$permalink);
}else{
    ?>
    <div class="">
        <div class="">
            <div class="">
                <h1>貼文</h1>
            </div>
            <form class="" method="POST">
                <p>
                    <label class="post-title-label">標題:</label>
                    <input type="text" class="posts-title" name="title" required>
                </p>
                <p>
                    <div id="editor-container"> 
                        <textarea  id = "description" row="30" cols="50" class="ppost" name="description" width=1000px required></textarea>
                    </div>                
                </p>
                <p>
                    <div class="">
                        <input type="submit" class="postbtn" name="submit" value="發文">
                    </div>
                </p>
            </form>

        </div>
    </div>
    <?php
}
    
    include('footer.php');
    

