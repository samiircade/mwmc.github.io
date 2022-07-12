<?php include("./Actions/Connection.php");
session_start();

if(!isset($_SESSION["username"])){
    echo "<script>window.location='../index.php'</script>";
}
$plan = $_SESSION['Customerplan'];
$ID = $_SESSION['customerID'];
$dua = 0;
if($plan == 'family'){
    $dua = 8;
}elseif($plan == 'Big family'){
    $dua = 12;
}else{
    $dua = 130;
}

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

    <!-- Datatable -->
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./toastr/build/toastr.min.css">




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

         <!-- =============================== Modals ========================== -->


            <!--Add new Modal -->
            <form action="./Actions/payment.php" method="Post">
                <div class="modal fade" id="AddNewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Payment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div class="form-group">
                                    <label for="Rname" class="form-label">Name</label>
                                    <input type="text"  name="name" class="form-control" readonly value="<?php echo $cusName?>">
                                    <input style="display:none;" type="text"  name="ID" class="form-control"  readonly value="<?php echo $ID?>">
                                </div>
                                <div class="form-group">
                                    <label for="Rname" class="form-label">phone</label>
                                    <input type="text" id="cusplan" name="plan" class="form-control"  value="<?php echo $cusTell?>">
                                </div>
                                <div class="form-group">
                                    <label for="Rname" class="form-label">Plan</label>
                                    <input type="text"  name="plan" class="form-control" readonly value="<?php echo $plan?>">
                                </div>
                                <div class="form-group">
                                    <label for="Rname" class="form-label">Amount Due to (USD)</label>
                                    <input type="text"  name="Amountpay" class="form-control" readonly value="<?php echo $dua?>">
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="btn-Add">Conform </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            



            <!-- /////////////////////////// Update /////// -->

        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                <div class="col-md-12"> <center><H4>Payment </H4><hr></center> </div>
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                        
                            <button class="btn btn-success" id="btn-AddNew">Make Payment </button>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        
                    
                        
                    </div>
                </div>


                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">History</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Statues</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                               $query = "SELECT * FROM `payment` WHERE `paidCustomer` = $ID ORDER BY `paymentID` ASC";
                                               $result = mysqli_query($conn, $query);
                                               
                                               while ($row = mysqli_fetch_array($result)) {
                                           ?>
                                            <tr>
                                                <td><?php echo $row["paymentID"] ?></td>
                                                <td><?php echo $row["amountPaid"] ?></td>
                                                <td><?php echo $row["paymentDate"] ?></td>
                                                <td><?php echo $row["paymentStatus"] ?></td>
                                                
                                                
                                                
                                              
                                            </tr>

                                            <?php } ?>
                                            
                                        </tbody>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                
                                            </tr>
                                        </tfoot> -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
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

    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>


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
     
      
      
  <script>
    $('#btn-AddNew').on('click',function () {
        $('#AddNewModal').modal('show')
        
    })

    $('#btn-Update').on('click',function () {
        $('#updateModal').modal('show')
    })
</script>
    

    <script src="./toastr/build/toastr.min.js"></script>

</body>

</html>