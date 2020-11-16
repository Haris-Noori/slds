<?php include "../connect.php";
    $res_tutor_name = "";
    $res_tutor_pass = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modify Category | Admin</title>

<!--    <link rel="stylesheet" href="../../css/modify_tutor.css">-->
</head>
<body>
    <?php include "admin_header.php" ?>
        <!-- Admin Dashboard Code Start-->
            <div class="container-fluid">
                <h2 class="mt-4"><u>Modify Category</u></h2>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                        <!-- BOX2 START -->
                            <table class="table mytable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <?php
                                    /*$qry = " SELECT * FROM tutors ";
                                    $res = $con->query($qry);
                                    $result = "";
                                    if($res->num_rows > 0)
                                    {
                                    echo "Total Tutors: ".$res->num_rows;
                                    while($row = $res->fetch_assoc())
                                    {*/
                                ?>

                                <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <?php
                                    /*}
                                    }
                                    else{echo "No Results Found!!";}

                                    //bss yahan tak
                                    */?>
                                </tbody>
                            </table>
                        <!-- BOX END -->
                        </div>
                        

                        
                    </div>

                    
                </div>
                
                
            </div>
        <!-- Admin Dashboard Code End-->
    <?php include "admin_foot.php" ?>