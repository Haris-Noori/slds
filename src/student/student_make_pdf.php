<?php
    session_start();
    $std_id = $_GET["std_id"];

    ob_clean();
    require_once __DIR__ .'/vendor/autoload.php' ;
    include "../connect.php";

    $pdf = new \Mpdf\Mpdf();
    $pdf->AddPage();
    //echo "ID: ".$_SESSION["student"];
    $qry_get_student = " SELECT * FROM student WHERE std_id='".$std_id."' ";
    $res_std = $con->query($qry_get_student);
    $row_std = $res_std->fetch_assoc();

    $html1 = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-4">
        
        <title>PDF FILE</title>
        
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <!--FONT LINK-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: "Poppins", sans-serif;
            }
            
            .customRow
            {
                /*border: 1px dotted black;*/
		        margin: 10px 0;
		        align-content: center;
		        /*text-align: center;*/
            }
            
            .customCols
            {
                padding: 10px;
               /* border: 1px solid red;*/
                text-align: center;
                align-content: center;
            }
            
            .myRows
            {
                display: grid;
                grid-template-columns: auto auto auto auto;
                padding: 5px;
                /*text-align: center;*/
                margin-right: 10px;
                border: 2px dotted black;
            }
            
            .myCols
            {
                padding: 20px;
                border: 1px solid purple;
            }
           
        </style>
    </head>
    <body>
        <div class="container" style="width: 500px; height: 35px; text-align: center">
            <img src="../../img/new.png" width="100%" alt="">
            <h1 style="color: white; font-size: 28px; background: purple;" >Meta-Curricular Transcript</h1>
        </div>
        
        <div class="container-fluid mt-4" style="background: lightgray">
            <div class="customRow">
                <span class="customCols">Student Name: <strong>';
                $html1 .= $row_std["std_name"];
                $html1 .= '</strong></span><span style="visibility: hidden">.....................</span>
                <span class="customCols">Student ID: ';
                $html1 .= $row_std["std_id"];
                $html1 .= '</span><span style="visibility: hidden">................</span>
                <span class="customCols">Academic Program: ';
                $html1 .= $row_std["std_program"];
                $html1 .= '</span>
            </div>
            <div class="customRow">
                <span class="customCols">Email: ';
                $html1 .= $row_std["std_email"];
                $html1 .= '</span><span style="visibility: hidden">.....</span>
                <span class="customCols">Phone Number: ';
                $html1 .= $row_std["std_phone"];
                $html1 .= '</span><span style="visibility: hidden">..</span>
                <span class="customCols">Induction Year: ';
                $html1 .= $row_std["std_ind_year"];
                $html1 .= '</span>
            </div>    
        </div>
    ';


    /*$pdf->Image('../../img/new.png',25,10,150,65);*/
    //$pdf->WriteHTML($html1);

    $qry1 = "SELECT * FROM category";
    if($con->query($qry1)) {
        $res1 = $con->query($qry1);

        while ($row = $res1->fetch_assoc())
        {
            //$pdf->SetFont('arial', 'b', '14');

            $qry2 = "SELECT act_id,act_name,act_desc,start_date,end_date FROM activity WHERE cat_id='".$row["cat_id"]."' AND std_id='".$row_std["std_id"]."' ";

            if ($con->query($qry2)) {
                $res2 = $con->query($qry2);

                // If Activity Table is not Empty, then create table
                if($res2->num_rows > 0) {
                    $html1 .= '<h1 class="col-md-6 text-white mt-5" style="background: purple; font-size: 27px">';
                    // Write Category Name
                    $cat_name = $row["cat_name"];
                    $html1 .= $cat_name;
                    $html1 .= '</h1>';

                    // Create Table and Make Headings
                    $html1 .= ' 
                        <table class="table">
                             <thead class="text-white">
                                <tr>
                                    <th scope="col">Activity Name</th>
                                    <th scope="col">Activity Description</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                </tr>
                             </thead>  
                             <tbody>                                     
                        ';

                    // Get all the activities, one by one, in rows
                    while ($row2 = $res2->fetch_assoc()) {

                        $html1 .= ' <tr>
                                    ';
                        $cat_name = $row["cat_name"];
                        $html1 .= $cat_name;
                        $act_name = $row2['act_name'];
                        $act_desc = $row2['act_desc'];
                        $start_date = $row2['start_date'];
                        $end_date = $row2['end_date'];

                        $html1 .= '<td>';
                        $html1 .= $act_name;
                        $html1 .= '</td><td>';
                        $html1 .= $act_desc;
                        $html1 .= '</td><td>';
                        $html1 .= $start_date;
                        $html1 .= '</td><td>';
                        $html1 .= $end_date;
                        $html1 .= '</td>';
                        $html1 .= '</tr>';


                    }   // edn of activities loop

                    $html1 .= '</tbody>';
                    $html1 .= '</table>';
                }


            }

            else
            {
                echo "there is a problem \n";
            }

        }   // End of Categories loop
        date_default_timezone_set("Asia/Karachi");
        $date = date("jS \ F Y");

        $html1 .= '
                <hr class="mt-5" style="border: 10px solid black">
                <p class="text-center">In witness there of these signatures confirm the authenticity of this transcript. ';
        $html1 .= $date;
        $html1 .= '</p>';

        $html1 .= '
                <div class="row">
                    <img src="../../img/sign1.png" width="150" alt="">
                    <img src="../../img/sign2.png" width="150" alt="">
                    <img src="../../img/sign3.png" width="150" alt="">
                    <img src="../../img/sign4.png" width="150" alt="">
                </div>
                <div class="myRows">
                    <span class="myCols">Bilal Ali</span>
                    <span class="myCols">Syed Mushtaq</span>
                    <span class="myCols">Shamez Mukhi</span>
                    <span class="myCols">Sadiq Sheikh</span>
                </div>
                <div class="myRows">
                    <span class="myCols">President</span>
                    <span class="myCols">Vice President</span>
                    <span class="myCols">Director Student Life</span>
                    <span class="myCols">Manager Student Affairs</span>
                </div>
                
                ';

        $html1 .='</body>
                </html>';
    }
    $pdf->WriteHTML($html1);

    $pdf->Output() ;
