<?php
include "conn.php";
include "header.php";
echo "<head>
<style>
    #merit{background-color: #2ecc71;}
</style>
</head>";
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-5"><h2>Merit List</h2></div>
        <div class="col-5">
        <?php 
        $sql1 = "SELECT * from merit";
        $res1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($res1)){
            $total_records = mysqli_num_rows($res1);
        }
        ?>
        <div>Total Selection: <strong><?php echo $total_records; ?></strong></div>
        </div>
        <div class="col-2"><button id="table" class="btn btn-success">Save Merit List</button></div>
        <div class="col-12">
            <table class="table table-bordered table-striped border-primary" id="mytable">
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
                    </tr>
                </thead>
                <tbody>
                <?php 

                // the command will really fetch the data from the database 

                $sql = "SELECT std.roll_no, std.name,std.fname, std.phone,std.subject, std.deptt,std.seme, address.location FROM std JOIN merit on merit.roll_no = std.roll_no AND merit.seme = std.seme and merit.subject = std.subject and merit.deptt = std.deptt JOIN address on address.add_id = std.address;";
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<!-- --This java script will save the merit list in the xlsx or xlsx file formate (in excel formate)---- -->

<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script type="text/javascript">
$(document).ready(()=>{
    $("#table").click(()=>{
        $("#mytable").table2excel({
    exclude: ".excludeThisClass",
    name: "Worksheet Name",
    filename: "SomeFile.xls", // do include extension
    preserveColors: false // set to true if you want background colors and font colors preserved
});
    });
});
</script>