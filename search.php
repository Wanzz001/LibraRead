<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/LibraRead.png">
    <title>LibraRead</title>
    <style>
        *{
            margin: 0;
            border: 0;
        }
        nav{
            display: flex;
            background-color: #d9d9d9;
            align-items: center;
        }
        .logo{
            height: 100px;
            margin: 10px 0 20px 30px;
        }
        a{
            text-decoration: none;
            color: black;
            margin: 0 0 0 50px;
            font-size: 50px;
        }
        body{
            background-image: url('image/bgwebjadi.png');
            background-size: cover;
            background-repeat: no-repeat;
            overflow: hidden;
        }
        .home{
            background-color: gray;
            border-radius: 50px;
            padding: 10px 20px;
        }
        .thumbnail{
            background-color: rgb(177, 177, 177);
            width: 200px;
            height: 300px;
            float: left;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 40px 40px;
        }
        .thumbnail img{
            width: 150px;
        }
        .container{
            margin: 50px 10px;
            float: left;
        }
        .container p{
            font-size: 24px;
            margin-bottom: 4px;
            color: white;
        }
        .menu{
            height: 70px;
            margin: 20px;
            float: left;
        }
        .menu::after{
            content: '';
            display: block;
            clear: both;
        }
        .search{
            margin-left: 40vw;
            height: 40px;
            font-size: 32px;
            width: 400px;
            border-radius: 30px;
            background: white url('image/search.png') no-repeat 10px;
            background-size: 34px;
            padding-left: 50px;
        }
    </style>
</head>
<body>
    <nav>
        <img src="image/LibraRead.png" class="logo"> <a href="index.php" class="home">Home</a> <a href="about.html">About</a>
        <form action="" method="get">
            <input type="search" name="find" class="search" placeholder="Search" required>
            <?php 
                if (isset($_GET['find'])) {
                    $find = $_GET['find'];
                    echo "<script> window.location.href='search.php?search=$find';</script>";  
                }
            ?>
        </form>
    </nav>
    <?php 
        include("action/connect.php");
        $search = $_GET['search'];
        $sql="select * from buku where title like '%".$search."%' or author like '%".$search."%' or publisher like '%".$search."%'";
        $result = mysqli_query($connect,$sql);
        $row= mysqli_num_rows($result);
        if ($row > 0) {
            $loop = 0;
            while ($a = mysqli_fetch_assoc($result)) {
    ?>
    <div class="box">
    <a href="desc.php?id_buku=<?php echo $a['id_buku'] ?>" class="thumbnail"><img src="image/LibraRead.png"></a>
    <div class="container">
        <p>Title :</p>
        <p><?php echo $a['title'] ?></p>
        <p>Author :</p>
        <p><?php echo $a['author'] ?></p>
        <p>Publisher :</p>
        <p><?php echo $a['publisher'] ?></p>
        <p>Publication year :</p>
        <p><?php echo $a['pubyear'] ?></p>
    </div>
    <?php
        }
    }
    ?>

</body>
</html>