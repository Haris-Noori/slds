<?php
    session_start();
    include "../connect.php";

    
    $admin_id = $_POST["admin_id"];
    $admin_pass = $_POST["admin_password"];

    $qry = "SELECT * FROM admin WHERE admin_id = '".$admin_id."' ";

    // ----------------------- check if query working
    if($con->query($qry))
    {
        //echo "Query run success"; 
    }
    else
    {
        echo "Query didn't run";
    }

    //--------------------------------------

    $res = $con->query($qry);    //storing result from query in this variable
    $msg = "";

    if($res->num_rows > 0)
    {   //admin exists
        $row = $res->fetch_assoc();

        if($row["admin_password"] == $admin_pass)
        {   //password is correct
            $_SESSION["admin"] = $admin_id;
            //echo $SESSION["admin"];
            header("Location:admin_dashboard.php");    //give admin the access to dashboard
        }
        else
        {   //password is incorrect
            $msg = "Invalid Password";
            header("Location:admin_login.php?Message=$msg");
        }
    }
    else
    {   //admin does not exist
        $msg = " ".$admin_id." does not exist";
        header("Location:admin_login.php?Message=$msg");
    }
    
?>