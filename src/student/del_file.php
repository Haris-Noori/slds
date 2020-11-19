<?php
    include "../connect.php";
    session_start();

    if(isset($_GET["file_name"]))
    {
        $file_name = $_GET["file_name"];

        // Deleting File From File System
        $path = $_SERVER['DOCUMENT_ROOT'].'/SLDS/src/student/doc/'.$_SESSION["student"].'/'.$file_name;
        unlink($path);

        // Deleting File Name From Database
        $qry_del_file = " DELETE FROM files WHERE std_id='".$_SESSION["student"]."' AND file_name ='".$file_name."' ";

        if($con->query($qry_del_file))
        {
            header("Location:meta_curricular_form.php");
        }
        else
        {
            header("Location:meta_curricular_form.php");
        }

    }