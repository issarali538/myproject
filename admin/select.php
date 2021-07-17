<?php
    include "conn.php";
    $sql = "update std set status = 'Selected' where roll_no = {$_GET['roll_no']} and subject = '{$_GET["subj"]}'  and seme = '{$_GET["seme"]}' and deptt = '{$_GET["deptt"]}'";

    $query = mysqli_query($conn, $sql) or die("Query is failed");
    if($query){
        header("location: http://localhost/myproject/admin/select_std.php");
    }
    
 ?>