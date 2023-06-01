<?php 
  $conn= mysqli_connect('localhost','root','','libranew');
    if(!$conn) {
        die ("Connenction failed: ".mysqli_connect_error());
    }
    ?>