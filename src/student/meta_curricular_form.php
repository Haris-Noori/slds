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
        <h2 class="mt-4">Meta-Curricular Form</h2>

        <h4 class="mt-4">Add your Activity</h4>
        <form class="myform" action="" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="container">
                    <label class="">Choose Category</label>
                    <select class="form-control col-md-4" name="" id="">
                        <option value=""> -- </option>
                        <option value="">Student Leadership</option>
                        <option value="">Global Engagement</option>
                        <option value="">Sports & Recreation</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Activity Name</label>
                    <input name="" type="text" class="form-control" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Activity Description</label>
                    <input name="" type="text" class="form-control" id="inputEmail4" placeholder="" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Start Date</label>
                    <input name="" type="date" class="form-control" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">End Date</label>
                    <input name="" type="date" class="form-control" id="inputEmail4" placeholder="" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="">Upload (Images/Certificates/Documents)</label>
                    <input type="file" name="doc[]" class="btn btn-primary col-md-12" multiple>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <button type="submit" name="btn_add_activity" class="btn col-md-12 btn-success">Add Record</button>
                </div>
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

        <?php
            if(isset($_POST["btn_add_activity"]))
            {
                foreach($_FILES['doc']['name'] as $key=>$val)
                {
                    mkdir($_SESSION["student"]);
                    move_uploaded_file($_FILES['doc']['tmp_name'][$key], $_SESSION["student"].'/'.$val);
                }
            }
        ?>

        <hr style="border: 2px solid black">
        <h4>My Activities</h4>
        <table class="table mytable">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Category Name</th>
                <th scope="col">Activity Name</th>
                <th scope="col">Activity Description</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
            </tr>
            </thead>
            <?php

            /*$qry = " SELECT class_id, tutor_name, start_date, end_date, start_time, end_time FROM classes,tutors WHERE classes.tutor_id=tutors.tutor_id ";
            $res = $con->query($qry);
            $result = "";

            if($res->num_rows > 0)
            {
            while($row = $res->fetch_assoc())
            {*/
            ?>

            <tbody>
            <tr>
                <th scope="row"> <?php /*echo " ".$row["class_id"]." "*/ ?> </th>
                <td><?php /*echo " ".$row["tutor_name"]." "*/ ?></td>
                <td><?php /*echo " ".$row["start_date"]." "*/ ?></td>
                <td><?php /*echo " ".$row["end_date"]." "*/ ?></td>
                <td><?php /*echo " ".$row["start_time"]." "*/ ?></td>
                <td><?php /*echo " ".$row["end_time"]." "*/ ?></td>
            </tr>

            <?php/*
            }
            }
            else{echo "No Results Found!!";}*/

            ?>
            </tbody>
        </table>

    </div>
    <!-- Operator Team Code End -->
<?php include "student_foot.php" ?>