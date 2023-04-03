<?php 
    include "connect.php";
    $username=$_POST['username'];
    $pass=$_POST['password'];
    
    $sql=mysqli_query($connect, "select * from user where username ='$username' and password= '$pass'");

    $cek = mysqli_num_rows($sql);

    if ($cek > 0) {
        echo "<script> alert ('Login Successfull');  window.location.href='upload.php';</script>";    
        
    } else{
        header("Location: login.php?error=Username or password is incorrect");
        exit();
    }
?>