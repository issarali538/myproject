<?php
include "conn.php";
include "header.php";
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12"><h2>Recent Applications</h2></div>
        <div class="col-12">
            <table class="table table-bordered table-striped border-primary">
                <thead>
                    <tr>
                        <th scope="col">Roll No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Father Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Deptt</th>
                        <th scope="col">Seme</th>
                        <th scope="col">Address</th>
                        <th scope="col">Problem</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $sql = "SELECT * FROM std  join address on address.add_id = std.address";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
                    <tr>
                        <th scope="row"><?php echo $row["roll_no"]; ?></th>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["fname"]; ?></td>
                        <td><?php echo $row["phone"]; ?></td>
                        <td><?php echo $row["subject"]; ?></td>
                        <td><?php echo $row["deptt"]; ?></td>
                        <td><?php echo $row["seme"]; ?></td>
                        <td><?php echo $row["location"]; ?></td>
                        <td><?php echo $row["reason"]; ?></td>
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