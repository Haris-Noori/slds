<?php
    include "../connect.php";
    session_start();

    $book_class_id = $_POST["book_class_id"];
    $qry = " UPDATE student_booking SET book_class_id = '".$book_class_id."' WHERE book_student_id = (SELECT student_id FROM students WHERE student_name = '".$_SESSION["student"]."') ";

if($con->query($qry))
{
    $msg = "Booking Updated";
    header("Location:modify_booking.php?GoodMessage=$msg");
}
else
{
    $msg="Something went wrong.";
    header("Location:modify_booking.php?BadMessage=$msg");
}
?>