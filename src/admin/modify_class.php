<?php include "../connect.php";
    session_start();
    if(!isset($_SESSION["admin"]))
    { //if login in session is not set
        header("Location:../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modify Class | Admin</title>

    <link rel="stylesheet" href="../../css/modify_class.css">
</head>
<body>
<?php include "admin_header.php" ?>
    <!-- Admin Dashboard Code Start-->

    <div class="container-fluid">
        <h1 class="mt-4">Modify Class Information</h1>

        <form class="myform" action="" method="POST">
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="inputEmail4" >Enter Class ID to Modify</label>
                    <input type="number" class="form-control" id="inputEmail4" placeholder="ID" name="search_class_id" required>
                </div>
                <div class="form-group col-sm-3" style="margin-top: 30px">
                    <label for="inputEmail4"></label>
                    <button name="search_id" type="submit" class="btn btn-success">Search</button>
                </div>
            </div>
        </form>
        <?php
        if(isset($_POST["search_id"]))
        {
            $search_class_id = $_POST["search_class_id"];
            $_SESSION["search_class_id"] = $search_class_id;
            $qry_search_id = " SELECT * FROM classes WHERE class_id = $search_class_id ";
            if($con->query($qry_search_id))
            {
                $res = $con->query($qry_search_id);

                if($res->num_rows == 0)
                {
                    echo "NO Match Found";
                }
                else
                {
                    $row = $res->fetch_assoc();

                    $res_tutor_id = $row["tutor_id"];
                    $res_start_date = $row["start_date"];
                    $res_end_date = $row["end_date"];
                    $res_start_time = $row["start_time"];
                    $res_end_time = $row["end_time"];
//                                            echo $res_tutor_name;
//                                            echo $res_tutor_pass;
                }
            }
            else{
                echo "Something wrong with Query";
            }
        }
        ?>

        <hr id="table_line">
        <h4>class Details</h4>
        <form class="myform" action="" method="POST">
            <div class="form-row">
                <div class="form-group col-sm-2">
                    <label for="inputEmail4" >Tutor ID</label>
                    <input type="number" class="form-control" id="inputEmail4" placeholder="ID" name="new_tutor_id" value="<?php echo "$res_tutor_id" ?>" required>
                </div>
                <div class="form-group col-sm-2">
                    <label for="inputEmail4" >class Start Date</label>
                    <input type="date" class="form-control" id="inputEmail4" placeholder="Start Date" name="new_start_date" value="<?php echo "$res_start_date" ?>" required>
                </div>
                <div class="form-group col-sm-2">
                    <label for="inputEmail4" >class End Date</label>
                    <input type="date" class="form-control" id="inputEmail4" placeholder="End Date" name="new_end_date" value="<?php echo "$res_end_date" ?>" required>
                </div>
                <div class="form-group col-sm-2">
                    <label for="inputEmail4" >class Start Time</label>
                    <input type="time" class="form-control" id="inputEmail4" placeholder="Start Time" name="new_start_time" value="<?php echo "$res_start_time" ?>" required>
                </div>
                <div class="form-group col-sm-2">
                    <label for="inputEmail4" >class End Time</label>
                    <input type="time" class="form-control" id="inputEmail4" placeholder="End Time" name="new_end_time" value="<?php echo "$res_end_time" ?>" required>
                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="btn btn-danger" name="btn_delete">Delete</button>
                <button type="submit" class="btn btn-success" name="btn_update" style="margin-left: 20px">Update</button>
            </div>
        </form>
        <?php
        if(isset($_POST["btn_delete"]))
        {
            $c_id = $_SESSION["search_class_id"];
            $qry_delete = " DELETE FROM classes WHERE class_id = $c_id ";
            if($con->query($qry_delete))
            {
                echo "Deleted Successfully";
            }
        }

        if(isset($_POST["btn_update"]))
        {
            $new_tutor_id = $_POST["new_tutor_id"];
            $new_start_date = $_POST["new_start_date"];
            $new_end_date = $_POST["new_end_date"];
            $new_start_time = $_POST["new_start_time"];
            $new_end_time = $_POST["new_end_time"];

            $c_id = $_SESSION["search_class_id"];
            $qry_update = " UPDATE classes SET tutor_id = '".$new_tutor_id."', start_date = '".$new_start_date."', end_date = '".$new_end_date."', start_time = '".$new_start_time."', end_time = '".$new_end_time."' WHERE class_id = $c_id ";

            if($con->query($qry_update))
            {
                echo "Updated Successfully";
            }
            else
            {
                echo "Updation Failed";
            }
        }
        ?>
        <hr id="table_line">
        <!--TABLES-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Tutors in Classes</h4>
                    <table class="table col-sm-6">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Class No.</th>
                            <th scope="col">Tutor ID</th>
                        </tr>
                        </thead>
                        <?php
                        $qry = " SELECT * FROM classes ";
                        $res = $con->query($qry);
                        $result = "";
                        if($res->num_rows > 0)
                        {
                        while($row = $res->fetch_assoc())
                        {
                        ?>

                        <tbody>
                        <tr>
                            <th> <?php echo " ".$row["class_id"]." " ?></th>
                            <td><?php echo " ".$row["tutor_id"]." " ?></td>
                        </tr>

                        <?php
                        }
                        }
                        else{echo "No Results Found!!";}

                        //bss yahan tak
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <h4>All Tutors</h4>
                    <table class="table col-sm-10">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Tutor ID</th>
                            <th scope="col">Tutor Name</th>
                        </tr>
                        </thead>
                        <?php
                        $qry = " SELECT * FROM tutors ";
                        $res = $con->query($qry);
                        $result = "";
                        if($res->num_rows > 0)
                        {
                        while($row = $res->fetch_assoc())
                        {
                        ?>

                        <tbody>
                        <tr>
                            <th> <?php echo " ".$row["tutor_id"]." " ?></th>
                            <td><?php echo " ".$row["tutor_name"]." " ?></td>
                        </tr>

                        <?php
                        }
                        }
                        else{echo "No Results Found!!";}

                        //bss yahan tak
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Admin Dashboard Code End-->
<?php include "admin_foot.php" ?>