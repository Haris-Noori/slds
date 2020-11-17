<?php include "../connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Transcript | Student</title>
    <link rel="stylesheet" href="../../css/my_profile.css">
</head>
<body>
<?php include "student_head.php";

    $qry_get_status = " SELECT status FROM transcript WHERE std_id='".$_SESSION["student"]."' ";
    $res = $con->query($qry_get_status);
    $row = $res->fetch_assoc();

?>
    <!-- Operator Team Code Start -->
    <div class="container-fluid">
        <h2 class="mt-4"><u>My Transcript</u></h2>

        <form action="">
            <div class="form-row">
                <label for=""></label>
                <?php
                    if($row["status"] == 'approved')
                    {
                        ?>
                            <button class="btn btn-success">Download Transcript</button>
                        <?php
                    }
                    if($row["status"] == null || $row["status"] == 'disapproved')
                    {
                        ?>
                        <button class="btn btn-primary">Request Transcript</button>
                        <?php
                    }
                ?>
            </div>
        </form>

    </div>
    <!-- Operator Team Code End -->
<?php include "student_foot.php" ?>