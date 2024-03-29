<?php 
    // session_start();
    if(!isset($_SESSION["admin"]))
    { //if login in session is not set
        header("Location:../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/admin-dashboard.css">
    <link href="../../css/simple-sidebar.css" rel="stylesheet">

    <!--FONT LINK-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <!-- Image and text -->
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading" style="padding: 0; margin: 0">
                <a class="navbar-brand" href="admin_dashboard.php">
                    <img src="../../img/new.png" width="200" alt="" style="margin-top: -10px">
                </a>
            </div>
            <div class="list-group list-group-flush font-weight-bold">
                <a href="add_category.php" class="list-group-item list-group-item-action bg-light">Categories</a>
                <a href="show_student.php" class="list-group-item list-group-item-action bg-light">Show Student</a>
                <a href="transcript_requests.php" class="list-group-item list-group-item-action bg-light">Transcript Requests</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg mynavbar navbar-light border-bottom">
                <button class="btn btn-success mybtn" id="menu-toggle">Admin Panel</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="#"><span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white font-weight-bolder" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION["admin"] ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="admin_change_pass.php">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="admin_logout.php"><strong>Logout</strong></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>