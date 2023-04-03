<?php 
    include "connect.php";
    $user=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $confirmpw=$_POST['confirmpassword'];
    
    if ($pass == $confirmpw) {
        $sql=mysqli_query($connect, "insert into user values('','$user','$email','$pass')");

        echo "<script> alert('Account has been created'); </script>";
    } else{
        echo "<script> alert('Your password and confirm password is different'); </script>";
    }
    
?>