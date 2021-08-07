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
    <title>Modify Tutor | Admin</title>

    <link rel="stylesheet" href="../../css/modify_tutor.css">
</head>
<body>
    <?php include "admin_header.php"; ?>
        <!-- Admin Dashboard Code Start-->
            <div class="container-fluid">


            </div>
        <!-- Admin Dashboard Code End-->
    <?php include "admin_foot.php"; ?>
