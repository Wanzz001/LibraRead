<?php 
    include 'connect.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

        
    if (isset($_FILES['file'])) {
        if (isset($_POST['upload'])) {
            if (isset($_SESSION['user'])) {
            $title =  $_POST['title'];
            $author =  $_POST['author'];
            $publisher =  $_POST['publisher'];
            $pubyear =  $_POST['pubyear'];
            $subject =  $_POST['subject'];
            $filename = $_FILES['file']['name'];
            $filetmp = $_FILES['file']['tmp_name'];
            $covername = $_FILES['cover']['name'];
            $covertmp = $_FILES['cover']['tmp_name'];
            
            $pathfile = "../file/".$filename;
            $pathcover = "../cover/".$covername;

            if (empty($covername)) {
                $covername = "image/LibraRead.png";
                $pathcover = "../cover/".$covername;
            } else {
                $covername = "cover/".$covername;
            }

            $query = "insert into buku values ('','$title','$author','$publisher','$pubyear','$subject','$filename','$covername')";
            move_uploaded_file($filetmp,$pathfile);
            move_uploaded_file($covertmp,$pathcover);
            $run = mysqli_query($conn,$query);
            $id_buku = mysqli_insert_id($conn);
            mysqli_query($conn, "INSERT INTO upload VALUES ('".$_SESSION['user']['id']."', '$id_buku', '".date("Y-m-d H:i:s")."')");

            if ($run) {
                echo "<script> alert ('Upload Successfull'); history.back();</script>";
                exit();   
            } else {
                echo "<script> alert ('Upload Failed'); history.back();</script>";
                exit();   

            }
            } else {
                echo "<script> alert ('Silahkan login'); history.back();</script>";   

            }

        }
    }
        
    

?>