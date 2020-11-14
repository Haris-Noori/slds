<?php
    include "../connect.php";
    session_start();

    if(isset($_GET["cancel_book_id"]))
    {
        $qry = " DELETE FROM student_booking WHERE book_class_id = '".$_GET["cancel_book_id"]."' AND book_student_id = (SELECT student_id FROM students WHERE student_name = '".$_SESSION["student"]."') ";

        if($con->query($qry))
        {
            $msg = "Booking Deleted";
            header("Location:modify_booking.php?GoodMessage=$msg");
        }
        else
        {
            $msg="Something went wrong.";
            header("Location:modify_booking.php?BadMessage=$msg");
        }
    }
?>