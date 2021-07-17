<?php
include 'conn.php';
include 'header.php';
?>
<div class="container">
   <div class="row">
      <div class="col-10">
         <h2>Admins</h2>
      </div>
      <div class="col-2"><a href="add-admin.php" class="btn btn-success"><i class="fa fa-plus"></i>
            Add Admin</a></div>
   </div>
   <div class="row justify-content-center">
      <div class="col-10 my-2">
         <div class="card-group mx-auto">
            <?php
            $sql = 'select * from h_admin';
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if (
                        $row['surename'] == $_SESSION['surename'] &&
                        $row['password'] == $_SESSION['password']
                    ) {
                        $display = 'd-none';
                    } else {
                        $display = '';
                    } ?>
            <div class="col-3 <?php echo $display; ?>">
               <div class="card mx-2 my-2">
                  <img src="<?php echo $row[
                      'img'
                  ]; ?>" class="card-img-top" alt="Not Supported">
                  <div class="card-body">
                     <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong><?php echo $row[
                            'surename'
                        ]; ?></strong></li>
                        <li class="list-group-item"><?php echo $row[
                            'phone'
                        ]; ?></li>
                        <li class="list-group-item"><?php echo $row[
                            'address'
                        ]; ?></li>
                     </ul>
                     <a href="del-admin.php?id=<?php echo $row['id']; ?>">
                        <div class="card-footer text-center bg-warning">
                           <div><i class="fa fa-trash"></i></div>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
            <?php
                }
            }
            ?>
         </div>
      </div>
   </div>
</div>