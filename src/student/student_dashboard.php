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
                <h1 class="mt-4">Welcome, <?php echo $_SESSION["student"]; ?></h1>

                <div class="jumbotron">
                    <div class="container-fluid">
                        <h1 class="mt-4">Student guide:</h1>
                        <ul>
                            <li>On your left side, there is a student panel</li>
                            <li>You can hide and see the panel by clicking the <code>Student Panel</code> button on Nav Bar</li>
                            <li>To change your password, click on your name at top-right of the Nav Bar. Then click on <code>change password</code></li>
                            <li>To logout, at top-right of Nav Bar, click on your name </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Student Code End -->
        <?php include "student_foot.php" ?>