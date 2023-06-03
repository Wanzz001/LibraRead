<?php
session_start();
include("action/connect.php");
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
$id_buku = $_GET['id'];
$sql = "SELECT * FROM buku WHERE id=$id_buku";
$result = mysqli_query($conn, $sql);

$row = mysqli_num_rows($result);
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
        <link rel="stylesheet" href="style/style.css">
    </head>

    <body>
        <nav>
            <img src="image/LibraRead.png" class="logo"> <a href="index.php" class="home">Home</a> <a href="about.php" class="about">About</a>
            <form action="search.php" method="get" class="fs">
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
        <br><br><br>
        <div class="viewdesc">
            <div class="thumbnaildesc">
                <img src="<?php echo $a['sampul'] ?>">
            </div>
            <div class="containerdesc">
                <p>Title :</p>
                <p class="bold"><?php echo $a['title'] ?></p>
                <p>Author :</p>
                <p class="bold"><?php echo $a['author'] ?></p>
                <p>Publisher :</p>
                <p class="bold"><?php echo $a['publisher'] ?></p>
                <p>Publication year :</p>
                <p class="bold"><?php echo $a['pubyear'] ?></p>
                <p>Subject :</p>
                <p class="bold"><?php echo $a['subject'] ?></p>
                <div class="button">
                    <form action="" method="post" class="descclick">
                        <button name="read" class="read">Read</button>
                        <a href="file/<?php echo $a['file'] ?>" class="download" download>Download</a>
                    </form>
                </div>
            </div>
        </div>
        <!--segini-->
        <?php
        if (isset($_POST['read'])) {
        ?>
            <br>
            <div class="pdf-container">
                <embed class="pdf-object" src="file/<?php echo $a['file'] ?>" type="application/pdf" />
            </div>
        <?php
        }
        ?>
        <!--sampe sini-->
    </body>

    </html>
<?php
}
?>