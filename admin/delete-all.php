<?php 
include "conn.php";
$sql = "delete std, std_status from std join std_status on std_status.roll_no=std.roll_no
and std_status.subject=std.subject and std_status.seme=std.seme
where std_status.interview='Yes' and std.status = 'Rejected'";

$result = mysqli_query($conn, $sql);
if($result){
    header("location: http://localhost/myproject/admin/delete-all.php");
}

?>