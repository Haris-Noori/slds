<?php
    include "../connect.php";
    session_start();

    if(isset($_GET["act_id"]))
    {
        $qry_del_act = " DELETE FROM activity WHERE std_id = '".$_SESSION["student"]."' AND act_id ='".$_GET["act_id"]."' ";

        if($con->query($qry_del_act))
        {
            header("Location:meta_curricular_form.php");
        }
        else
        {
            header("Location:meta_curricular_form.php");
        }
    }