<?php
$page_name = basename($_SERVER["PHP_SELF"]);
switch ($page_name) {
    case "notification.php":
        $url_page = "Notification";
        break;
    case "index.php":
        $url_page = "Home";
        break;
    case "reser.php":
        $url_page = "Reservation";
        break;
    case "read-more.php":
        $url_page = "Read More";
        break;
    case "about.php":
        $url_page = "About us";
        break;
    case "cont.php":
        $url_page = "Contact";
        break;
    case "band-raseed.php":
        $url_page = "Hostel Bank Raseed";
        break;
    default:
        $url_page = "Welcome to Hostel";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $url_page; ?></title>
    <!-- bootstrap file ---------- -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <!--  whole front page css  -->
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./help.css">
    <link rel="stylesheet" href="./about.css">
</head>
<body>
    <header id="header" style="position: sticky; top:0px; left:0px; z-index:1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center py-md-4 display-4">Welcome To Kabir Hostel</h1>
                </div>
                <div class="col-12">
                    <ul class="nav justify-content-center">
                        <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="reser.php" class="nav-link">Reservation</a></li>
                        <li class="nav-item"><a href="help.php" class="nav-link">Help?</a></li>
                        <li class="nav-item"><a href="notification.php" class="nav-link">Notification*</a></li>
                        <li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>
                        <li class="nav-item"><a href="cont.php" class="nav-link">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</html>