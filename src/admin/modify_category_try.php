<?php include "../connect.php";

    if(isset($_POST["btn_update_cat"]))
    {
        // All variables in the form
        $cat_id = $_POST["cat_id"];
        $cat_name = $_POST["cat_name"];

        echo "ID: ".$cat_id;
        echo "\nName: ".$cat_name;

        $qry_update_cat = " UPDATE category SET cat_name='".$cat_name."' WHERE cat_id='".$cat_id."' ";

        if($con->query($qry_update_cat))
        {
            //echo "Category Name Updated!!";
            $msg = "Category Updated!!";
            header("Location:add_category.php?GoodMessage=$msg");
        }
        else
        {
            //echo "Category Name Not Updated!!";
            $msg="Category Not Updated!";
            header("Location:add_category.php?BadMessage=$msg");
        }
    }