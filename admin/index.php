<?php
error_reporting(0);
  include "conn.php";
  session_start();
  if($_SESSION["surename"] && $_SESSION["password"])
    {
        header("location: http://localhost/myproject/admin/app.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>

<body>
    <section id="login" class="my-5 py-5">
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-5 text-center">
                    <h3 class="text-primary my-3">Admin Login</h3>
                    <form action="" method="POST">
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Full Name</span>
                    <input type="text" name="surename" class="form-control" required aria-label="Username" aria-describedby="basic-addon1">

                </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control" required aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-unlock"></i></span>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" name="login" value="Login" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<?php
    if(isset($_POST["login"])){
        $common = $_POST;
        $surename = $common["surename"];
        $password = $common["password"];
        $sql = "select surename, password, img from h_admin where surename = '{$surename}' and password = '{$password}'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION["surename"] = $surename;
                $_SESSION["password"] = $password;
                $_SESSION["img"] = $row['img'];
                if($_SESSION["surename"] === $surename && $_SESSION["password"] === $password){
                    header("location: http://localhost/myproject/admin/app.php");
                }
                else{
                    echo "Please Enter a VALID  name and PASSWORD";
                }
            }
        }
    }
?>