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
                echo "<script> window.location.href='search.php?search=$find';</script>";
            }
            ?>
        </form>
    </nav>
    <p class="tag">Sort by: </p>
    <form action="" method="post">
        <div class="group">
            <button name="all" class="sort">All</button>
            <button name="title" class="sort">Title</button>
            <button name="author" class="sort">Author</button>
            <button name="publisher" class="sort">Publisher</button>
        </div>
        <?php
        $search = $_GET['search'];
        $row;
        $result;
        $sql;
        if (isset($_POST['title'])) {
            $sql = "select * from buku where title like '%" . $search . "%'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($result);
        } elseif (isset($_POST['author'])) {
            $sql = "select * from buku where author like '%" . $search . "%'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($result);
        } elseif (isset($_POST['publisher'])) {
            $sql = "select * from buku where publisher like '%" . $search . "%'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($result);
        } else {
            $sql = "select * from buku where title like '%" . $search . "%' or author like '%" . $search . "%' or publisher like '%" . $search . "%'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($result);
        }
        if ($row > 0) {
            $loop = 0;
            while ($a = mysqli_fetch_assoc($result)) {
        ?>
    </form>
     <div class="box-container">
        <div class="box">
            <a href="desc.php?id=<?php echo $a['id'] ?>" class="thumbnail"><img src="<?php echo $a['sampul'] ?>"></a>
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
        </div>
    </div>
        
<?php
            }
        } else {
    ?>
    <h1 class="nf">Not found</h1>
<?php
        }

?>


</form>

</body>

</html>