<?php include "../connect.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Student Record | Admin</title>

    <link rel="stylesheet" href="../../css/view_std_record.css">
</head>
<body>
<?php include "admin_header.php";
        if(isset($_GET["std_id"]))
        {
            $std_id = $_GET["std_id"];
            $qry_get_profile = " SELECT std_name, std_email, std_ind_year, std_phone, std_program FROM student WHERE std_id='".$std_id."' ";
            $res = $con->query($qry_get_profile);
            $row = $res->fetch_assoc();
        }
?>
    <!-- Admin Dashboard Code Start-->

    <div class="container-fluid">
        <h2 class="mt-4"><u>View Student Record</u></h2>

        <br>
        <h3>Student Record</h3>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">Student ID: <strong><?php echo $std_id ?></strong></div>
                <div class="col-lg-4">Student Name: <strong><?php echo $row["std_name"] ?></strong></div>
            </div>
            <div class="row">
                <div class="col-lg-4">Email: <strong><?php echo $row["std_email"] ?></strong></div>
                <div class="col-lg-4">Induction Year: <strong><?php echo $row["std_ind_year"] ?></strong></div>
            </div>
            <div class="row">
                <div class="col-lg-4">Phone: <strong><?php echo $row["std_phone"] ?></strong></div>
                <div class="col-lg-4">Academic Program: <strong><?php echo $row["std_program"] ?></strong></div>
            </div>
        </div>

        <hr style="border: 2px solid black">
        <h5>Student Activities</h5>
        <table class="table">
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

                $qry = " SELECT cat_name, act_name, act_desc, start_date, end_date FROM category,activity WHERE category.cat_id=activity.cat_id AND std_id = '".$std_id."' ";
                $res = $con->query($qry);
                $result = "";

                if($res->num_rows > 0)
                {
                    while($row = $res->fetch_assoc())
                    {
            ?>
            <tbody>
            <tr>
                <td><?php echo " ".$row["cat_name"]." " ?></td>
                <td><?php echo " ".$row["act_name"]." " ?></td>
                <td><?php echo " ".$row["act_desc"]." " ?></td>
                <td><?php echo " ".$row["start_date"]." " ?></td>
                <td><?php echo " ".$row["end_date"]." " ?></td>
            </tr>

            <?php
                    }
                }
                else{
                    echo "No Results Found!!";
                }
            ?>
            </tbody>
        </table>


        <hr style="border: 2px solid black">
        <h4>Student Images/Certificates/Documents</h4>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">File Name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <?php

                $qry = " SELECT * FROM files WHERE std_id = '".$std_id."' ";
                $res = $con->query($qry);
                $result = "";

                if($res->num_rows > 0)
                {
                    while($row = $res->fetch_assoc())
                    {
            ?>
            <tbody>
            <tr>
                <td><?php echo " ".$row["file_name"]." " ?></td>
                <td><a href="../student/doc/<?php echo $std_id.'/'.$row["file_name"] ?>" target="_blank" class="btn btn-primary">View</a></td>
            </tr>
            <?php
                    }
                }
                else{
                    echo "No Results Found!!";
                }
            ?>
            </tbody>
        </table>

        <!-- Approve/Disapprove Buttons -->
        <div class="row mb-3">
            <div class="container">
                <a href='modify_std_status.php?a_std_id=<?php echo $std_id ?>'><button class="btn btn-success">Approve</button></a>
                <a href='modify_std_status.php?d_std_id=<?php echo $std_id ?>'><button class="btn btn-danger">Disapprove</button></a>
            </div>
        </div>

    </div>
    <!-- Admin Dashboard Code End-->
<?php include "admin_foot.php" ?>