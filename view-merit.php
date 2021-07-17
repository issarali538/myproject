<?php
    include "conn.php";
    include "header.php";
?>
<div class="container my-5">
    <h2 class="text-success">Hostel Merit List</h2>
    <div class="row">
        <div class="col-12">
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Roll No</th>
      <th scope="col">Name</th>
      <th scope="col">Father Name</th>
      <th scope="col">Subject</th>
      <th scope="col">Seme</th>
      <th scope="col">Department</th>
      <th scope="col">Bank Challan</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $sql = "SELECT std.roll_no, std.name, std.fname, std.subject, std.seme, std.deptt FROM std JOIN merit on merit.roll_no = std.roll_no and merit.subject = std.subject and merit.seme = std.seme and merit.deptt = std.deptt";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){

         
    ?>
    <tr>
      <th scope="row"><?php echo $row["roll_no"]; ?></th>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["fname"]; ?></td>
      <td><?php echo $row["subject"]; ?></td>
      <td><?php echo $row["seme"]; ?></td>
      <td><?php echo $row["deptt"]; ?></td>
     <td> <a class="btn btn-sm btn-success" href="bank-raseed.php?roll_no=<?php echo $row['roll_no']; ?> &&subj=<?php echo $row['subject']; ?> && seme=<?php echo $row['seme']; ?> && deptt=<?php echo $row['deptt']; ?>">Download</a></td>
    </tr>
    <?php 
       }
    }
    ?>
</tbody>
</table>
        </div>
    </div>
</div>
