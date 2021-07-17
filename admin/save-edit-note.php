<?php 
    include "conn.php";

    if(isset($_POST["submit"])){
        $id = $_POST['id'];
        $heading = trim($_POST["heading"]);
        $desc = trim($_POST["desc"]);
        $old_file = $_POST["old_file"];
        $new_file = $_FILES["new_file"]["name"];
        $new_file_tmp_name = $_FILES["new_file"]["tmp_name"];
        $date = date("D". ",". "d". "-" . "F" . "-" . "Y");
        $folder = "files/" . time() . "-" . $new_file;
        if(!isset($_FILES["new_file"]["name"])){
           $folder = $old_file;
        }
        else{
          unlink($old_file);            
            move_uploaded_file($new_file_tmp_name, $folder);
        }

        $sql = "update note set heading='{$heading}', detail='{$desc}', date='{$date}', file='{$folder}' where id={$id}";

        $result = mysqli_query($conn, $sql) or die("Notification is not added");
        if($result){
            header("location: http://localhost/myproject/admin/notification.php");
        }
    }
?>

