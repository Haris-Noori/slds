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
                <h1 class="mt-4">Welcome,</h1>

                <div class="jumbotron">
                    <div class="container-fluid">
                        <h1 class="mt-4">Admin guide:</h1>
                        <ul>
                            <li>On your left there is a Admin Panel.</li>
                            <li>You can hide or view the panel by clicking on the Admin Panel button on the navigation bar.</li>
                            <li>Click on your ID at the top-right of the navigation bar to change your password or logout.</li>
                        </ul>
                    </div>
                </div>
                
            </div>
    
        <!-- Admin Dashboard Code End-->
    <?php include "admin_foot.php" ?>