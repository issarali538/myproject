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
                     }
                    }
        ?>
    </div>
</div>