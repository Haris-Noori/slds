<?php include "../connect.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Student Record | Admin</title>

    <link rel="stylesheet" href="../../css/view_std_record.css">
</head>
<body>
<?php include "admin_header.php" ?>
    <!-- Admin Dashboard Code Start-->

    <div class="container-fluid">
        <h1 class="mt-4">View Student Record</h1>

        <div class="row">
            <div class="container">
                <button class="btn btn-success">Approve</button>
                <button class="btn btn-danger">Disapprove</button>
            </div>
        </div>

        <br>
        <?php
        if(isset($_GET["std_id"]))
        {

        }
        ?>
        <h3>Student Record</h3>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">Student ID: </div>
                <div class="col-lg-4">Student Name: </div>
            </div>
            <div class="row">
                <div class="col-lg-4">Email: </div>
                <div class="col-lg-4">Induction Year: </div>
            </div>
            <div class="row">
                <div class="col-lg-4">Phone: </div>
                <div class="col-lg-4">Academic Program: </div>
            </div>
        </div>

        <br>
        <h5>Activities</h5>
        <table class="table mytable">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Category</th>
                <th scope="col">Activity</th>
                <th scope="col">Description</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
            </tr>
            </thead>
            <?php

            /*$qry = " ";
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
                <td><?php /*echo " ".$row["tutor_id"]." "*/ ?></td>
                <td><?php /*echo " ".$row["tutor_name"]." "*/ ?></td>
                <td><?php /*echo " ".$row["start_date"]." "*/ ?></td>
                <td><?php /*echo " ".$row["end_date"]." "*/ ?></td>
                <td><?php /*echo " ".$row["start_time"]." "*/ ?></td>
                <td><?php /*echo " ".$row["end_time"]." "*/ ?></td>
            </tr>

            <?php
            /*}
            }
            else{echo "No Results Found!!";}*/

            ?>
            </tbody>
        </table>

        <div class="container">
            <h5>Attachments</h5>
        </div>

    </div>
    <!-- Admin Dashboard Code End-->
<?php include "admin_foot.php" ?>