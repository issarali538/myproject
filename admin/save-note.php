<?php 
    include "conn.php";

    if(isset($_POST["submit"])){
        $heading = trim($_POST["heading"]);
        $desc = trim($_POST["desc"]);
        $desc = str_replace("'", "\'", $desc);
        $date = date("D". ",". "d". "-" . "F" . "-" . "Y");
        if(isset($_FILES["note_file"]["name"])){
            $note_file = $_FILES["note_file"]["name"];
            $tmp_name = $_FILES["note_file"]["tmp_name"];
            $folder = "files/" . time() . "-" . $note_file;
            move_uploaded_file($tmp_name, $folder);
        }
        else{
            $folder = "";
        }

        $sql = "INSERT INTO note (heading, detail , date, file) VALUES ('{$heading}', '{$desc}', '{$date}', '{$folder}')";
        $result = mysqli_query($conn, $sql) or die("Notification is not added");
        if($result){
            header("location: http://localhost/myproject/admin/notification.php");
        }
    }
?>