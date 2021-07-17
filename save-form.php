<?php
echo '<link rel="stylesheet" href="bootstrap.min.css">';
include "conn.php";

if (isset($_POST["submit"])) {
    $roll_no = trim($_POST["roll_no"]);
    $name    = trim($_POST["name"]);
    $fname   = trim($_POST["fname"]);
    $cnic    = trim($_POST["cnic"]);
    $phone   = trim($_POST["phone"]);
    $subj    = trim($_POST["subj"]);
    $deptt   = trim($_POST["deptt"]);
    $seme    = trim($_POST["seme"]);
    $fsc_marks = trim($_POST["fscMarks"]);
    $reason  = trim($_POST["reason"]);
    $address = trim($_POST["address"]);
    $img     = $_FILES["img"]["name"];
    $tmp_name  = ($_FILES["img"]["tmp_name"]);
    $file_size = $_FILES["img"]["size"];
    // code for fomr validation 
    if($address == "Others"){
        $address = $_POST["others"];
    }
    // code for fomr validation 
    $cnic_pattern = "/[0-9]{5}[-][0-9]{7}[-][0-9]{1}/";
    $error = [];
    $explode = explode(".", $img);
    $file_ext = end($explode);
    $ext = ["jpeg", "jpg", "png"];
    if ($file_size > 2097152) {
        $error = "File Size must not be geater then 2mb";
    } else {
        $folder = "images/".time()."-";
        $target = $img;
        $new_img = $folder.$target;
        if (in_array($file_ext, $ext)) {
            move_uploaded_file($tmp_name, $new_img);
        } else {
            $error = "Please Only choose jpeg, png or jpeg file";
        }
    }
    if (preg_match_all($cnic_pattern, $cnic)) {
        $valid_cnic = $cnic;
    } else {
        $error = "Plese inter a valid cnic in the form";
    }
    if (!empty($error) == true) {
        print_r($error);
        die();
    }
    $sql = "insert into std (roll_no, name, fname, cnic, phone, subject, deptt, seme,fsc_marks, reason, img, address) values
          ({$roll_no}, '{$name}', '{$fname}', '{$valid_cnic}', '{$phone}', '{$subj}', '{$deptt}', '{$seme}',{$fsc_marks}, '{$reason}', '{$new_img}', '{$address}')";

        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($result) {
            echo '<script type="text/JavaScript">
                alert("'.$name.'! Your date is recorded");
            </script>';
            header("location: http://localhost/myproject/reser.php");
            
        }
    }
?>
