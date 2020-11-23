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
            <div class="form-group">
                <label for=""></label>
                <?php
                    if($res->num_rows == 0)
                    {
                        echo "Not Requested Yet  \n";
                        ?>
                        <div><a href='student_transcript_try.php?ins_std_id=<?php echo $_SESSION["student"] ?>' class="form-row btn btn-primary">Request Transcript</a></div>
                        <?php
                    }
                    if($row["status"] == 'approved')
                    {
                        ?>
                        <div><a href='student_make_pdf.php?std_id=<?php echo $_SESSION["student"] ?>' class="btn btn-success text-white">Download Transcript</a></div>
                        <?php
                    }
                    if($row["status"] == 'disapproved')
                    {
                        ?>
                        <div><a href='student_transcript_try.php?std_id=<?php echo $_SESSION["student"] ?>' class="btn btn-primary">Request Transcript</a></div>
                        <?php
                    }
                    if($row["status"] == 'requested')
                    {
                        echo "Already Requested, wait for approval!";
                    }
                ?>
            </div>
        </form>

    </div>
    <!-- Operator Team Code End -->
<?php include "student_foot.php" ?>