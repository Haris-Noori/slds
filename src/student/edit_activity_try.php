<?php
    include "../connect.php";

    if(isset($_POST["btn_update_activity"]))
    {
        $act_id = $_POST["act_id"];
        $act_name = $_POST["act_name"];
        $act_desc = $_POST["act_desc"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];

        $qry_update_act = " UPDATE activity SET act_name='".$act_name."', act_desc='".$act_desc."', start_date='".$start_date."', end_date='".$end_date."' WHERE act_id='".$act_id."' ";

        if($con->query($qry_update_act))
        {
            header("Location:meta_curricular_form.php");
        }
        else
        {
            //echo "Not Updated";
            header("Location:meta_curricular_form.php");
        }
    }

?>
