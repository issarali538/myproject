<?php
$page_name = basename($_SERVER["PHP_SELF"]);
switch ($page_name) {
    case"notification.php":
        $url_page = "Notification";
        break;
    case"merit-list.php":
        $url_page = "Merit List";
        break;
    case"app.php":
        $url_page = "Recent Applications";
        break;
    case"take-interview.php":
        $url_page = "Interviews";
        break;
    case"select_std.php":
        $url_page = "Select Students";
        break;
    case"overveiw.php":
        $url_page = "Overview";
        break;
    default:
        $url_page = "Admin Panel";
}
include "conn.php";
session_start();
if (!isset($_SESSION["surename"]) && !isset($_SESSION["password"])) {
    header("location: http://localhost/myproject/admin/app.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
    #admin-detail {
        visibility: hidden;
        position: fixed;
        border: 1px solid black;
    }

    #admin-detail img {
        width: 152px;
        height: 140px;
    }

    #admin-detail a {
        text-decoration: none;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $url_page; ?></title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <?php echo '<link rel="stylesheet" href="h-menu.css">'; ?>
</head>

<body>
    <header id="admin-header">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-2">
                    <img src="./images/college-icon.jpg" height="100" width="100" alt="" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="my-2">
                        <h2 class="text-muted display-3">Welcome To Kabir Hostel</h2>
                    </div>
                </div>
                <div class="col-md-2">
                    <img src="./images/college-icon.jpg" height="100" width="100" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row my-1" id="admin-menu">
                <div class="col-md-8 bg-success d-flex">
                    <div class="nav">
                        <li class="nav-item active" id="app"><a href="app.php" class="nav-link h4">Applications</a></li>
                        <li class="nav-item" id="merit"><a href="merit-list.php" class="nav-link h4">Merit List</a></li>
                        <li class="nav-item mx-1" id="notes"><a href="notification.php" class="nav-link h4">Notifications</a></li>
                    </div>
                    <div class="dropdown" id="normal-dropdwon">
                        <button class="btn btn-success btn-lg dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Activities
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="take-interview.php">Take Interveiws</a></li>
                            <li><a class="dropdown-item" href="fee.php">Change Fee</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 text-center text-dark bg-success">
                    <div class="my-2">
                        <!-- header img small   -->
                        <img id="adminPopup" style=" border-radius: 15px;" src="<?php echo  $_SESSION['img']; ?>" width="32" height="32" alt="" class="img-fluid" id="img-modal">
                    </div> <!-- header img small   -->
                    <!-- ----modal----- -->
                    <div id="admin-detail" class="bg-success">
                        <div><img src="<?php echo $_SESSION['img']; ?>" alt="not supported"></div>
                        <div class="card bg-success" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-white"><?php echo  $_SESSION["surename"]; ?></h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> <a style="color: black;" href="admin.php">Admins</a> </li>
                                    <li class="list-group-item"> <a style="color: black;" href="add-admin.php">Add Admin</a></li>
                                    <li class="list-group-item"> <a href="logout.php" class="btn btn-success float-right">Logout</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- ----modal----- -->
                </div>
            </div>
        </div>
        </div>
        </div>
    </header>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>

</html>

<script language="javascript" type='text/javascript'>
    $(document).ready(() => {
        $("#adminPopup").click(function() {
            $("#admin-detail").css({
                "visibility": "visible",
                "z-index" : "1"
            });
        });
    });
</script>