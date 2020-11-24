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

        // Query Get Last Act ID
        $files_act_id = $act_id;
        //echo "Act_ID: ".$files_act_id."\n";

        $file_path = 'doc/'.$_SESSION["student"];
        if(file_exists($file_path))
        {
            //echo "Exists";
            foreach($_FILES['doc']['name'] as $key=>$val)
            {
                move_uploaded_file($_FILES['doc']['tmp_name'][$key], $file_path.'/'.$val);
                $qry_add_filename = " INSERT INTO files(std_id, act_id, file_name) VALUES('".$_SESSION["student"]."', '".$files_act_id."', '".$val."') ";
                $con->query($qry_add_filename);
            }
        }
        else {
            //echo "Not exists";
            mkdir($file_path);
            foreach($_FILES['doc']['name'] as $key=>$val)
            {
                // Moving into folder
                move_uploaded_file($_FILES['doc']['tmp_name'][$key], $file_path.'/'.$val);

                // saving file name into database
                $qry_add_filename = " INSERT INTO files(std_id, act_id, file_name) VALUES('".$_SESSION["student"]."', '".$files_act_id."', '".$val."') ";
                $con->query($qry_add_filename);
            }
        }

    }


