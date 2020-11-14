<?php include "../connect.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Class | Admin</title>

    <link rel="stylesheet" href="../../css/add_class.css">
</head>
<body>
<?php include "admin_header.php" ?>
    <!-- Admin Dashboard Code Start-->

    <div class="container-fluid">
        <h1 class="mt-4">Add New Class</h1>

            <form class="myform" action="" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputEmail4">Tutor ID</label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="ID" name="tutor_id" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">First Class</label>
                        <input type="date" class="form-control" id="inputPassword4" name="start_date"  required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">Last Class</label>
                        <input type="date" class="form-control" id="inputPassword4"  name="end_date"  required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">From (Start Time)</label>
                        <input type="time" class="form-control" id="inputPassword4" name="start_time"  required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">To (End Time)</label>
                        <input type="time" class="form-control" id="inputPassword4" name="end_time"  required>
                    </div>
                </div>
                <button name="btn_add_class" type="submit" class="btn btn-success btn-lg">Add</button>
                <br>
                <br>
                <div class="form group-row">
                    <?php
                    if(isset($_GET["BadMessage"]))
                    {
                        echo "<div class='col-sm-4 alert alert-danger'>";
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
            if(isset($_POST["btn_add_class"]))
            {
                $tutor_id = $_POST["tutor_id"];
                $start_date = $_POST["start_date"];
                $end_date = $_POST["end_date"];
                $start_time = $_POST["start_time"];
                $end_time = $_POST["end_time"];

                $qry_add_class = " INSERT INTO classes(tutor_id, start_date, end_date, start_time, end_time)
                                    VALUES ('".$tutor_id."', '".$start_date."', '".$end_date."', '".$start_time."', '".$end_time."') ";

                if($con->query($qry_add_class))
                {
                    echo "New Class Added";
                }
                else{
                    echo "Class cloud not Added";
                }
            }
        ?>

        <h4>Classes Scheduled</h4>
        <table class="table mytable">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Class No.</th>
                <th scope="col">Tutor ID</th>
                <th scope="col">Tutor Name</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Class Time</th>
                <th scope="col">End Time</th>
            </tr>
            </thead>
            <?php

            $qry = " SELECT class_id, classes.tutor_id, tutor_name, start_date, end_date, start_time, end_time FROM classes,tutors WHERE classes.tutor_id=tutors.tutor_id ";
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
                <td><?php echo " ".$row["tutor_id"]." " ?></td>
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
    <!-- Admin Dashboard Code End-->
<?php include "admin_foot.php" ?>