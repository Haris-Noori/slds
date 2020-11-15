<?php include "../connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Modify Booking | Student</title>
    <link rel="stylesheet" href="../../css/my_profile.css">
</head>

<body>
<?php include "student_head.php"; ?>
    <!-- Operator Team Code Start -->
    <div class="container-fluid">
        <h2 class="mt-4">Modify Booking</h2>
        <br>
        <h4>My Booked Classes</h4>
        <table class="table mytable">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Class No.</th>
                <th scope="col">Action</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <?php

            $qry = " SELECT book_class_id FROM student_booking WHERE book_student_id= (SELECT student_id FROM students WHERE student_name = '".$_SESSION["student"]."') ";
            $res = $con->query($qry);
            $result = "";

            if($res->num_rows > 0)
            {
            while($row = $res->fetch_assoc())
            {
            ?>

            <tbody>
            <tr>
                <th scope="row"> <?php echo " ".$row["book_class_id"]." " ?> </th>
                <td><a href='modify_booking_try.php?book_class_id=<?php echo $row['book_class_id'] ?> '><button class="btn btn-success">Update Class No.</button></a></td>
                <td><a href='cancel_booking.php?cancel_book_id=<?php echo $row['book_class_id'] ?>'><button class="btn btn-danger">Cancel Booking</button></a></td>
            </tr>

            <?php
            }
            }
            else{echo "No Results Found!!";}

            ?>
            </tbody>
        </table>
        <?php
            if(isset($_GET["BadMessage"]))
            {
                echo "<div class='col-sm-4 alert alert-danger'>";
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
    <!-- Operator Team Code End -->
<?php include "student_foot.php" ?>