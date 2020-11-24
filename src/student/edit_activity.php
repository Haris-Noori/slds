<?php include "../connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Activity | Student</title>
    <link rel="stylesheet" href="../../css/my_profile.css">
</head>
<body>
<?php include "student_head.php";
error_reporting(0);
?>
    <!-- Operator Team Code Start -->
    <div class="container-fluid">
        <h2 class="mt-4"><u>Edit Activity</u></h2>

        <?php
            if(isset($_GET["act_id"]))
            {
                $act_id = $_GET["act_id"];
                $qry_get_act = " SELECT cat_name, act_id, act_name, act_desc, start_date, end_date FROM category,activity WHERE category.cat_id=activity.cat_id AND act_id='".$act_id."' ";
                $res = $con->query($qry_get_act);
                $row = $res->fetch_assoc();
            }
        ?>
        <form action="" method="POST"  enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-4">
                    Category Name: <strong><?php echo $row["cat_name"]; ?></strong>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Activity Name</label>
                    <input name="act_name" value="<?php echo $row["act_name"] ?>" type="text" class="form-control border-dark" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Activity Description</label>
                    <input name="act_desc" value="<?php echo $row["act_desc"] ?>" type="text" class="form-control border-dark" id="inputEmail4" placeholder="" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Start Date</label>
                    <input name="start_date" value="<?php echo $row["start_date"] ?>" type="date" class="form-control border-dark" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">End Date</label>
                    <input name="end_date" value="<?php echo $row["end_date"] ?>" type="date" class="form-control border-dark" id="inputEmail4" placeholder="" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="">Upload (Images/Certificates/Documents)</label>
                    <input type="file" name="doc[]" class="btn btn-primary border-dark col-md-12" multiple r>
                </div>
            </div>
            <input type="number" name="act_id" value="<?php echo $row["act_id"] ?>" hidden>


            <!-- Images/Certificates Table -->
            <!--<hr width="65%" style="border: 2px solid black; margin-left: 0">-->
            <h5>My Images/Certificates/Documents</h5>
            <table class="table col-md-8">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">File Name</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <?php

                    $qry = " SELECT std_id, act_id, file_name FROM files WHERE act_id='".$act_id."' AND std_id = '".$_SESSION["student"]."' ";
                    $res = $con->query($qry);

                    if($res->num_rows > 0)
                    {
                        ?>
                        <tbody>
                        <?php
                        while($row = $res->fetch_assoc())
                        {
                            ?>
                            <tr>
                                <td><?php echo " ".$row["file_name"]." " ?></td>
                                <td><a href="doc/<?php echo $_SESSION["student"].'/'.$row["file_name"] ?>" target="_blank" class="btn btn-primary">View</a></td>
                                <td><a href='del_file.php?file_name=<?php echo $row["file_name"] ?>&act_id=<?php echo $row["act_id"] ?>' class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php
                        }
                ?>
                        </tbody>
                <?php
                    }
                    else
                    {
                        echo "No Files Uploaded!!";
                    }
                ?>
            </table>
            <hr width="65%" style="border: 2px solid black; margin-left: 0">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <a href="meta_curricular_form.php" class="btn col-md-12 btn-primary text-white">Return to Meta-Curricular Form</a>
                </div>
                <div class="form-group col-md-4">
                    <button type="submit" name="btn_update_activity" class="btn col-md-12 btn-success">Update Activity</button>
                </div>
            </div>
        </form>

        <?php
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
                    $files_act_id = $act_id;
                    $file_path = 'doc/'.$_SESSION["student"];
                    if(file_exists($file_path))
                    {
                        //echo "Exists";
                        foreach($_FILES['doc']['name'] as $key=>$val)
                        {
                            if(empty($val))
                            {
                                echo "This Value is empty\n";
                            }
                            else
                            {
                                move_uploaded_file($_FILES['doc']['tmp_name'][$key], $file_path.'/'.$val);
                                $qry_add_filename = " INSERT INTO files(std_id, act_id, file_name) VALUES('".$_SESSION["student"]."', '".$files_act_id."', '".$val."') ";
                                $con->query($qry_add_filename);
                            }
                        }
                    }
                    else
                    {
                        //echo "Not exists";
                        mkdir($file_path);
                        foreach($_FILES['doc']['name'] as $key=>$val)
                        {
                            if(empty($val))
                            {
                                echo "This Value is empty\n";
                            }
                            else
                            {
                                move_uploaded_file($_FILES['doc']['tmp_name'][$key], $file_path.'/'.$val);
                                $qry_add_filename = " INSERT INTO files(std_id, act_id, file_name) VALUES('".$_SESSION["student"]."', '".$files_act_id."', '".$val."') ";
                                $con->query($qry_add_filename);
                            }
                        }
                    }


                    header("Location:meta_curricular_form.php");
//                    header('Location: '.$_SERVER['REQUEST_URI']);
                }
                else
                {
                    echo "Not Updated";
                    //header("Location:meta_curricular_form.php");
                }


            }
        ?>

    </div>
    <!-- Operator Team Code End -->
<?php include "student_foot.php"; ?>