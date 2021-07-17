<?php
include "conn.php";
echo '<head>
<link rel="stylesheet" href="bootstrap.min.css">
</head>';
?>
<div class="container">
    <div class="row border justify-content-center">
    <div class="col-7">
        <h1>Edit Notifiction</h1>
    </div>
    <?php 
        $sql = "select * from note where id={$_GET['id']}";
        $result = mysqli_query($conn, $sql) or die("Edit Post Query is failed");
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
    ?>
        <form action="save-edit-note.php" method="POST" enctype="multipart/form-data">
            <div class="col-7 offset-3">
               <div class="form-group">
               <label for="">Notificate Heading</label>
                <input type="text" name="heading" value="<?php echo $row['heading']; ?>" required class="form-control">
               </div>
            </div>
            <div class="col-7 offset-3">
               <div class="form-group">
               <label for="">Description</label>
                <textarea name="desc" class="form-control" required cols="30" rows="10"><?php echo $row["detail"]; ?></textarea>
               </div>
            </div>
                <?php 
                    if($row["file"] != ""){
                       echo '<input type="hidden" name="old_file" value="'.$row["file"].'">';
                    }
                ?>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="col-7 offset-3">
               <div class="form-group">
               <label for="">Upload File (if You upload the new file then then last uploaded file will be deleted)</label>
                <input type="file" name="new_file" class="form-control" id="" cols="30" rows="10">
               </div>
            </div>
            <?php 
                   }
                }
            ?>
            <div class="col-7 offset-3 mt-2">
               <div class="form-group">
                <input type="submit" value="Save Changes" name="submit" class="btn btn-success" id="" cols="30" rows="10">
               </div>
            </div>
        </form>
    </div>
</div>