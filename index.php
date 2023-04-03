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
            width: 300px;
            height: 400px;
            float: left;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 40px 60px;
        }
        .thumbnail img{
            width: 200px;
        }
        .container{
            margin: 50px 20px;
            float: left;
        }
        .container p{
            font-size: 27px;
            margin-bottom: 10px;
            color: white;
        }
    </style>
</head>
<body>
    <nav>
        <img src="image/LibraRead.png" class="logo"> <a href="index.php" class="home">Home</a> <a href="about.html">About</a>
    </nav>
    <?php 
        include("connect.php");
        $sql="select * from buku";
        $result = mysqli_query($connect,$sql);

        $row= mysqli_num_rows($result);
        if ($row > 0) {
            while ($a = mysqli_fetch_assoc($result)) {
    ?>
    <a href="desc.php?id=<?php echo $a['id'] ?>" class="thumbnail"><img src="LibraRead.png"></a>
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