<?php include "conn.php";
include "header.php";
?>

<head>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<style>
    #raseed {
        position: relative;
    }

    #raseed::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        background-color: rgba(147, 172, 196, .1);
        width: 100%;
        height: 100%;
    }

    #raseed h6 {
        text-decoration: underline;
    }
</style>

<div class="container">
    <div class="row">
        <div>
            <button class="btn btn-success my-1" id="btn-raseed" onclick="downLoad()">Downalod Bank Raseed</button>
        </div>
    </div>
    <?php
    $sql =    $sql = "select name, fname,seme from std where roll_no = {$_GET['roll_no']} and seme = '{$_GET["seme"]}' and subject = '{$_GET["subj"]}' and deptt = '{$_GET["deptt"]}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <div class="row" id="raseed">
                <div class="col-4 border">
                    <div class="p-2 bg-dark text-white">
                        <strong>Student Record</strong>
                    </div>
                    <div class="bg-light p-3">
                        <h5 class="text-success">Govt Post Graduate College Lakki Marwat(Kaber Hostel)</h5>
                    </div>
                    <div>
                        <h6>The Bank of Khyber</h6>
                    </div>
                    <div class="my-3"> Name: <b><?php echo $row["name"]; ?></b><br>
                        Father Name: <b><?php echo $row["fname"]; ?></b></div>

                    <div class=""> Class: <b>Bs</b><br>
                        Seme: <b><?php echo $row["seme"]; ?></b></div>
                    <div>
                        <img src="./images/bankImg.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="mt-1">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Rupees</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM fee";
                                $res = mysqli_query($conn, $sql) or die('query is failed on line#' . __LINE__);
                                if (mysqli_num_rows($res) > 0) {
                                    while ($row1 = mysqli_fetch_assoc($res)) {
                                        $id = $row1["id"];
                                        $h_fee = $row1["h_fee"];
                                        $h_water = $row1["h_water"];
                                        $h_security = $row1["h_security"];
                                        $total = $h_fee + $h_water + $h_security;
                                    }
                                }
                                ?>
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td>Hotel Fee</td>
                                            <td><?php echo $h_fee; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $id + 1; ?></td>
                                            <td>Hotel Fee</td>
                                            <td><?php echo $h_fee; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $id + 2; ?></td>
                                            <td>Water Bill</td>
                                            <td><?php echo $h_security; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td col-span=2><?php echo $total; ?></td>
                                        </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <p> Dated: ___________
                            </p>
                            <p> Signature: ___________
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-4 border">
                    <div class="p-2 bg-dark text-white">
                        <strong>Bank Record</strong>
                    </div>
                    <div class="bg-light p-3">
                        <h5 class="text-success">Govt Post Graduate College Lakki Marwat(Kaber Hostel)</h5>
                    </div>
                    <div>
                        <h6>The Bank of Khyber</h6>
                    </div>
                    <div class="my-3"> Name: <b><?php echo $row["name"]; ?></b><br>
                        Father Name: <b><?php echo $row["fname"]; ?></b></div>

                    <div class=""> Class: <b>Bs</b><br>
                        Seme: <b><?php echo $row["seme"]; ?></b></div>
                    <div>
                        <img src="./images/bankImg.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="mt-1">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">s.no</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Rupees</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td>Hotel Fee</td>
                                    <td><?php echo $h_fee; ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $id + 1; ?></td>
                                    <td>Hotel Fee</td>
                                    <td><?php echo $h_fee; ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $id + 2; ?></td>
                                    <td>Water Bill</td>
                                    <td><?php echo $h_security; ?></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td col-span=2><?php echo $total; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <p> Dated: ___________
                            </p>
                            <p> Signature: ___________
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-4 border">
                    <div class="p-2 bg-dark text-white">
                        <strong>Office Record</strong>
                    </div>
                    <div class="bg-light p-3">
                        <h5 class="text-success">Govt Post Graduate College Lakki Marwat(Kaber Hostel)</h5>
                    </div>
                    <div>
                        <h6>The Bank of Khyber</h6>
                    </div>
                    <div class="my-3"> Name: <b><?php echo $row["name"]; ?></b><br>
                        Father Name: <b><?php echo $row["fname"]; ?></b></div>

                    <div class=""> Class: <b>Bs</b><br>
                        Seme: <b><?php echo $row["seme"]; ?></b></div>
                    <div>
                        <img src="./images/bankImg.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="mt-1">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">s.no</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Rupees</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td>Hotel Fee</td>
                                    <td><?php echo $h_fee; ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $id + 1; ?></td>
                                    <td>Hotel Fee</td>
                                    <td><?php echo $h_fee; ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $id + 2; ?></td>
                                    <td>Water Bill</td>
                                    <td><?php echo $h_security; ?></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><?php echo $total; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <p> Dated: ___________
                            </p>
                            <p> Signature: ___________
                            </p>

                        </div>
                    </div>
                </div>
        <?php
        }
    }
        ?>
            </div>
</div>
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script>
    function downLoad() {
        const raseed = document.getElementById("raseed");
        html2pdf().from(raseed).save();
    }
</script>