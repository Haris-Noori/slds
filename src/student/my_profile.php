<?php include "../connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Profile | Student</title>
    <link rel="stylesheet" href="../../css/my_profile.css">
</head>

<body>
<?php include "student_head.php";
    $qry_get_profile = " SELECT std_name, std_email, std_ind_year, std_phone, std_program FROM student WHERE std_id='".$_SESSION["student"]."' ";
    $res = $con->query($qry_get_profile);
    $row = $res->fetch_assoc();
?>
    <!-- Student - My Profile Code Start -->
    <div class="container-fluid">
        <h2 class="mt-4"><u>My Profile</u></h2>

        <h4 class="mt-4">Enter Your Details</h4>
        <form class="myform" action="" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Student Name</label>
                    <input name="std_name" type="text" class="form-control border-dark" value="<?php echo $row["std_name"]?>" placeholder="Full Name" id="inputEmail4">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Student Email</label>
                    <input name="std_email" type="email" class="form-control border-dark" value="<?php echo $row["std_email"]?>" placeholder="email@domain.com" id="inputEmail4">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="">Induction year</label>
                    <input name="std_ind_year" type="number" class="form-control border-dark" value="<?php echo $row["std_ind_year"]?>" placeholder="2017, 2020 etc." id="inputEmail4">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Phone Number</label>
                    <input name="std_phone" type="text" class="form-control border-dark" value="<?php echo $row["std_phone"]?>" placeholder="0 123 456 789" id="inputEmail4">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Academic Program</label>
                    <input name="std_program" type="text" class="form-control border-dark" value="<?php echo $row["std_program"]?>" placeholder="BSCS, BBA, BSIT etc." id="inputEmail4">
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
            $std_name = $_POST["std_name"];
            $std_email = $_POST["std_email"];
            $std_ind_year = $_POST["std_ind_year"];
            $std_phone = $_POST["std_phone"];
            $std_program = $_POST["std_program"];

            $qry = " UPDATE student SET std_name='".$std_name."', std_email='".$std_email."', std_ind_year='".$std_ind_year."', std_phone='".$std_phone."', std_program='".$std_program."' 
                    WHERE std_id='".$_SESSION["student"]."' ";

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
