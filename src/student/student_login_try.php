<?php
    session_start();
    include "../connect.php";

    
    $std_id = $_POST["std_id"];
    $std_pass = $_POST["std_password"];

    $qry = "SELECT * FROM student WHERE std_id = '".$std_id."' ";

    // ----------------------- check if query working
    if($con->query($qry))
    {
        //echo "Query run success"; 
    }
    else
    {
        echo "Query didn't run";
    }
    //---------------------------------------

    $res = $con->query($qry);    //storing result from query in this variable
    $msg = "";

    if($res->num_rows > 0)
    {   //admin exists
        $row = $res->fetch_assoc();

        if($row["std_password"] == $std_pass)
        {   //password is correct
            $_SESSION["student"] = $std_id;
            $_SESSION["student_name"] = $row["std_name"];
            //echo $SESSION["user"];
            header("Location:student_dashboard.php");    //give student the access to dashboard
        }
        else
        {   //password is incorrect
            $msg = "Invalid Password";
            header("Location:student_login.php?Message=$msg");
        }
    }
    else
    {   //admin does not exist
        $msg = " ".$std_id." does not exist";
        header("Location:student_login.php?Message=$msg");
    }
    
?>