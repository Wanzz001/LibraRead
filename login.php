<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraRead</title>
    <link rel="shortcut icon" href="image/LibraRead.png">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-image: url('image/bgwebjadi.png');
            background-size: cover;
            background-repeat: no-repeat;
            overflow: hidden;
            
        }
        .view{
            width: 50%;
            float: left;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .view img{
            margin: 24%;
            width: 30vw;
        }
        .container{
            width: 50%;
            float: left;
            height: 100vh;
            background-color: #D9d9d9;
        }
        .container h1{
            padding: 30px 0 0 20px;
            font-size: 70px;
            margin-bottom: 20px;
        }
        #input{
            margin: 0 0 20px 20px;
            width: 80%;
            height: 50px;
            font-size: 32px;
            border-radius: 15px;
            border: 0;
            padding-left: 60px;
            
        }
        .un{
            background-image: url('https://cdn-icons-png.flaticon.com/128/747/747376.png');
            position: left;
            background-size: 37px;
            background-repeat: no-repeat;
            background-position: 10px;
        }
        .pw{
            background-image: url('https://cdn-icons-png.flaticon.com/128/3064/3064197.png');
            position: left;
            background-size: 37px;
            background-repeat: no-repeat;
            background-position: 10px;
        }
        .fgpw{
            padding-left: 20px;
            margin: 10px 0 20px 0;
            font-size: 20px;
        }
        .fgpw a{
            margin-left: 5px;
            text-decoration: none;
            color: #275ADD;
        }
        .container .login{
            display: block;
            margin: auto;
            font-size: 30px;
            background-color: #FF2C2C;
            height: 60px;
            width: 50%;
            border-radius: 30px;
        }
        .container .acc{
            text-align: center;
            margin: 20px 0;
            font-size: 20px;
        }
        .container .acc a{
            text-decoration: none;
            color: #275ADD;
        }
        .error{
            background-color: #FF2C2C;
            font-size: 30px;
            margin: 25% 30px 0 20px;
            margin-left: 20px;
            padding: 30px;
        }

    </style>
</head>
<body>
    
    <div class="view">
        <img src="image/LibraRead.png">
    </div>
    <div class="container">
        <?php if (isset($_GET['error'])) {?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <h1>Login</h1>
        <form action="logac.php" method="post">
            <input type="text" id="input" class="un" name="username" placeholder="Username" required>
            <input type="password" id="input" class="pw" name="password" placeholder="Password" required>
            <p class="fgpw">Forgot password?<a href="resetpw.php">Click Here!</a></p>
            <input type="submit" value="Login" class="login" name="submit">
            <p class="acc">Don't have account? <a href="signup.php">Sign Up</a></p>
        </form>

    </div>
</body>
    
</html>
