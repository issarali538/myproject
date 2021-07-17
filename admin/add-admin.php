<?php
include "conn.php";
include "header.php";
?>
<div class="container">
    <h1>Add Amin</h1>
    <div class="row justify-content-center">
        <div class="col-7">
            <form action="save-admin.php" class="border border-primary p-4" method="POST" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Surename</span>
                    <input type="text" name="surename" class="form-control" required aria-label="Username" aria-describedby="basic-addon1">

                </div>
                <div class="input-group mb-3">
                    <input type="text" name="phone" class="form-control" required aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-mobile"></i></span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock"></i></span>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="c_password" class="form-control" required placeholder="Conform Password" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-check"></i></span>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image size must not be greater then 2 mb</label>
                    <input type="file" name="admin_img" class="form-control" required id="formFile">
                </div>
                <div class="d-grid gap-2">
                    <input type="submit" value="Submit" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>
</div>