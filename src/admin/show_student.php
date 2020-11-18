<?php include "../connect.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Show Student | Admin</title>

    <link rel="stylesheet" href="../../css/admin-dashboard.css">
</head>
<body>
    <?php include "admin_header.php" ?>
        <!-- Admin Show Student Code Start-->

            <div class="container-fluid">
                <h2 class="mt-4"><u>Show Student</u></h2>
                
                <form class="myform" action="" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Student ID</label>
                            <input type="number" name="std_id" class="form-control border-dark" id="inputEmail4" placeholder="123" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4">.</label>
                            <button type="submit" name="btn-search-std" class="btn form-control btn-success">Search</button>
                        </div>
                    </div>
                    <br>
                </form>

                <div class="container">
                    <h3 class="head3">Student Record</h3>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Academic Program</th>
                                <th scope="col">Induction Year</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                            </tr>
                        </thead>
                        <?php
                            if(isset($_POST["btn-search-std"]))
                            {
                                $std_id = $_POST["std_id"];
                                $qry = " SELECT * FROM student WHERE std_id='".$std_id."' ";
                                $res = $con->query($qry);
                                $result = "";
                                if($res->num_rows > 0)
                                {
                                    while($row = $res->fetch_assoc())
                                    {
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo " ".$row["std_id"]." " ?></td>
                                <td><?php echo " ".$row["std_name"]." " ?></td>
                                <td><?php echo " ".$row["std_program"]." " ?></td>
                                <td><?php echo " ".$row["std_ind_year"]." " ?></td>
                                <td><?php echo " ".$row["std_email"]." " ?></td>
                                <td><?php echo " ".$row["std_phone"]." " ?></td>
                            </tr>
                        <?php
                                    }
                                }
                                else{
                                    echo "No Results Found!!";
                                }
                            }
                        ?>
                        </tbody>
                    </table>

                    <h3 class="head3">Student Activities</h3>
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
                            if(isset($_POST["btn-search-std"]))
                            {
                                $std_id = $_POST["std_id"];
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
                            }
                            else{
                                echo "No Results Found!!";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- Admin Show Student Code End-->
    <?php include "admin_foot.php" ?>