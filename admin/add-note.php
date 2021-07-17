<?php
include "conn.php";
echo '<head>
<link rel="stylesheet" href="bootstrap.min.css">
</head>';
?>
<div class="container">
    <div class="row border justify-content-center">
    <div class="col-7">
        <h1>Add Notifiction</h1>
    </div>
        <form action="save-note.php" method="POST" enctype="multipart/form-data">
            <div class="col-7 offset-3">
               <div class="form-group">
               <label for="">Notificate Heading</label>
                <input type="text" name="heading" required class="form-control">
               </div>
            </div>
            <div class="col-7 offset-3">
               <div class="form-group">
               <label for="">Description</label>
                <textarea name="desc" class="form-control" required cols="30" rows="10"></textarea>
               </div>
            </div>
            <div class="col-7 offset-3">
               <div class="form-group">
               <label for="">Upload File (if any)</label>
                <input type="file" name="note_file" class="form-control" id="" cols="30" rows="10">
               </div>
            </div>
            <div class="col-7 offset-3 mt-2">
               <div class="form-group">
                <input type="submit" value="Save" name="submit" class="btn btn-success" id="" cols="30" rows="10">
               </div>
            </div>
        </form>
    </div>
</div>