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
    <title>LibraRead</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="image/LibraRead.png">
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

    <a onclick="history.back()"><img src="image/back.png" class="back"></a>
    <form action="action/uploadac.php" method="post" enctype="multipart/form-data">
        <div class="col-4">
            <input type="file" id="fileInput" accept="image/*" onchange="previewImage(event)" name="cover">
            <label for="fileInput" id="image-preview" class="image-preview">
                <span>Upload cover</span>
            </label>
            <script>
                function previewImage(event) {
                    var input = event.target;
                    var preview = document.getElementById('image-preview');
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var image = document.createElement('img');
                            image.src = e.target.result;
                            preview.innerHTML = '';
                            preview.appendChild(image);
                        };

                        reader.readAsDataURL(input.files[0]);
                    } else {
                        preview.innerHTML = '<span>Upload cover</span>';
                    }
                }
            </script>
        </div>
        <div class="conup col-5">
            <input type="text" id="inputupload" name="title" placeholder="Title" required>
            <input type="text" id="inputupload" name="author" placeholder="Author" required>
            <input type="text" id="inputupload" name="publisher" placeholder="Publisher" required>
            <input type="number" id="inputupload" name="pubyear" placeholder="Publication Year" required>
            <input type="text" id="inputupload" name="subject" placeholder="Subject" required>
            <div class="file">
                <p>File </p>
                <input type="file" accept="application/pdf" name="file" required>
            </div>
            <div class="button">
                <input type="submit" value="Upload" class="upload" name="upload">
                <a href="index.php" class="cancel">Cancel</a>
            </div>
        </div>
    </form>
    </div>
</body>
</html>