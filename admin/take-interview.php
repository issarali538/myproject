<?php
error_reporting(0);
use function PHPSTORM_META\map;

include "conn.php";
include "header.php";
?>
<div class="container-fluid">
    <div class="row">
        <!-- entery panel  -->
        <div class="col-6">
            <h4 class="p-2 rounded border bg-light">Entery Panel</h4>
            <form action="" method="GET" class="p-2 border rounded">
                <div class="form-group">
                    <input type="text" name="search" placeholder="Roll No" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <select name="subj" id="subj" required class="form-select mb-2">
                        <option selected disabled>Select Subject--</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Physics">Physics</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Urdu">Urdu</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Botony">Botony</option>
                        <option value="Zology">Zology</option>
                        <option value="Politics">Politics</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="deptt" required id="deptt" class="form-select mb-2" aria-label="Default select example">
                        <option disabled selected>Select Deptt</option>
                        <option value="Computer">Computer</option>
                        <option value="Physics">Physics</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Urdu">Urdu</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Botony">Botony</option>
                        <option value="Zology">Zology</option>
                        <option value="Politics">Politics</option>
                    </select>
                </div>
                <select name="seme" required id="seme" class="form-select mb-2" aria-label="Default select example">
                    <option>Select Semester--</option>
                    <option value="Seme-1">Seme-1</option>
                    <option value="Seme-2">Seme-2</option>
                    <option value="Seme-3">Seme-3</option>
                    <option value="Seme-4">Seme-4</option>
                    <option value="Seme-5">Seme-5</option>
                    <option value="Seme-6">Seme-6</option>
                    <option value="Seme-7">Seme-7</option>
                    <option value="Seme-8">Seme-8</option>
                </select>
                <div class="form-group mt-1">
                    <input type="submit" name="fetch" class="btn btn-success btn-block" value="Check">
                </div>
                <!-- search data  -->
                <?php
                if (isset($_GET["fetch"])) {
                    $search = $_GET["search"];
                    $subj = $_GET["subj"];
                    $seme = $_GET["seme"];
                    $deptt = $_GET["deptt"];
                }
                ?>
                <!-- search data  -->
            </form>
        </div>
        <?php if(isset($search) && isset($seme) && isset($subj) && isset($deptt)){ ?>
        <div class="col-6">
            <!-- information panl  -->
            <div>
                <?php
                $std_info = "select std.roll_no,std.img, std.address, std.name, std.subject, std.deptt, std.seme from std where roll_no = {$search} and seme = '{$seme}' and subject = '{$subj}' and deptt = '{$deptt}'";
                $std_info_res = mysqli_query($conn, $std_info);
                if (mysqli_num_rows($std_info_res)) {
                    while ($std_info_row = mysqli_fetch_assoc($std_info_res)) {
                        $old_add =  $std_info_row["address"];
                ?>
                        <img src="../<?php echo $std_info_row['img']; ?>" width="100px" height="100px" alt="" class="img-fluid">
            </div>
            <div class="p-3 border rounded bg-success text-light">
                <!-- searching  -->
        <?php
                        
                        echo  "<div><strong>Name: </strong><i>" . $std_info_row['name'] . "</i></div>";
                        echo  "<div><strong>Department: </strong><i>" . $std_info_row['deptt'] . "</i></div>";
                        echo  "<div><strong>Semester: </strong><i>" . $std_info_row['seme'] . "</i></div>";
                        echo  "<div><strong>Subject: </strong><i>" . $std_info_row['subject'] . "</i></div>";
                    }
                } else {
                    echo "<h3>Sorry! No record found</h3>";
                }
        ?>
        <!-- searching -->
            </div>
            <!-- information panel  -->
        </div>
        <?php } ?>
        <div class="col-8 mx-auto p-3 border my-2 rounded">
            <!-- admin marking panel  -->
            <form action="" method="POST">
                <strong> Adman Marks </strong>
                <div class="form-check form-check-inline">
                    <input type="radio" value="20" name="adman_marks" id="adman" class="form-check-label">
                    <label for="adman" class="form-check-label">20</label>
                    <input type="radio" value="15" name="adman_marks" id="adman" class="form-check-label">
                    <label for="adman" class="form-check-label">15</label>
                    <input type="radio" value="10" name="adman_marks" id="adman" class="form-check-label">
                    <label for="adman" class="form-check-label">10</label>
                </div>
                <div class="form-group">
                    <select name="wrong_add" required id="deptt" class="form-select mb-2" aria-label="Default select example">
                        <option disabled selected>Select Deptt</option>
                        <?php
                        $fetch_add = "select * from address";
                        $f_add_res = mysqli_query($conn, $fetch_add) or die("query is failed on Line#: " . __LINE__);
                        while ($f_add_row = mysqli_fetch_assoc($f_add_res)) {
                            echo '<option value="' . $f_add_row["add_id"] . '">' . $f_add_row["location"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mt-2">
                    <input type="submit" name="adman_" value="Save" class="btn btn-success btn-sm">
                </div>
                <?php 
                    if(isset($_POST["adman_"])){
                        if(isset($_POST["adman_marks"])){
                            $adman_marks = $_POST["adman_marks"];
                        }
                        if(isset($_POST["wrong_add"])){
                            $wrong_add = $_POST["wrong_add"];
                            $sql = "update std set address = {$wrong_add} where roll_no = {$search} and subject = '{$subj}' and seme = '{$seme}' and deptt = '{$deptt}'";
                            $res = mysqli_query($conn , $sql) or die("query is failed on Line# :".__LINE__);
                        }
                        else{
                                $wrong_add = $old_add;
                        }
                        $sql3 = "INSERT INTO interview(roll_no, subject, seme, deptt,address, adman_marks) 
                        value({$search}, '{$subj}', '{$seme}', '{$deptt}',{$wrong_add},  {$adman_marks})";
                        $res3 = mysqli_query($conn, $sql3) or die("query is failed on Line#".__LINE__);
                        if($res3){
                        // eligibility code 
                           $sql4 = "SELECT * from std JOIN address on address.add_id = std.address JOIN interview on interview.roll_no = std.roll_no AND interview.subject = std.subject and interview.seme = std.seme WHERE interview.roll_no = {$search} and interview.subject = '{$subj}' and interview.deptt = '{$deptt}' and interview.seme = '{$seme}'";
                           $res4 = mysqli_query($conn, $sql4);
                           while($row4 = mysqli_fetch_assoc($res4)){
                              $fsc_marks = $row4["fsc_marks"];
                              $kms = $row4["kms"];
                              $adman_marks = $row4["adman_marks"];
                            //   FOR FSC MARKS 
                                if($fsc_marks >= 900){
                                    $fsc_flag = 50;
                                }
                                elseif($fsc_marks >=800 && $fsc_marks < 900){
                                    $fsc_flag = 40;
                                }
                                elseif($fsc_marks >=700 && $fsc_marks < 800){
                                    $fsc_flag = 30;
                                }
                                elseif($fsc_marks >=600 && $fsc_marks < 700){
                                    $fsc_flag = 20;
                                }
                                else{
                                    $fsc_flag = 10;
                                }
                            //   FOR FSC MARKS 
                            // FOR ADDRESS KMS
                            if ($kms >= 60) {
                                $kms_flag = 30;
                            } elseif ($kms >= 50 && $kms < 60) {
                                $kms_flag = 25;
                            } elseif ($kms >= 40 && $kms < 50) {
                                $fsc_flag = 20;
                            } elseif ($kms >= 30 && $kms < 40) {
                                $kms_flag = 15;
                            } else {
                                $kms_flag = 10;
                            }                           
                            // FOR ADDRESS KMS 
                            $total = $fsc_flag + $kms_flag + $adman_marks;
                            // FOR TOTAL ELIGIBILITY 
                            $sql5 = "SELECT * from merit";
                            $res5 = mysqli_query($conn, $sql5);
                            if(mysqli_num_rows($res5) > 0){
                                $merit_list_rec = mysqli_num_rows($res5);
                            }
                            if($total >= 90){
                                if($merit_list_rec == 3){
                                    die();
                                }
                            }
                            elseif($total >= 80 && $total < 90){
                                if($merit_list_rec == 3){
                                    die();
                                }
                            }
                            elseif($total >= 70 && $total < 80){
                                if($merit_list_rec == 3){
                                    die();
                                }
                            }
                            elseif($total >= 60 && $total < 70){
                                if($merit_list_rec == 3){
                                    die();
                                }
                            }
                            elseif($total >= 50 && $total < 60){
                                if($merit_list_rec == 3){
                                    die();
                                }
                            }
                            elseif($total == 40 && $total < 50){
                                if($merit_list_rec == 3){
                                    die();
                                }
                            }
                            else{
                                die();
                            }
                            $sql6 = "INSERT INTO merit(roll_no, subject, seme, deptt) VALUE({$search}, '{$subj}', '{$seme}', '{$deptt}')";
                            $res6 = mysqli_query($conn, $sql6) or die("Query is failed on line# ". __LINE__);
                            // FOR TOTAL ELIGIBILITY 
                           } 
                           
                        // eligibility code 
                        }
                    }
                ?>
            </form>
            <!-- admin marking panel  -->
        </div>
    </div>
</div>