<?php
    include "../connect.php";
    session_start();

    if(isset($_POST["btn_create"]))
    {
        $book_class_id = $_POST["book_class_id"];
        $qry_get_student_id = " SELECT student_id FROM students WHERE student_name = '".$_SESSION["student"]."' ";
        $res_qry1 = $con->query($qry_get_student_id);
        $row_qry1 = $res_qry1->fetch_assoc();
        $student_id = $row_qry1["student_id"];
        echo $student_id;

        $qry_book_class = " INSERT INTO student_booking(book_class_id, book_student_id) VALUES('".$book_class_id."' , '".$student_id."')  ";
        if($con->query($qry_book_class))
        {
            $msg = "Booking Created Successfully!!";
            header("Location:add_activity.php?GoodMessage=$msg");
        }
        else
        {
            $msg="Boooking Creation Failed! Make sure the class you are going to book is alread exist!";
            header("Location:add_activity.php?BadMessage=$msg");
        }
    }

?>