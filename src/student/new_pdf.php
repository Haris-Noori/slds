<?php
    include "../connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Transcript</title>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-4" />

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!--FONT LINK-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body style="border: 5px solid purple; margin: 10px">
<?php
    session_start();
    $std_id = $_GET["std_id"];

    //echo "ID: ".$_SESSION["student"];
    $qry_get_student = " SELECT * FROM student WHERE std_id='".$std_id."' ";
    $res_std = $con->query($qry_get_student);
    $row_std = $res_std->fetch_assoc();
?>


    <div class="container" style="height: 300px; width: 700px; text-align: center">
        <img src="../../img/new.png" style="width: 500px; height: 250px">
        <h1 style="text-align: center; color: white; height: 60px; width: 550px; background: purple; margin-left: auto; margin-right: auto; padding: 3px" >Meta-Curricular Transcript</h1>
    </div>

    <div class="container" style="background: lightgray; margin-top: 40px">
        <div class="row p-1">
            <div class="col text-left">Student Name: <strong><?php echo $row_std["std_name"] ?></strong></div>
            <div class="col text-center">Student ID: <strong><?php echo $row_std["std_id"] ?></strong></div>
            <div class="col text-left">Academic Program: <strong><?php echo $row_std["std_program"] ?></strong></div>
        </div>
        <div class="row p-1">
            <div class="col text-left">Student Email: <strong><?php echo $row_std["std_email"] ?></strong> </div>
            <div class="col text-center">Phone Number: <strong><?php echo $row_std["std_phone"] ?></strong> </div>
            <div class="col text-left">Induction Year: <strong><?php echo $row_std["std_ind_year"] ?></strong> </div>
        </div>
    </div>

    <?php
    $qry1 = "SELECT * FROM category";
    if($con->query($qry1)) {
        $res1 = $con->query($qry1);

        while ($row = $res1->fetch_assoc())
        {
            $qry2 = "SELECT act_id,act_name,act_desc,start_date,end_date FROM activity WHERE cat_id='".$row["cat_id"]."' AND std_id='".$row_std["std_id"]."' ";

            if ($con->query($qry2)) {
                $res2 = $con->query($qry2);

                // If Activity Table is not Empty, then create table
                if($res2->num_rows > 0)
                {
                    ?>
                    <div class="container">
                        <h4 class="col-12 text-white mt-5" style="background: purple; width: 100%">
                            <?php echo $row["cat_name"];?>
                        </h4>

                        <table class="table">
                             <thead class="text-dark">
                                <tr>
                                    <th scope="col">Activity Name</th>
                                    <th scope="col">Activity Description</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                </tr>
                             </thead>
                             <tbody>

                    <?php
                    while ($row2 = $res2->fetch_assoc())
                    {
                        ?>
                            <tr>
                                <td><?php echo $row2["act_name"] ?></td>
                                <td><?php echo $row2["act_desc"] ?></td>
                                <td><?php echo $row2["start_date"] ?></td>
                                <td><?php echo $row2["end_date"] ?></td>
                            </tr>

                        <?php
                    }   // edn of activities loop
                    ?>

                            </tbody>
                        </table>
                    </div>
                    <?php
                }

            }

            else
            {
                echo "there is a problem \n";
            }

        }   // End of Categories loop
    }
        date_default_timezone_set("Asia/Karachi");
        $date = date("jS \ F Y");
        ?>

        <hr class="mt-5" style="border: 1px solid black; width: 95%">
        <p class="text-center">In witness there of these signatures confirm the authenticity of this transcript. <?php echo $date ?></p>

        <div class="container mb-5">
            <div class="row">
                <div class="col text-center"> <img src="../../img/sign1.png" width="150" alt=""> </div>
                <div class="col text-center"> <img src="../../img/sign2.png" width="150" alt=""> </div>
                <div class="col text-center"> <img src="../../img/sign3.png" width="150" alt=""> </div>
                <div class="col text-center"> <img src="../../img/sign4.png" width="150" alt=""> </div>
            </div>
            <div class="row">
                <div class="col text-center">Bilal Ali</div>
                <div class="col text-center">Syed Mushtaq</div>
                <div class="col text-center">Shamez Mukhi</div>
                <div class="col text-center">Sadiq Sheikh</div>
            </div>
            <div class="row">
                <div class="col text-center">President</div>
                <div class="col text-center">Vice President</div>
                <div class="col text-center">Director Student Life</div>
                <div class="col text-center">Manager Student Affairs</div>
            </div>
        </div>

<script>window.print()</script>
</body>
</html>