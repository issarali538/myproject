<?php
require "conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Change Hostel Fee</title>
   <link rel="stylesheet" href="./bootstrap.min.css">
</head>

<body>
   <div class="container">
      <div class="row">
         <h4>Changee Hotel Fee for <?php echo date("Y"); ?></h4>
         <hr>
         <div class="col-7 mx-auto">
            <?php
            $sql = "SELECT * FROM fee";
            $res = mysqli_query($conn, $sql) or die('query is failed on line#' . __LINE__);
            if (mysqli_num_rows($res) > 0) {
               while ($row = mysqli_fetch_assoc($res)) {
            ?>
                  <!-- starting of form -->
                  <form action="" method="POST">
                     <div class="form-group">
                        <label for="">Change Hostel Fee</label>
                        <input type="number" name="hostel_fee" value="<?php echo $row['h_fee']; ?>" class="form-control">
                     </div>
                     <hr>
                     <div class="form-group">
                        <label for="">Change Water Bill</label>
                        <input type="number" name="water_bill" value="<?php echo $row['h_water']; ?>" class="form-control">
                     </div>
                     <hr>
                     <div class="form-group">
                        <label for="">Change Hostel Security</label>
                        <input type="number" name="hostel_security" value="<?php echo $row['h_security']; ?>" class="form-control">
                     </div>
                     <hr>
                     <input type="submit" name="save_changes" value="Save Changes" class="btn btn-success">
                  </form>
                  <!--ending of form -->
            <?php
               }
            }
            ?>
         </div>
      </div>
   </div>
</body>
</html>
<!-- fee updation  -->
<?php 
if(isset($_POST["save_changes"])){
   $hostel_fee = $_POST["hostel_fee"];
   $water_bill = $_POST["water_bill"];
   $hostel_security = $_POST["hostel_security"];
   $sql2 = "UPDATE fee SET h_fee = {$hostel_fee}, h_water = {$water_bill}, h_security = {$hostel_security}";
   $res1 = mysqli_query($conn, $sql2) or die('query is failed on line#' . __LINE__);
   if($res){
     header("location: http://localhost/myproject/admin/app.php");
   }

}