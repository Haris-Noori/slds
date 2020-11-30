<?php include "../connect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Meta Curricular Form | Student</title>
    <link rel="stylesheet" href="../../css/my_profile.css">
</head>
<body>
<?php include "student_head.php"; ?>
    <!-- Operator Team Code Start -->
    <div class="container-fluid">
        <h2 class="mt-4"><u>Meta-Curricular Form</u></h2>

        <h4 class="mt-4">Add your Activity</h4>
        <form class="myform" action="" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-md-12">
                    <label class="">Choose Category</label>
                    <select name="cat_id" class="form-control border-dark col-md-4" id="" required>
                        <?php
                            $qry_get_cat = " SELECT * FROM category ";
                            $res = $con->query($qry_get_cat);
                            while($row = $res->fetch_assoc())
                            {
                            ?>
                                <option value="<?php echo $row["cat_id"] ?>"><?php echo $row["cat_name"] ?></option>
                            <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Activity Name</label>
                    <input name="act_name" type="text" class="form-control border-dark" id="inputEmail4" placeholder="" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Activity Description</label>
                    <input name="act_desc" type="text" class="form-control border-dark" id="inputEmail4" placeholder="" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Start Date</label>
                    <input name="start_date" type="date" class="form-control border-dark" id="inputEmail4" placeholder="" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="">End Date</label>
                    <input name="end_date" type="date" class="form-control border-dark" id="inputEmail4" placeholder="" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="">Upload (Images/Certificates/Documents)</label>
                    <input type="file" name="doc[]" class="btn btn-primary border-dark col-md-12" multiple>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <button type="submit" name="btn_add_activity" class="btn col-md-12 btn-success">Add Record</button>
                </div>
            </div>
            <div class="form group-row">
                <?php
                if(isset($_GET["BadMessage"]))
                {
                    echo "<div class='col-sm-10 alert alert-danger'>";
                    echo $_GET["BadMessage"];
                    echo "</div>";
                }
                if(isset($_GET["GoodMessage"]))
                {
                    echo "<div class='col-sm-4 alert alert-success'>";
                    echo $_GET["GoodMessage"];
                    echo "</div>";
                }
                ?>
            </div>
        </form>

        <?php
            if(isset($_POST["btn_add_activity"]))
            {
                $cat_id = $_POST["cat_id"];
                $act_name = $_POST["act_name"];
                $act_desc = $_POST["act_desc"];
                $start_date = $_POST["start_date"];
                $end_date = $_POST["end_date"];
                $std_id = $_SESSION["student"];

                /*echo "Cat ID: ".$cat_id;
                echo "Act Name: ".$act_name;
                echo "Act Desc: ".$act_desc;
                echo "S Date: ".$start_date;
                echo "E Date: ".$end_date;
                echo "Std ID: ".$std_id;*/

                $qry_add_act = " INSERT INTO activity(cat_id, std_id, act_name, act_desc, start_date, end_date) 
                                VALUES('".$cat_id."', '".$std_id."', '".$act_name."', '".$act_desc."', '".$start_date."', '".$end_date."') ";

                if($con->query($qry_add_act))
                {
                    echo "New Activity Added!\n";
                    //header("Location:meta_curricular_form.php?GoodMessage=$msg");
                }
                else
                {
                    echo "Not Added :(";
                    //header("Location:meta_curricular_form.php?GoodMessage=$msg");
                }

                // Query Get Last Act ID
                $qry_get_act_id = " SELECT act_id FROM activity ORDER BY act_id DESC LIMIT 1 ";
                $res_get_act_id = $con->query($qry_get_act_id);
                $row_get_act_id = $res_get_act_id->fetch_assoc();
                $files_act_id = $row_get_act_id["act_id"];
                //echo "Act_ID: ".$files_act_id."\n";

                $file_path = 'doc/'.$_SESSION["student"];
                if(file_exists($file_path))
                {
                    //echo "Exists";
                    foreach($_FILES['doc']['name'] as $key=>$val)
                    {
                        //echo "Value: ".$val."\n";

                        if(empty($val))
                        {
                            echo "No Files Selected!\n";
                        }
                        else
                        {
                            move_uploaded_file($_FILES['doc']['tmp_name'][$key], $file_path.'/'.$val);
                            $qry_add_filename = " INSERT INTO files(std_id, act_id, file_name) VALUES('".$_SESSION["student"]."', '".$files_act_id."', '".$val."') ";
                            $con->query($qry_add_filename);
                        }

                    }
                }
                else {
                    //echo "Not exists";
                    mkdir($file_path);
                    foreach($_FILES['doc']['name'] as $key=>$val)
                    {

                        if(empty($val))
                        {
                            echo "No Files Selected!\n";
                        }
                        else
                        {
                            // Moving into folder
                            move_uploaded_file($_FILES['doc']['tmp_name'][$key], $file_path.'/'.$val);

                            // saving file name into database
                            $qry_add_filename = " INSERT INTO files(std_id, act_id, file_name) VALUES('".$_SESSION["student"]."', '".$files_act_id."', '".$val."') ";
                            $con->query($qry_add_filename);
                        }
                    }
                }
            }
        ?>
        <hr style="border: 2px solid black">
        <h4>My Activities</h4>
        <table class="table mytable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Category Name</th>
                    <th scope="col">Activity Name</th>
                    <th scope="col">Activity Description</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">My Files</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php

            $qry = " SELECT cat_name, act_id, act_name, act_desc, start_date, end_date FROM category,activity WHERE category.cat_id=activity.cat_id AND std_id = '".$_SESSION["student"]."' ";
            $res = $con->query($qry);
            $result = "";

            if($res->num_rows > 0)
            {
                ?>
                <?php
                while($row = $res->fetch_assoc())
                {

                    ?>
                        <tr>
                            <td><?php echo " ".$row["cat_name"]." " ?></td>
                            <td><?php echo " ".$row["act_name"]." " ?></td>
                            <td><?php echo " ".$row["act_desc"]." " ?></td>
                            <td><?php echo " ".$row["start_date"]." " ?></td>
                            <td><?php echo " ".$row["end_date"]." " ?></td>
                            <td>
                                <?php
                                $activity_id = $row["act_id"];
                                //echo "ACT ID: ".$activity_id;
                                $qry_get_files = " SELECT * FROM files WHERE std_id='".$_SESSION["student"]."' AND act_id='".$activity_id."' ";
                                $res_get_files = $con->query($qry_get_files);

                                if($res_get_files->num_rows > 0)
                                {
                                    ?>
                                        <?php
                                            while($row_get_files = $res_get_files->fetch_assoc())
                                            {
                                                ?>
                                                    <a href="doc/<?php echo $_SESSION["student"].'/'.$row_get_files["file_name"] ?>" target="_blank"><?php echo " ".$row_get_files["file_name"]." " ?></a>
                                                <?php
                                            }
                                        ?>
                                    <?php
                                }
                                else
                                {
                                    echo "No Files!!";
                                }
                                ?>
                            </td>
                            <td><a href='edit_activity.php?act_id=<?php echo $row["act_id"] ?>' class="btn btn-primary">Edit</a></td>
                            <td><a href='del_activity.php?act_id=<?php echo $row["act_id"] ?>' class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php
                }
                    ?>
                    </tbody>
                </table>
            <?php
            }
            else
            {
                echo "No Results Found!!";
            }
            ?>
        <hr style="border: 2px solid black">
    </div>
    <!-- Operator Team Code End -->
<?php include "student_foot.php" ?>