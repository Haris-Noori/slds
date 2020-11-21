<?php include "../connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Activity | Student</title>
    <link rel="stylesheet" href="../../css/my_profile.css">
</head>
<body>
<?php include "student_head.php"; ?>
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
        <form action="edit_activity_try.php" method="POST">
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
            <input type="number" name="act_id" value="<?php echo $row["act_id"] ?>" hidden>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <button type="submit" name="btn_update_activity" class="btn col-md-12 btn-success">Update Activity</button>
                </div>
            </div>
        </form>

    </div>
    <!-- Operator Team Code End -->
<?php include "student_foot.php"; ?>