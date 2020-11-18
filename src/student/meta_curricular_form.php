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
                    <select name="cat_id" class="form-control border-dark col-md-4" id="">
                        --
                        <option value="NULL"> -- </option>
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
                    <input name="act_name" type="text" class="form-control border-dark" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Activity Description</label>
                    <input name="act_desc" type="text" class="form-control border-dark" id="inputEmail4" placeholder="" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Start Date</label>
                    <input name="start_date" type="date" class="form-control border-dark" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">End Date</label>
                    <input name="end_date" type="date" class="form-control border-dark" id="inputEmail4" placeholder="" >
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
                $file_path = 'doc/'.$_SESSION["student"];
                if(file_exists($file_path))
                {
                    //echo "Exists";
                    foreach($_FILES['doc']['name'] as $key=>$val)
                    {
                        /*echo "\nval: ".$val;
                        echo "\nPath: ".$file_path;
                        echo "\nComplete Path: ".$file_path.'/'.$val;
                        echo "<br>";*/
                        move_uploaded_file($_FILES['doc']['tmp_name'][$key], $file_path.'/'.$val);
                    }
                }
                else {
                    //echo "Not exists";
                    mkdir($file_path);
                    foreach($_FILES['doc']['name'] as $key=>$val)
                    {
                        move_uploaded_file($_FILES['doc']['tmp_name'][$key], $file_path.'/'.$val);
                    }
                }

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
                    echo "New Activity Added!!";
                    //header("Location:meta_curricular_form.php?GoodMessage=$msg");
                }
                else
                {
                    echo "Not Added :(";
                    //header("Location:meta_curricular_form.php?GoodMessage=$msg");
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
                </tr>
            </thead>
            <?php

            $qry = " SELECT cat_name, act_name, act_desc, start_date, end_date FROM category,activity WHERE category.cat_id=activity.cat_id AND std_id = '".$_SESSION["student"]."' ";
            $res = $con->query($qry);
            $result = "";

            if($res->num_rows > 0)
            {
            while($row = $res->fetch_assoc())
            {
            ?>
            <tbody>
                <tr>
                    <th><?php echo " ".$row["cat_name"]." " ?></th>
                    <td><?php echo " ".$row["act_name"]." " ?></td>
                    <td><?php echo " ".$row["act_desc"]." " ?></td>
                    <td><?php echo " ".$row["start_date"]." " ?></td>
                    <td><?php echo " ".$row["end_date"]." " ?></td>
                </tr>
            <?php
            }
            }
            else{echo "No Results Found!!";}

            ?>
            </tbody>
        </table>

    </div>
    <!-- Operator Team Code End -->
<?php include "student_foot.php" ?>