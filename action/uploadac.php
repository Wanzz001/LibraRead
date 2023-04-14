<?php 
    include 'connect.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

        
    if (isset($_FILES['file'])) {
        if (isset($_POST['upload'])) {
            $title =  $_POST['title'];
            $author =  $_POST['author'];
            $publisher =  $_POST['publisher'];
            $pubyear =  $_POST['pubyear'];
            $subject =  $_POST['subject'];
            $filename = $_FILES['file']['name'];
            $filetmp = $_FILES['file']['tmp_name'];
            
            $path = "../file/".$filename;

            $query = "insert into buku values ('','$title','$author','$publisher','$pubyear','$subject','$filename')";
            move_uploaded_file($filetmp,$path);
            $run = mysqli_query($connect,$query);

            if ($run) {
                echo "<script> alert ('Upload Successfull');</script>";   
            } else {
                echo mysqli_error($connect);
            }

        }
    }
        
    

?>
