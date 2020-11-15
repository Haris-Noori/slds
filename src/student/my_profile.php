<?php include "../connect.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Profile | Operator</title>
    <link rel="stylesheet" href="../../css/my_profile.css">
</head>

<body>
<?php include "student_head.php"; ?>
    <!-- Operator Team Code Start -->
    <div class="container-fluid">
        <h2 class="mt-4">My Profile</h2>

        <h4 class="mt-4">Enter Your Details</h4>
        <form class="myform" action="" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Student Name</label>
                    <input name="std_name" type="text" class="form-control" id="inputEmail4" placeholder="Full Name">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Student Email</label>
                    <input name="std_email" type="email" class="form-control" id="inputEmail4" placeholder="student@email.com">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="">Induction year</label>
                    <input name="std_ind_year" type="number" class="form-control" id="inputEmail4" placeholder="2020 etc.">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Phone Number</label>
                    <input name="std_phone" type="text" class="form-control" id="inputEmail4" placeholder="123 456 789">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Academic Program</label>
                    <input name="std_program" type="text" class="form-control" id="inputEmail4" placeholder="BSCS, BBA, BSIT etc.">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <button type="submit" name="btn_id" class="btn btn-success btn-block">Update Profile</button>
                </div>
            </div>
        </form>

        <?php
        if(isset($_POST["btn_id"]))
        {
            // All variables in the form
            //$std_name = $_POST["std_name"];

            $qry = " UPDATE students SET student_pass='".$in_pass."' WHERE student_name='".$_SESSION["student"]."' ";

            if($con->query($qry))
            {
                // echo "Password changed";
                $msg = "hello";
                echo "<div class='col-sm-4 alert alert-success'>";
                echo "Profile Updated successfully";
                echo "</div>";
            }
        }
        ?>

    </div>
    <!-- Operator Team Code End -->
<?php include "student_foot.php" ?><?php
