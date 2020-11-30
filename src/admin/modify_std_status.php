<?php
    include "../connect.php";

    if(isset($_POST["btn-approve"]))
    {
        $std_id = $_POST["std_id"];
        $qry_update_status = " UPDATE transcript SET status='approved' WHERE std_id='".$std_id."' ";
        if($con->query($qry_update_status))
        {
            $msg = "Approved!";
            header("Location:transcript_requests.php");
        }
    }

    if(isset($_POST["btn-disapprove"]))
    {
        $std_id = $_POST["std_id"];
        $message = $_POST["message"];

        $qry_update_status = " UPDATE transcript SET status='disapproved', message='".$message."' WHERE std_id='".$std_id."' ";
        if($con->query($qry_update_status))
        {
            $msg = " Disapproved!";
            header("Location:transcript_requests.php");
        }
    }

