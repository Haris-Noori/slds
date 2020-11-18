<?php include "../connect.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modify Category | Admin</title>

<!--    <link rel="stylesheet" href="../../css/modify_tutor.css">-->
</head>
<body>
<?php include "admin_header.php";

    if(isset($_GET["del_cat_id"]))
    {
        $qry_del_cat = " DELETE FROM category WHERE cat_id='".$_GET["del_cat_id"]."' ";
        if($con->query($qry_del_cat))
        {
            $msg = "Category Deleted!!";
            header("Location:add_category.php?GoodMessage=$msg");
        }
        else
        {
            $msg="Category Not Deleted!!";
            header("Location:add_category.php?BadMessage=$msg");
        }
    }

?>
        <!-- Admin Dashboard Code Start-->
            <div class="container-fluid">
                <h2 class="mt-4"><u>Modify Category</u></h2>

                <?php
                if(isset($_GET["edit_cat_id"]))
                    {
                        $cat_id = $_GET["edit_cat_id"];
                        $qry_get_cat_name = " SELECT cat_id,cat_name FROM category WHERE cat_id='".$cat_id."' ";
                        $res = $con->query($qry_get_cat_name);
                        $row = $res->fetch_assoc();
                    }
                ?>
                <form action="modify_category_try.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Category Name</label>
                            <input name="cat_name" type="text" class="form-control border-dark" value="<?php echo $row["cat_name"]?>" placeholder="Category Name" id="inputEmail4">
                            <input name="cat_id" value="<?php echo $row["cat_id"] ?>" hidden>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="submit" name="btn_update_cat" class="btn btn-success btn-block">Update Category Name</button>
                        </div>
                    </div>
                </form>
            </div>
        <!-- Admin Dashboard Code End-->
    <?php include "admin_foot.php" ?>