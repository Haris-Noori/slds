<?php
include "../connect.php";
session_start();
    if(!isset($_SESSION["admin"]))
    { //if login in session is not set
        header("Location:../../index.php");
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Admin | Dashboard</title>

        <link rel="stylesheet" href="../../css/admin-dashboard.css">
    </head>
<body>
<?php include "admin_header.php" ?>
    <!-- Admin Dashboard Code Start-->

    <div class="container-fluid">
        <h2 class="mt-4"><u>Change Password</u></h2>
        <br>
        <h5 class="mt-4">You can change your password here</h5>

        <form class="myform" action="" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input name="admin_password" type="password" class="form-control border-dark" id="inputEmail4" placeholder="*****">
                </div>
                <div class="form-group col-md-4">
                    <button type="submit" name="btn_id" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>

        <?php
        if(isset($_POST["btn_id"]))
        {
            $admin_password = $_POST["admin_password"];

            $qry = " UPDATE admin SET admin_password='".$admin_password."' WHERE admin_id='".$_SESSION["admin"]."' ";

            if($con->query($qry))
            {
                // echo "Password changed";
                $msg = "hello";
                echo "<div class='col-sm-4 alert alert-success'>";
                echo "Password changed successfully";
                echo "</div>";
            }
        }
        ?>

    </div>

    <!-- Admin Dashboard Code End-->
<?php include "admin_foot.php" ?>