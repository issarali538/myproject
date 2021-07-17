<?php
include "conn.php";
$roll_no = $_GET["roll_no"];
$seme    = $_GET["seme"];
$subject = $_GET["subj"];
$deptt   = $_GET["deptt"];
$address = $_GET["address"];

// first first fetch the record alredy avalaible

$select_duplicate = "select * from interview where roll_no = {$roll_no} and seme = '{$seme}' and subject = '{$subject}' and deptt = '{$deptt}'";
$result_duplicate = mysqli_query($conn, $select_duplicate);
if (mysqli_num_rows($result_duplicate) > 0) {

// delete the fetch record from the database 

   $delete_duplicate  = "delete from interview where roll_no = {$roll_no} and seme = '{$seme}' and subject = '{$subject}' and deptt = '{$deptt}'";
   $delete_duplicate = mysqli_query($conn, $delete_duplicate);

   // if duplicate record is deleted then insert the new record 

   if ($delete_duplicate) {
      $sql_status = "INSERT INTO interview (roll_no, subject, seme, deptt, address) VALUES ({$roll_no}, '{$subject}', '{$seme}', '{$deptt}', {$address})";

      $result = mysqli_query($conn, $sql_status) or die("Query is failed on line# :" . __LINE__);

      if ($result) {
         header("location: http://localhost/myproject/admin/take-interview.php");
        
      }
   }
} else {

   // if duplicate record is not found then insert the new record  
   
   $sql_status = "INSERT INTO interview (roll_no, subject, seme, deptt, address) VALUES ({$roll_no}, '{$subject}', '{$seme}', '{$deptt}', {$address})";

   $result = mysqli_query($conn, $sql_status) or die("Query is failed on line# :" . __LINE__);
   
   if ($result) {
      header("location: http://localhost/myproject/admin/take-interview.php");
   }
}