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
        <div class="backview">
            <a onclick="history.back()" class="loginback">
            <img src="https://cdn-icons-png.flaticon.com/128/3114/3114883.png" class="logback">Back</a>
        </div>
            <h1>Sign Up</h1>
            <form action="action/signac.php" method="post">
                <input type="text" id="input" class="un" name="username" placeholder="Username" required>
                <input type="email" id="input" class="em" name="email" placeholder="Email" required>
                <input type="password" id="input" class="pw" name="password" placeholder="Password" required>
                <input type="password" id="input" class="pw" name="confirmpassword" placeholder="Confirm Password" required>
                <input type="submit" value="Sign Up" class="login">
            </form>
        </div>
    </div>
</body>

</html>