<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Life Department System</title>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <!-- FONT LINKS  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

    <style>
        body
        {
            font-family: 'Poppins', sans-serif;
            /*background: white;*/
            background: white;
        }
    </style>

</head>

<body>

    <nav class="mt-4 navbar mynav align-content-center">
        <div class="mydiv" style="background: white">
            <img src="img/habbib.jpg">
            <a class="text-dark" id="techvalley" href="index.php">
<!--                <h1><strong>Student Life Department System</strong></h1>-->
            </a>
        </div>
    </nav>

    <div class="mt-5 container mcontainer">
        <div class="row main-card">

            <div class="col-sm-6 col-md-4 cards" id="card1" >
                <div class="card" style="width: 18rem ; border: 4px solid black">
                    <img  src="img/admin1.jpg" class="card-img-top" alt="...">
                    <div class="card-body font-weight-bold" style="background: lightgrey">
                        <h5 class="card-title font-weight-bold">Admin Login</h5>
                        <p class="card-text">This is for admins only</p>
                        <a href="src/admin/admin_login.php" class="btn btn-dark">Login</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 cards" id="card2">
                <div class="card" style="width: 18rem; border: 4px solid black" >
                    <img height="260" src="img/59983.jpg" class="card-img-top" alt="...">
                    <div class="card-body font-weight-bold" style="background: lightgrey"  >
                        <h5 class="card-title font-weight-bold" >Student Login</h5>
                        <p class="card-text font-weight-bold">Thus is for Student Login</p>
                        <a href="src/student/student_login.php" class="btn btn-dark">Login</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <footer class="foot" style="background: purple">
        <div class="row align-center copyright">
            <div class="col-sm-12" align="center" style="color:whitesmoke">
                <br>
                <h3>&copy;Habib University 2020 </a> </h3>
                <!-- <p><img src="../images/footer.png" id ="img_footer"></span></p> -->
            </div>
        </div>
    </footer>


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>