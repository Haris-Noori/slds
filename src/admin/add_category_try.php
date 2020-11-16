<?php
    include "../connect.php";

    if(isset($_POST["btn-add-cat"]))
    {
        $cat_name = $_POST["cat_name"];

        $qry = " INSERT INTO category(cat_name) VALUES ('".$cat_name."') ";

        if($con->query($qry))
        {
            $msg = "New Category Added Successfully!!";
            header("Location:add_category.php?GoodMessage=$msg");
        }
        else
        {
            $msg="Category Not Added!!";
            header("Location:add_category.php?BadMessage=$msg");
        }
    }

