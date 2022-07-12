<?php
include("./Connection.php");

if(isset($_POST['btn-Add'])){
    $Amountpaid = mysqli_real_escape_string($conn, $_POST["Amountpay"]);
    $ID = mysqli_real_escape_string($conn, $_POST["ID"]);
    $date = Date('y-m-d');

               
                $insert = mysqli_query($conn, "INSERT INTO `payment` VALUES (Null,'$ID','$Amountpaid','$date','pending')");
    if($insert){
        echo '<script>
        window.location.replace("../payment.php");
         
        </script>';
    }

 }

 

 



?>