<?php  

include("../Connection.php");


session_start();


if(!isset($_SESSION["username"])){
    echo "<script>window.location='../index.php'</script>";
}
$plan = $_SESSION['Customerplan'];
$ID = $_SESSION['customerID'];

$sql = "SELECT  `customerName`, `CustomerTell` FROM `customer` WHERE `customerID` = $ID ";
$result = $conn->query($sql);
$data =  $result->fetch_assoc();
$cusName = $data['customerName'];
$cusTell = $data['CustomerTell'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>M W M C </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
        <?php include("./header.php") ?>
        

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include("./sidebar.php") ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <form action="" method="Post">
                <div class="row">
                    <div class="col-6">
                        <div class="ml-4 mr-4">
                                <div class="form-group">
                                    <label for="Rname" class="form-label">Name</label>
                                    <input type="text"  name="name" class="form-control" readonly  value="<?php echo $cusName ?>">
                                    <input style="display:none;" type="text"  name="ID" class="form-control"   value="<?php echo $ID ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Rname" class="form-label">phone</label>
                                    <input type="text" id="cusplan" name="phone" class="form-control" readonly  value="<?php echo $cusTell ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Rname" class="form-label">message</label>
                                    <textarea   name="message" class="form-control"  value=""> </textarea>
                                </div>
                                <div class="form-group">
                                    <!-- <input type="submit" name="btn-feedback " class="btn btn-success float-right"  value="Sent"> -->

                                    <button type="submit" class="btn btn-success float-right" name="btn-feedback">Sent </button>
                                </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
            

            if(isset($_POST['btn-feedback'])){
                $ID = mysqli_real_escape_string($conn, $_POST["ID"]);
                $name = mysqli_real_escape_string($conn, $_POST["name"]);
                $phone =mysqli_real_escape_string($conn, $_POST["phone"]);
                $message =mysqli_real_escape_string($conn, $_POST["message"]);
                $date = Date('y-m-d');

                        
                $insert = mysqli_query($conn, "INSERT INTO `feedbacks` VALUES (null,'$name','$phone','$message','pending','$date')");
                if($insert){
                    echo '<script>
                    alert("Message sent\nThank you.")
                    window.location.replace("./index.php");
                     
                    </script>';
                }else{
                    echo '<script>
                    alert("Somthing went wrong")
                    
                    
                    </script>';
                }

            }

 



?>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">M.W.M.C Team</a> 2022</p>
                
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="./vendor/raphael/raphael.min.js"></script>
    <script src="./vendor/morris/morris.min.js"></script>


    <script src="./vendor/circle-progress/circle-progress.min.js"></script>
    <script src="./vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="./vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="./vendor/flot/jquery.flot.js"></script>
    <script src="./vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="./vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>