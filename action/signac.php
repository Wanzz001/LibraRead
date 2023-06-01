<?php 
    include "connect.php";
    $user=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $confirmpw=$_POST['confirmpassword'];

    $sql = mysqli_query($conn, "select * from user where username='$user'");
    $check = mysqli_num_rows($sql);
    if ($check > 0) {
        echo "<script> alert('Username already exists'); history.back();</script>";
        exit();
    } 
    
    if ($pass == $confirmpw){
            $sql = mysqli_query($conn, "INSERT INTO user (username,email,password) VALUES ('$user','$email','$pass')");
            echo "<script> alert('Account has been created'); window.location.href='../login.php';</script>";
    } else{
        echo "<script> alert('Password and confirm password are different'); history.back();</script>";
        exit();
    }
    
?>