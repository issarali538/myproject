<?php
include "conn.php";
include "header.php";
echo "<head>
<style>
    #notes{background-color: #2ecc71;}
</style>
</head>";
?>
<div class="container">
    <div class="row">
        <div class="col-10">
            <h2>Notifications</h2>
        </div>
        <div class="col-2"><a href="add-note.php" class="btn btn-success"><i class="fa fa-plus mx-2"></i>Add</a></div>
        <?php 
            $sql = "select * from note order by id desc";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){

        ?>
        <div class="col-6 mb-2">
            <div class="card text-center">
                <div class="card-header">
                    <h5><?php echo $row["heading"]; ?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo substr($row["detail"], 0, 100) . ".."; ?> <a href="read-more.php?id=<?php echo $row['id']; ?>" class="h4"><i class="fa fa-hand-point-right"></i></a></p>
                </div>
                <div class="card-footer text-muted">
                    <div>
                        <a href="edit-note.php?id=<?php echo $row['id']; ?>" class="mx-3 btn btn-outline-success btn-sm"><i class="fa fa-pencil-alt"></i></a>
                        <a href="del-note.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success btn-sm"><i class="fa fa-trash-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            }   
        }
        ?>
    </div>
</div>