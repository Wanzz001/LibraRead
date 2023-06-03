<?php
session_start();
include("action/connect.php");
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/LibraRead.png">
    <title>LibraRead</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <nav>
        <img src="image/LibraRead.png" class="logo"> <a href="index.php" class="home-about">Home</a> <a href="about.html" class="about-about">About</a>
        <form action="" method="get" class="fs">
            <input type="search" name="find" class="search" placeholder="Search" required>
            <?php
            if (isset($_GET['find'])) {
                $find = $_GET['find'];
                echo "<script> window.location.href='search.php?search=$find';</script>";
            }
            ?>
        </form>
    </nav>

    <a onclick="history.back()"><img src="image/back.png" class="back"></a>
    <div class="about-con">
        <img src="image/LibraRead.png" class="photo">
        <p class="desc">LibraRead is a digital library that have some of function,</p> 
        <p class="desc">which is platform that provide access to a variety of</p> 
        <p class="desc">books collection virtually. Our platform will give users</p> 
        <p class="desc">convenience for reading anytime anywhere without</p> 
        <p class="desc">having to go to Library.</p> 
        <br>
        <p class="desc">Ver. 1. 0. 0</p> 
    </div>
    <footer>
        <div class="fl">
            <p class="contact">Contact Us: </p>
            <div class="fl-con"><img src="image/insta.svg" class="icon"><p class="contact">@libraread_</p></div>
            <div class="fl-con"><img src="image/call.svg" class="icon"><p class="contact">085795464781</p></div>
            <div class="fl-con"><img src="image/email.svg" class="icon"><p class="contact">libraread@gmail.com</p></div>
        </div>
        <div class="fr">
            <img src="image/logotelu.png">
        </div>
    </footer>
</body>
</html>