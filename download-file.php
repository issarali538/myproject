<?php 
include "conn.php";

//  file download code 
if(!empty($_GET["file"])){
    $filename = basename($_GET["file"]);
    $filepath = "file/".$filename;
    if(!empty($filename) && file_exists($filepath)){
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=".$filepath);
        header("Content-Type: application/octet-stream");
        header("Cache-Control: must-revalidate");
        header("Pragma: public");
        header("Expires: 0");
        header("Content-Length: ".filesize($filepath));
        readfile($filename);
        exit;
    }
}
else{
    echo "file doesn't exist";
}
?>