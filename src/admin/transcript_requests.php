<?php include "../connect.php";
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
                                    $qry = " SELECT * FROM transcript WHERE status <> 'approved' AND status <> 'disapproved' ";
                                    $res = $con->query($qry);
                                    $result = "";
                                    if($res->num_rows > 0)
                                    {
                                        while($row = $res->fetch_assoc())
                                        {
                                ?>
                                <tbody>
                                <tr>
                                    <th scope="row"> <?php echo " ".$row["std_id"]." " ?> </th>
                                    <td><a href="view_std_record.php?std_id=<?php echo $row["std_id"] ?>" class="btn btn-primary">View Student Record</a></td>
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
                            <!-- BOX END -->
                        </div>
                    </div>

                </div>
            </div>
        <!-- Admin Dashboard Code End-->
    <?php include "admin_foot.php" ?>