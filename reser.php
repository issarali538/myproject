<?php
include "conn.php";
include "header.php";
?>
<section id="reser-form">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 bg-success p-md-5 py-sm-3">
                                <h2 class="text-white">Registration Form</h2>
                            </div>
                            <div class="col-md-12">
                                <form action="save-form.php" method="POST" enctype="multipart/form-data">
                                    <div class="row my-3">
                                        <div class="col-md-6 mb-1">
                                            <div class="form-group-sm">
                                                <input type="text" required name="roll_no" placeholder="Roll No" id="roll_no" class="form-control">
                                                <small id="stdRollNO" class="font-weight-bold"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <div class="form-group-sm">
                                                <input type="text" required name="name" placeholder="Name" id="name" class="form-control">
                                                <small id="stdname" class="font-weight-bold"></small>
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <div class="form-group-sm">
                                                <input type="text" required name="fname" placeholder="Father Name" id="fname" class="form-control">
                                                <small id="stdfname" class="font-weight-bold"></small>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-1">
                                            <div class="form-group-sm">
                                                <input type="text" required name="cnic" placeholder="xxxxx-xxxxxxx-x" id="cnic" class="form-control">
                                                <small id="stdcnic" class="font-weight-bold"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <div class="form-group-sm">
                                                <input type="text" required name="phone" placeholder="03xxxxxxxxx" id="phone" class="form-control">
                                                <small id="stdphone" class="font-weight-bold"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <div class="form-group-sm">
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
                                                <small id="stdsubj" class="font-weight-bold"></small>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-1">
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
                                                <small id="stddeptt" class="font-weight-bold"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <div class="form-group-sm">
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
                                                <small id="stdseme" class="font-weight-bold"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <div class="form-group-sm">
                                               <input type="text" placeholder="Fsc Marks" name="fscMarks"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-sm">
                                                <select name="reason" required id="reason" class="form-control">
                                                    <option>Reason</option>
                                                    <option value="Distance">Distance</option>
                                                    <option value="Bribary">Bribary</option>
                                                    <option value="Traffic">Traffic</option>
                                                </select>
                                                <small id="stdreason" class="font-weight-bold"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <div class="form-group-sm">
                                                <select name="address" required id="address" class="form-select mb-2" id="address" aria-label="Default select example">
                                                    <option disabled selected>Address</option>
                                                    <?php
                                                    $add_query = "SELECT * FROM address";
                                                    $add_res   = mysqli_query($conn, $add_query);
                                                    while($add_row = mysqli_fetch_assoc($add_res)){
                                                        echo '<option value="'.$add_row["add_id"].'">'.$add_row["location"].'</option>';
                                                    }
                                                    ?>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <div class="m-1" id="others">
                                                    <div class="form-group">
                                                        <input type="text" name="others" placeholder="Others" id="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <div class="form-group-sm">
                                                <label for="">Choose Image(<strong>File Size Must not be greater than 2mb</strong>)</label>
                                                <input type="file" required name="img" placeholder="choose Image" id="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" value="Submit" id="button" class="btn btn-success">
                        </form>
                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(() => {
        $("#others").css("display", "none");
    //    -----option juquery--
    $("#address").change(function(){
        var selectedAdd = $(this).children("option:selected").text();
        if(selectedAdd == "Others"){
            $("#others").css("display", "block");
        
        }
        else{
            $("#others").css("display", "none");
        }
    })
    //    -----option juquery--
        $("#button").click(() => {
            var phone = $("#phone").val();
            var cnic  = $("#cnic").val();
            var cnicMIddle = cnic.slice(cnic.indexOf("-") + 1, cnic.lastIndexOf("-"))
            var cnicLast = cnic.substr(cnic.lastIndexOf("-")+1, 1)

            if (phone == "") {
                $("#stdphone").html("Inter a valid phone");
                return false;
            } 
             if (isNaN(phone)) {
                $("#stdphone").html("Inter a valid phone");
                return false;
            } else if (phone.length !== 11) {
                $("#stdphone").html("Inter a valid phone");
                return false;
            } 
            // cnic validation coding--
            else if (cnic == ""){
                $("#stdcnic").html("Enter Your cnic");
             return false;
            } 
         else if((isNaN(cnicFirst)) || (isNaN(cnicMIddle)) || (isNaN(cnicLast))){
             $("#stdcnic").html("Cnic must be in nubmers");
             return false;
            }
            else if(cnic.charAt(cnic.indexOf("-")) !=="-" || cnic.charAt(cnic.lastIndexOf("-")) !== "-")
            {
                $("#stdcnic").html("Enter a Valid Cnic");
                return false;
            }
            else if(cnicFirst.length !== 5 || cnicMIddle.length !== 7 || cnicLast.length !== 1){
                $("#stdcnic").html("Cnic must in numbers");
                 return false;
            }
            else if(cnic.length() !== 14){
                $("#stdcnic").html("Cnic lenght Must be 14 number including special characters hyphens");
                return false;
            }
            // cnic validation coding--
            else {
                return true;
            }
        });
    });
</script>