<?php 
    include("connect.php");
    $id = $_GET['id'];
    $sql="select * from buku where id=$id";
    $result = mysqli_query($connect,$sql);

    $row= mysqli_num_rows($result);
    if ($row > 0) {
        $a = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
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
    </style>
</head>
<body>
    <nav>
        <img src="image/LibraRead.png" class="logo"> <a href="index.php" class="home">Home</a> <a href="about.html">About</a>
    </nav>
    <div class="container">
        <h1><?php echo $a['title'] ?></h1>
        <p>Penulis: <?php echo $a['author'] ?></p>
        <p>Penerbit: <?php echo $a['publisher'] ?></p>
        <p>Tahun Terbit: <?php echo $a['pubyear'] ?></p>
    </div>
</body>
</html>
<?php 
    }
?>
