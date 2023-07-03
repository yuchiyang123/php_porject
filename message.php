<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();
$_SESSION['show_link'] = true;
include 'connect.php';
include 'index.php';
?>
<body>   
    <div>
        <form action="message_post.php" method="post">\
            <div id="editor-container">
                寄給:<br><input type="text" name="send" method="post"><br>
                內容:<br><textarea id = "description" row="30" cols="50" name="main" method="post" required></textarea><br><br>
            </div>
            <button type="submit" class="">傳送</button><br>
        </form>
    </div>
</body>
<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<?php
include 'footer.php';
?>
        
    