<?php 
    include "conn.php";
    $for_file = "select file from note where id = {$_GET['id']}";
    $result_for_file = mysqli_query($conn, $for_file);
    if(mysqli_num_rows($result_for_file) > 0){
        $this_file = mysqli_fetch_assoc($result_for_file);
        unlink($this_file['file']);
    }
    $sql = "delete from note where id = {$_GET['id']}";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location: http://localhost/myproject/admin/notification.php");
    }
?>