<?php
include "conn.php";
include "header.php";
?>
<div class="container my-4">
    <div class="row justify-content-center">
    <?php 
                 $sql = "SELECT * FROM note where id={$_GET['id']}";
                 $result = mysqli_query($conn, $sql);
                 if(mysqli_num_rows($result) > 0){
                     while($row = mysqli_fetch_assoc($result)){
    ?>
        <div class="col-md-8 text-success">
            <h1><?php echo $row['heading']; ?></h1>
        </div>
        <div class="col-md-8 border border-success rounded p-5">
            <p class="text-success">
            <?php echo $row['detail']; ?>
            </p>
        </div>
        <?php 
            $save_file = explode(".", $row["file"]);
            $ext = end($save_file);
          
            if($ext == "xlsx" || $ext =="xls"){
        ?>
        <div class="col-md-8 d-flex flex-row-reverse">
                        <a href="view-merit.php" class="mt-3 btn btn-success">View Merit List</a>
                        <a href="download-file.php?file=<?php echo $row['file']; ?>" class="btn mt-3 mx-1 btn-success">Download Merit List</a>
        </div>
        <?php 
        }
                     }
                    }
        ?>
    </div>
</div>
