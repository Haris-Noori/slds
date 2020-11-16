<?php include "../connect.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Show Student | Admin</title>

    <link rel="stylesheet" href="../../css/admin-dashboard.css">
</head>
<body>
    <?php include "admin_header.php" ?>
        <!-- Admin Dashboard Code Start-->

            <div class="container-fluid">
                <h2 class="mt-4"><u>Show Student</u></h2>
                
                <form class="myform" action="add_student_try.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Student ID</label>
                            <input type="number" class="form-control border-dark" id="inputEmail4" placeholder="Enter ID" name="" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4"></label>
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                    </div>
                    <br>
                </form>

                <div class="container">
                    <h3 class="head3">Student Record</h3>

                    <table class="table mytable">
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
                        $qry = " SELECT * FROM students ";
                        $res = $con->query($qry);
                        $result = "";
                        if($res->num_rows > 0)
                        {
                        echo "Total Students: ".$res->num_rows;
                        while($row = $res->fetch_assoc())
                        {
                        ?>

                        <tbody>
                        <tr>
                            <th scope="row"> <?php echo " ".$row["student_id"]." " ?> </th>
                            <td><?php echo " ".$row["student_name"]." " ?></td>
                        </tr>

                        <?php
                        }
                        }
                        else{echo "No Results Found!!";}

                        //bss yahan tak
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- Admin Dashboard Code End-->
    <?php include "admin_foot.php" ?>