<?php
session_start();
include 'action/connect.php';
if (isset($_SESSION['user'])) {
    header("Location: index.php");
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$pass'");

    $cek = mysqli_num_rows($sql);
    $data = mysqli_fetch_assoc($sql);
    if ($cek > 0) {
        $_SESSION['user'] = $data;
        header("Location: index.php");
    } else {
        echo '<script>alert("Account not found!")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraRead</title>
    <link rel="shortcut icon" href="image/LibraRead.png">
    <link rel="stylesheet" href="style/style.css">
</head>

<body class="logview">
    <div class="lv">
        <img src="image/LibraRead.png">
    </div>
    <div class="rv">
        <div>
            <img src="image/LibraRead.png" class="loglogo">
            <h1>Login</h1>
            <form method="post">
                <input type="text" id="input" class="un" name="username" placeholder="Username" required>
                <input type="password" id="input" class="pw" name="password" placeholder="Password" required>
                <p class="fgpw">Forgot password?<a href="resetpw.php" class="logclick">Click Here!</a></p>
                <input type="submit" value="Login" class="login" name="login">
                <p class="acc">Don't have account? <a href="signup.php" class="logclick">Sign Up</a></p>
            </form>
        </div>
    </div>
</body>

</html>