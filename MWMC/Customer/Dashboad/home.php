<?php
include("./Actions/Connection.php");

session_start();

$ID = $_SESSION['customerID'];
$plan = $_SESSION['Customerplan'];


$sql = "SELECT SUM(amountPaid) as total FROM `payment` where paidCustomer = $ID ";
$result = $conn->query($sql);
$data =  $result->fetch_assoc();
$Totalexpenses = $data['total'];

$sql = "SELECT COUNT(paymentID)  as total FROM `payment` where paidCustomer = $ID ";
$result = $conn->query($sql);
$data =  $result->fetch_assoc();
$times= $data['total'];





?>

<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Total Expenses </div>
                                    <div class="stat-digit"> <i class="fa fa-usd"></i><?php echo $Totalexpenses; ?></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Plan</div>
                                    <div class="stat-digit"> <i class=" "></i><?php echo $plan; ?></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary w-99" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                        
                        <!-- /# card -->
                    
                    <!-- /# column -->
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">number of paid times </div>
                                    <div class="stat-digit"> <i class=""></i><?php echo $times; ?></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning w-40" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Last Seen</div>
                                    <div class="stat-digit"> <i class=" "></i><?php echo date('y-m-d'); ?></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary w-99" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                        
                        <!-- /# card -->
                    
                    <!-- /# column -->
                </div>

                

                
                

            </div>
        </div>