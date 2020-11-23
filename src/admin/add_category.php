<?php include "../connect.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Category | Admin</title>

    <link rel="stylesheet" href="../../css/admin-dashboard.css">
</head>
<body>
    <?php include "admin_header.php" ?>
        <!-- Admin Dashboard Code Start-->

            <div class="container-fluid">
                <h2 class="mt-4"><u>Categories</u></h2>
                
                <form class="myform" action="add_category_try.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Add New Category</label>
                            <input type="text" class="form-control border-dark" id="inputEmail4" placeholder="Category Name" name="cat_name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" name="btn-add-cat" class="btn btn-success btn-lg mt-4">Add</button>
                        </div>
                    </div>
                    <br>
                    <div class="form group-row">
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
                </form>

                    <div class="container">
                        <h4 class="head3">All Categories</h4>

                        <table class="table mytable">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Category ID</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <?php
                            $qry = " SELECT * FROM category ";
                            $res = $con->query($qry);
                            $result = "";
                            if($res->num_rows > 0)
                            {
                            $no = 0;
                            while($row = $res->fetch_assoc())
                            { $no++;
                            ?>

                            <tbody>
                            <tr>
                                <td><?php echo " ".$no.""?></td>
                                <td><?php echo " ".$row["cat_name"]." " ?></td>
                                <td><a href='modify_category.php?edit_cat_id=<?php echo $row['cat_id'] ?>'><button class="btn btn-primary">Edit Category</button></a></td>
                                <td><a href='modify_category.php?del_cat_id=<?php echo $row['cat_id'] ?>'><button class="btn btn-danger">Delete Category</button></a></td>
                            </tr>

                            <?php
                            }
                            }
                            else{echo "No Results Found!!";}

                            //bss yahan tak
                            ?>
                            </tbody>
                        </table>
                    </div>

            </div>
        <!-- Admin Dashboard Code End-->
    <?php include "admin_foot.php" ?>