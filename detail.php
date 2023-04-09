<?php
include 'action/connect.php';
if ($_GET['id']) {
    $check_buku = mysqli_query($connect, "SELECT * FROM buku WHERE id = '".$_GET['id']."'");
    $data_buku = mysqli_fetch_assoc($check_buku);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data_buku['title']; ?></title>
    <link rel="shortcut icon" href="image/LibraRead.png">
    <style>
        *{
            margin: 0;
            padding: 0;
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
        .back{
            height: 70px;
            margin: 20px;
            float: left;
        }
        .back::after{
            content: '';
            display: block;
            clear: both;
        }
        .back::after{
            content: "";
            clear: both;
            display: block;
        }
        .container{
            margin-top: 120px;
            display: flex;
            flex-direction: column;
        }
        [class*="col-"] {
            float: left;
            padding: 15px;
        }
        .col-1 {width: 8.33%;}
        .col-2 {width: 16.66%;}
        .col-3 {width: 25%;}
        .col-4 {width: 33.33%;;}
        .col-5 {width: 41.66%;}
        .col-6 {width: 50%;}
        .col-7 {width: 58.33%;}
        .col-8 {width: 66.66%;}
        .col-9 {width: 75%;}
        .col-10 {width: 83.33%;}
        .col-11 {width: 91.66%;}
        .col-12 {width: 100%;}

        .read{
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('https://cdn-icons-png.flaticon.com/128/9355/9355940.png');
            background-size: 40px;
            background-repeat: no-repeat;
            width: 250px;
            height: 60px;
            font-size: 40px;
            background-color: rgb(40, 236, 40);
            background-position: 10px;
            margin-left: 20px;
            margin-top: 20px;
        }

        .download{
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('https://cdn-icons-png.flaticon.com/128/1828/1828778.png');
            background-size: 40px;
            background-repeat: no-repeat;
            width: 250px;
            height: 60px;
            font-size: 40px;
            background-color: rgb(255, 0, 0);
            background-position: 10px;
            margin-left: 20px;
            margin-top: 20px;
            border: 1px solid black;
            font-family: Arial, Helvetica, sans-serif;
        }
        .button{
            display: flex;
            align-items: center;
            justify-content: start;
        }
    </style>
</head>
<body>
    <nav>
        <img src="image/LibraRead.png" class="logo"> <a href="index.php">Home</a> <a href="about.html">About</a>
    </nav>

    <a href="login.php"><img src="back.png" class="back"></a>
        <div class="col-2">
        </div>
        <div class="col-3">
        <img src="<?php echo $data_buku['sampul']; ?>" style="text-align:right;" width="350px">
        </div>
        <div class="container col-5" style="text-align:left;">
            <p style="color:white;">Title :</p><br>
            <p style="color:white;"><b><?php echo $data_buku['title']; ?></b></p><br>
            <p style="color:white;">Author :</p><br>
            <p style="color:white;"><b><?php echo $data_buku['author']; ?></b></p><br>
            <p style="color:white;">Publisher :</p><br>
            <p style="color:white;"><b><?php echo $data_buku['publisher']; ?></b></p><br>
            <p style="color:white;">Publication year :</p><br>
            <p style="color:white;"><b><?php echo $data_buku['pubyear']; ?></b></p><br>
            <p style="color:white;">Subject :</p><br>
            <p style="color:white;"><b><?php echo $data_buku['subject']; ?></b></p><br>
        </div>
        <div class="col-4">
        </div>
        <div class="button col-6">
                <a href="" class="read">Read</a>
                <a href="file/<?php echo $data_buku['file']; ?>" class="download">Download</a>
        </div>
</body>
</html>