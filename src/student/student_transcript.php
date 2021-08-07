<?php include "../connect.php";
    session_start();
    if(!isset($_SESSION["student"]))
    { //if login in session is not set
        header("Location:../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Transcript | Student</title>
    <link rel="stylesheet" href="../../css/my_profile.css">
</head>
<body>
<?php include "student_head.php";

    $qry_get_status = " SELECT status, message FROM transcript WHERE std_id='".$_SESSION["student"]."' ";
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
                        echo "<p>Your transcript request is <span class='text-success'>approved!</span> 😀</p>";
                        ?>
                        <div><a href='new_pdf.php?std_id=<?php echo $_SESSION["student"] ?>' class="btn btn-success text-white">Download Transcript</a></div>
                        <?php
                    }
                    if($row["status"] == 'disapproved')
                    {
                        echo "<p> Your transcript request was  <span class='text-danger'>disapproved!</span> 😔 </p>";
                        echo "<span class='font-weight-bold'>Admin Message:</span> ".$row["message"];
                        ?>
                        <div><a href='student_transcript_try.php?std_id=<?php echo $_SESSION["student"] ?>' class="btn btn-primary mt-1">Request Transcript</a></div>
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