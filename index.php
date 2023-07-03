<?php
session_start();
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>旅遊媒合平台</title>
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1/0621/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/ui/trumbowyg.min.css">
</head>
<script>
        function validateForm() {
            var x = document.forms["registerForm"]["password"].value;
            var y = document.forms["registerForm"]["password_check"].value;
            if(x.length<6){
                alert("密碼長度不足");
                return false;
            }
            if (x != y) {
                alert("請確認密碼是否輸入正確");
                return false;
            }
        }
</script>
<body>

    <header>
        <h1 class="logo">旅遊媒合平台</h1>
        <nav class="navigation">
            <a href="/<?=SITE_ROOT?>">主頁</a>
            <a href="#">自由行揪團</a>
            <a href="http://127.0.0.1/0621/page.php">測試</a>
            <a href="#">打工換</a>
            <a href="#">會員中心</a>
            <a href="http://127.0.0.1/0621/message.php">訊息中心</a>
            <?php
                if (isset($_SESSION['islogin'])==0) {
                    echo '<button class="btnLogin-popup">登入</button>';
                }
                if (isset($_SESSION['show_link']) && $_SESSION['show_link']) {
                    echo '<a href="get.php">查看訊息</a>';
                    unset($_SESSION['show_link']);
                }
            ?>
            <?php
                if (isset($_SESSION['islogin'])) {
                echo '<span style="color: #fff">'."你好!".$_SESSION['name'].'</span>';
                echo "<a href='logout.php'>登出</a>";
                }
            ?>
            
        </nav>
    </header>
    
    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close"></ion-icon></span>


        <div class="form-box login">
            <h2>登入</h2>
            <form name="login" action="login.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" required name="name">
                    <label>Email</label> 
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="password">
                    <label>密碼</label> 
                </div>
                <div class="remeber-forgot">
                    <label><input type="checkbox">記住我</label>
                    <a href="#">忘記密碼?</a>
                </div>
                <button type="submit" class="btn" name="submit">登入</button>
                <div class="login-register">
                    <p>沒有會員?<a href="#" class="register-link">註冊</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>註冊</h2>
            <form action="sigup.php" method="post" name="registerForm" onsubmit="return validateForm()">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" required name="name">
                    <label>使用者姓名</label> 
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" required name="email">
                    <label>Email</label> 
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="password">
                    <label>密碼</label> 
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="password_check">
                    <label>確認密碼</label> 
                </div>
                <div class="remeber-forgot">
                    <label><input type="checkbox">我同意服務者使用條例</label>
                    
                </div>
                <button type="submit" class="btn" name="submit">註冊</button>
                <div class="login-register">
                    <p>已經有會員?<a href="#" class="login-link">登入</a></p>
                </div>
            </form>
        </div>
        
    </div>
    
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>