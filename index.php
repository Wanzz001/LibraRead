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
        <img src="image/LibraRead.png" class="logo">
        <a href="index.php" class="home">Home</a>
        <a href="about.php" class="about">About</a>
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

    <div id="sidebar">
        <div class="toggle-btn" onclick="show()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="list-items">
            <li <?php if ($page == '') { ?>style="background-color: #C47521;" <?php } ?>><img src="image/user.png" width="30px"><a href="#" style="color:white; font-size:30px; margin-left: 10px;"><?php echo $_SESSION['user']['username']; ?></a></li>
            <li <?php if ($page == 'upload') { ?>style="background-color: #C47521;" <?php } ?>><img src="image/upload.png" width="30px"><a href="upload.php" style="color:white; font-size:30px; margin-left: 10px;">Upload</a></li>
            <li <?php if ($page == 'logout') { ?>style="background-color: #C47521;" <?php } ?>><img src="image/logout.png" width="30px"><a href="logout.php" style="color:white; font-size:30px; margin-left: 10px;">Logout</a></li>
        </ul>
    </div>
    <script>
        function show() {
            document.getElementById('sidebar').classList.toggle('active');
        }
    </script>
    <br><br><br><br><br><br>
    <div class="view">
        <a href="foryou.php" style="color:white; grid-area: head1; font-size: 40px; margin-left: 30px;">For You ></a>
        <br>
        <div style="grid-area: content1;" class="grid-content">
            <?php
            $sql = "select * from buku order by rand()";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $loop = 0;
                while ($a = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="box">
                        <a href="desc.php?id=<?php echo $a['id'] ?>" class="thumbnail"><img src="<?php echo $a['sampul'] ?>"></a>
                        <div class="container">
                            <p>Title :</p>
                            <p><?php echo substr($a['title'], 0, 25)  ?></p>
                            <p>Author :</p>
                            <p><?php echo substr($a['author'], 0, 25) ?></p>
                            <p>Publisher :</p>
                            <p><?php echo substr($a['publisher'], 0, 25) ?></p>
                            <p>Publication year :</p>
                            <p style="font-weight: bold;"><?php echo $a['pubyear'] ?></p>
                        </div>
                    </div>
            <?php
                    $loop++;
                    if ($loop >= 3) {
                        break;
                    }
                }
            }
            ?>
            <div class="box">
                <a href="foryou.php">
                    <div class="thumbnail">
                        <img style="width:70px;" src="image/right.png">
                        <p style="font-size:30px; color:black;"><br>See all</p>
                    </div>
                </a>
            </div>
        </div>
        <a href="recenly.php" style="color:white; grid-area: head2; font-size: 40px; margin-left: 30px;">Recently Added ></a>
        <br>
        <div style="grid-area: content2;" class="grid-content">
            <?php
            include("action/connect.php");
            $sql = "select * from buku order by id desc";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $loop = 0;
                while ($a = mysqli_fetch_assoc($result)) {
            ?>
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
            <?php
                    $loop++;
                    if ($loop >= 3) {
                        break;
                    }
                }
            } ?>
            <div class="box">
                <a href="recenly.php">
                    <div class="thumbnail">
                        <img style="width:70px;" src="image/right.png">
                        <p style="font-size:30px; color:black;"><br>See all</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>