<?php

    $server = "localhost";
    $user = "id16552365_root";
    $pass = "6-dXA)oJ>g}efP3h";
    $dbname = "id16552365_slds_db";

    $con = new MySQLi($server, $user, $pass, $dbname);

    if($con->connect_error)
    {
        echo "<script>alert('not connected')</script>";
        echo "Error: ".$con->connect_error;
    }
    else
    {
        // echo "<script> alert('Successfully connected to database')</script>";
    }
