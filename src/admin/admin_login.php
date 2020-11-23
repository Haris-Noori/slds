<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Login</title>


    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/admin_login.css">

    <!--FONT LINK-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <nav class="navbar mynav" style="background: white">
        <div class="mydiv" style="background: white">
            <a id="techvalley" href="../../index.php">
                <img src="../../img/habbib.jpg">
            </a>
            <ul>
                <li><a class="text-black-50" href="../../index.php">Home</a></li>
            </ul>
        </div>

    </nav>
    <!--PAGE CONTENT STARTS-->
    <div class="container mcontainer">
        <!--FORM STARTS-->
        <center>
            <h2>Admin Login</h2>
            <!-- form -->
            <form action="admin_login_try.php" method="post">

                <div class="form group-row">
                    <span><img src="../../img/perm_id.png"></span>
                    <input placeholder="Admin ID" type="number" name="admin_id" class="form-control col-sm-4" required>
                </div>
                <br>
                <div class="form group-row">
                    <span><img src="../../img/lock_open.png"></span>
                    <input placeholder="Admin Password" type="password" name="admin_password" class="form-control col-sm-4" required>
                </div>
                <br>
                <div class="form group-row">
                    <button type="submit" class="form-control btn btn-success border-dark col-sm-4 text-white"><strong>Login</strong></button>
                </div>
                <br>
                <div class="form group-row">
                    <?php
                    if(isset($_GET["Message"]))
                    {
                        echo "<div class='col-sm-4 alert alert-danger'>";
                        echo $_GET["Message"];
                        echo "</div>";
                    }
                ?>
                </div>

            </form>
        </center>

    </div>
    <!--PAGE CONTENT ENDS HERE-->

    <footer class="foot" style="background: purple">
        <div class="row align-center copyright">
            <div class="col-sm-12" align="center" style="color:whitesmoke">
                <br>
                <h3>&copy;Habib University 2020</h3>
                <!-- <p><img src="../images/footer.png" id ="img_footer"></span></p> -->
            </div>
        </div>
    </footer>


    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>

</html>