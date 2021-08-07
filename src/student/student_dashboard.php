<?php
    session_start();
    if(!isset($_SESSION["student"]))
    { //if login in session is not set
        header("Location:../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../../css/student_dashboard.css">
</head>
<body>
    <?php include "student_head.php" ?>
            <!-- Student Dashboard Code Start -->
            <div class="container-fluid">
                <h1 class="mt-4">Welcome,</h1>

                <div class="jumbotron">
                    <div class="container-fluid">
                        <h1 class="mt-4">Student guide:</h1>
                        <ul>
                            <li>On your left there is a Student Panel.</li>
                            <li>You can hide or view the panel by clicking on the Student Panel button on the navigation bar.</li>
                            <li>Click on your name at the top-right of the navigation bar to change your password or logout.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Student Code End -->
        <?php include "student_foot.php" ?>