<?php 
    include "conn.php";
    $surename = $_POST["surename"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $c_password = $_POST["c_password"];
    $admin_img = $_FILES["admin_img"]["name"];
    $tmp_name = $_FILES["admin_img"]["tmp_name"];
    $file_size = $_FILES["admin_img"]["size"];

    $error = [];
        $explode = explode(".", $admin_img);
        $file_ext = end($explode);
        $ext = ["jpeg", "jpg", "png"];
        if($file_size > 2097152){
            $error = "File Size must not be geater then 2mb";
        }
        else{
            if(in_array($file_ext, $ext)){
                $folder = "admins/" . time() . "-" . $admin_img;
                move_uploaded_file($tmp_name, $folder);
            }
            else{
                $error = "Please Only choose jpeg, png or jpeg file";
            }
        }
        if($password != $c_password){
            $error = "Please Conform the password";
        }
        else {
            goto insert_query;
        }
        if(!empty($error) == true){
            print_r($error);
            die();
        }

        insert_query:
        $sql = "insert into h_admin (surename, phone, address, password, img) values
          ('{$surename}', '{$phone}', '{$address}', '{$password}', '{$folder}')";

        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if($result){

             header("location: http://localhost/myproject/admin/admin.php");
            
        }
?>