<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "slds_db";

    $con = new MySQLi($server, $user, $pass, $dbname);

    if($con->connect_error)
    {
        echo "Not Connected!!";
        echo "Error: ".$con->connect_error;
    }
    else
    {
        // echo "<script> alert('Successfully connected to database')</script>";

        $qry = "SELECT *  FROM files";
        if($con->query($qry))
        {
            $res = $con->query($qry);
            $result = "";

            if($res->num_rows > 0)
            {
                while($row = $res->fetch_assoc())
                {
                    echo base64_decode($row['file']);
                }
            }
            else
            {
                echo "No files founded";
            }
        }
    }