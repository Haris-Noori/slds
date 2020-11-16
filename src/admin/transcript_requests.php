<?php include "../connect.php";
    $res_student_name = "";
    $res_student_pass = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transcript Requests | Admin</title>

    <link rel="stylesheet" href="../../css/transcript_requests.css">
</head>
<body>
    <?php include "admin_header.php" ?>
        <!-- Admin Dashboard Code Start-->

            <div class="container-fluid">
                <h2 class="mt-4"><u>Transcript Requests</u></h2>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- BOX2 START -->
                            <table class="table mytable">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <?php
                                $qry = " ";
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
                            <!-- BOX END -->
                        </div>
                    </div>

                </div>
            </div>
        <!-- Admin Dashboard Code End-->
    <?php include "admin_foot.php" ?>