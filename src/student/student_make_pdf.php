<?php
    ob_clean();
    require_once __DIR__ .'/vendor/autoload.php' ;
    include "../connect.php";
    session_start();

    $pdf = new \Mpdf\Mpdf();
    $pdf->AddPage();

    //echo "ID: ".$_SESSION["student"];
    $qry_get_student = " SELECT * FROM student WHERE std_id=1 ";
    $res_std = $con->query($qry_get_student);
    $row_std = $res_std->fetch_assoc();
    //echo "ID: ".$row_std["std_id"];


    $html1 = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-4" />
        <title>PDF FILE</title>
        
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/student_header.css">
        
        <!--FONT LINK-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: "Poppins", sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container" style="background: purple">
            <h1 style="color: white " align="center">Meta-Curricular Transcript</h1>
        </div>
        
        <div class="container mt-4" style="background: lightgray">
            <div class="row">
                <div class="col-sm-4"><span class="font-weight-bold">Student Name: </span>';
                $html1 .= $row_std["std_name"];
                $html1 .=  '</div>
                <div class="col-sm-4" style="font-weight: bolder">Student ID: ';
                $html1 .= $row_std["std_id"];
                $html1 .= '</div>
                <div class="col">Academic Program: ';
                $html1 .= $row_std["std_program"];
                $html1 .= '</div>
            </div>
            <div class="row">
                <div class="col">Email: ';
                $html1 .= $row_std["std_email"];
                $html1 .= '</div>
                <div class="col">Phone Number: ';
                $html1 .= $row_std["std_phone"];
                $html1 .= '</div>
                <div class="col">Induction Year: ';
                $html1 .= $row_std["std_ind_year"];
                $html1 .= '</div>
            </div>    
        </div>
           
    ';

    //$html3 .='';


    $pdf->Image('habib.jpg',25,10,150,50);
    //$pdf->WriteHTML($html1);

    $qry1 = "SELECT * FROM category";
    if($con->query($qry1)) {
        $res1 = $con->query($qry1);

        while ($row = $res1->fetch_assoc())
        {
            //$pdf->SetFont('arial', 'b', '14');

            //Category name loop
            $html1 .= '<h1 class="col-md-6 text-white mt-5" style="background: purple; font-size: 27px">';
            $cat_name = $row["cat_name"];
            $html1 .= $cat_name;
            $html1 .= '</h1>';

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



            $flag = 0;
            $qry2 = "SELECT act_id,act_name,act_desc,start_date,end_date FROM activity WHERE cat_id='".$row["cat_id"]."' AND std_id='".$row_std["std_id"]."' ";

            if ($con->query($qry2)) {

                $res2 = $con->query($qry2);
                while ($row2 = $res2->fetch_assoc()) {

                    if ($flag == 0 ) {


                        $flag = 1;
                    }

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
            }

            else
            {
                echo "there is a problem \n";
            }

            $html1 .= '</table>';

        }   // end of first categories loop

                  $html1 .='</body>
                        </html>';
    }
    $pdf->WriteHTML($html1);

    $pdf->Output() ;

?>