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
        <h2 class="mt-4">Enter New Password</h2>

        <h5 class="mt-4">You can change your password here</h5>
        <form class="myform" action="" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">

                    <input name="input_pass" type="password" class="form-control" id="inputEmail4" placeholder="***">

                </div>
                <div class="form-group col-md-4">
                    <button type="submit" name="btn_id" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>

        <?php
        if(isset($_POST["btn_id"]))
        {
            $in_pass = $_POST["input_pass"];

            $qry = " UPDATE students SET student_pass='".$in_pass."' WHERE student_name='".$_SESSION["student"]."' ";

            if($con->query($qry))
            {
                // echo "Password changed";
                $msg = "hello";
                echo "<div class='col-sm-4 alert alert-success'>";
                echo "Password changed successfully";
                echo "</div>";
            }
        }
        ?>
        
    </div>
    <!-- Operator Team Code End -->
    <?php include "student_foot.php" ?>