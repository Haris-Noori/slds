<?php
    include "../connect.php";

    if(isset($_GET["a_std_id"]))
    {
        $std_id = $_GET["a_std_id"];
        $qry_update_status = " UPDATE transcript SET status='approved' WHERE std_id='".$std_id."' ";
        if($con->query($qry_update_status))
        {
            $msg = "Tutor Removed !!";
            header("Location:transcript_requests.php");
        }
    }

    if(isset($_GET["d_std_id"]))
    {
        $std_id = $_GET["d_std_id"];
        $qry_update_status = " UPDATE transcript SET status='disapproved' WHERE std_id='".$std_id."' ";
        if($con->query($qry_update_status))
        {
            $msg = "Tutor Removed !!";
            header("Location:transcript_requests.php");
        }
    }

