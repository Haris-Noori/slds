<?php include "../connect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modify Booking | Student</title>
    <link rel="stylesheet" href="../../css/my_profile.css">
</head>
<body>
<?php include "student_head.php"; ?>
    <!-- Operator Team Code Start -->
    <div class="container-fluid">
        <h2 class="mt-4">Add New Activity</h2>

        <h5 class="mt-4">Enter Class No. to Book</h5>
        <form class="myform" action="create_booking_try.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="">Activity Name</label>
                    <input name="" type="text" class="form-control" id="inputEmail4" placeholder="" required>
                </div>
            </div>
            <div class="form-row">
                <button type="submit" name="btn_create" class="btn col-md-4 btn-success">Book</button>
            </div>
            <div class="form group-row">
                <?php
                if(isset($_GET["BadMessage"]))
                {
                    echo "<div class='col-sm-10 alert alert-danger'>";
                    echo $_GET["BadMessage"];
                    echo "</div>";
                }
                if(isset($_GET["GoodMessage"]))
                {
                    echo "<div class='col-sm-4 alert alert-success'>";
                    echo $_GET["GoodMessage"];
                    echo "</div>";
                }
                ?>
            </div>
        </form>

        <h4>All Classes Schedule</h4>
        <table class="table mytable">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Class No.</th>
                <th scope="col">Tutor Name</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Class Time</th>
                <th scope="col">End Time</th>
            </tr>
            </thead>
            <?php

            $qry = " SELECT class_id, tutor_name, start_date, end_date, start_time, end_time FROM classes,tutors WHERE classes.tutor_id=tutors.tutor_id ";
            $res = $con->query($qry);
            $result = "";

            if($res->num_rows > 0)
            {
            while($row = $res->fetch_assoc())
            {
            ?>

            <tbody>
            <tr>
                <th scope="row"> <?php echo " ".$row["class_id"]." " ?> </th>
                <td><?php echo " ".$row["tutor_name"]." " ?></td>
                <td><?php echo " ".$row["start_date"]." " ?></td>
                <td><?php echo " ".$row["end_date"]." " ?></td>
                <td><?php echo " ".$row["start_time"]." " ?></td>
                <td><?php echo " ".$row["end_time"]." " ?></td>
            </tr>

            <?php
            }
            }
            else{echo "No Results Found!!";}

            ?>
            </tbody>
        </table>

    </div>
    <!-- Operator Team Code End -->
<?php include "student_foot.php" ?>