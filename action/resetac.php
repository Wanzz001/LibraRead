<?php 
    include "connect.php";
    $user=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $confirmpw=$_POST['confirmpassword'];
    
    $sql = mysqli_query($connect, "select * from user where username='$user' and email='$email'");
    $check = mysqli_num_rows($sql);

    if ($check > 0) {
        if ($pass == $confirmpw) {
            $update = mysqli_query($connect, "update user set password='$pass' where username='$user' and email='$email'");
            echo "<script>alert('Password has been updated'); window.location.href='login.php';</script>";
        }
    } else{
        echo "<script>alert('Email or password is incorrect'); window.location.href='resetpw.php';</script>";
    }
?>