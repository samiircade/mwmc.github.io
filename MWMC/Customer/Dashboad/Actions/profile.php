<?php
include("./Connection.php");

if(isset($_POST['btn-Add'])){
    $ID = mysqli_real_escape_string($conn, $_POST["ID"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $tell = mysqli_real_escape_string($conn, $_POST["phone"]);
    $plan = mysqli_real_escape_string($conn, $_POST["plan"]);
    $village = mysqli_real_escape_string($conn, $_POST["village"]);
    $user = mysqli_real_escape_string($conn, $_POST["user"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);
    
               
      $update = mysqli_query($conn, "UPDATE `customer` SET `customerName`='$name',
      `CustomerTell`='$tell',`customer_Village`='$village',`Customerplan`='$plan',
      `username`='$user',`password`='$pass',`customerStatus`='Active'
       WHERE `customerID`='$ID'");
    if($update){
        echo '<script>
        window.location.replace("../profile.php");
         
        </script>';
    }

 }

 



?>