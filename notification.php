<?php
include "conn.php";
include "header.php";
?>
<section class=".bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 text-center my-4 text-center">
                    <h1>Notifications</h1>
            </div>
            <?php 
                $sql = "SELECT * FROM note ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="col-md-7">
                <div class="card text-center text-white mb-3">
                    <div class="card-header" style="background-color: #16a085;">
                        <?php echo $row["heading"]; ?>
                    </div>
                    <div class="card-body text-dark">
                        <p class="card-text"><?php echo substr($row["detail"], 0, 70). "..."; ?></p>
                        <a href="read-more.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Read More</a>
                    </div>
                    <div class="card-footer text-white" style="background-color: #16a085;">
                        Published on: <?php echo $row["date"]; ?>
                    </div>
                </div>
            </div>
            <?php 
               }
            }
            ?>
        </div>
    </div>
</section>