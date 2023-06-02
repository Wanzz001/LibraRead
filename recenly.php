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
    <link rel="stylesheet" href="style/style.css">
    <title>LibraRead</title>
</head>

<body>
    <nav>
        <img src="image/LibraRead.png" class="logo"> <a href="index.php" class="home">Home</a> <a href="about.php" class="about">About</a>
        <form action="" method="get" class="fs">
            <input type="search" name="find" class="search" placeholder="Search" required>
            <?php
            if (isset($_GET['find'])) {
                $find = $_GET['find'];
                echo "<script> window.location.href='index.php?search=$find';</script>";
            }
            ?>
        </form>
    </nav>

    <a onclick="history.back()"><img src="image/back.png" class="back"></a>
    <br>
    <?php

    $sql = "select * from buku order by id desc";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    if ($row > 0) {
        $loop = 0;
        while ($a = mysqli_fetch_assoc($result)) {
    ?>
            <div class="box-container">
                <div class="box">
                    <a href="desc.php?id=<?php echo $a['id'] ?>" class="thumbnail"><img src="<?php echo $a['sampul'] ?>"></a>
                    <div class="container">
                        <p>Title :</p>
                        <p style="font-weight: bold;"><?php echo substr($a['title'], 0, 25)  ?></p>
                        <p>Author :</p>
                        <p style="font-weight: bold;"><?php echo substr($a['author'], 0, 25) ?></p>
                        <p>Publisher :</p>
                        <p style="font-weight: bold;"><?php echo substr($a['publisher'], 0, 25) ?></p>
                        <p>Publication year :</p>
                        <p style="font-weight: bold;"><?php echo $a['pubyear'] ?></p>
                    </div>
                </div>
            </div>
    <?php
            $loop++;
        }
    }
    ?>
</body>

</html>