<?php
    include "../connect.php";

    if(isset($_GET["ins_std_id"]))
    {
        $std_id = $_GET["ins_std_id"];
        $qry_insert_status = " INSERT INTO transcript(std_id, status) VALUES('".$std_id."' ,'requested') ";
        if($con->query($qry_insert_status))
        {
            header("Location:student_transcript.php");
        }
    }

    if(isset($_GET["std_id"]))
    {
        $std_id = $_GET["std_id"];
        $qry_update_status = " UPDATE transcript SET status='requested' WHERE std_id='".$std_id."' ";
        if($con->query($qry_update_status))
        {
            header("Location:student_transcript.php");
        }
    }
