<?php
 include('./Actions/Connection.php');


 header('Content-Type: application/json');
 
//  Action is common Variable for all fuctions
 $action = $_POST["action"];

//  Function to get the Region data info
 function readRegionData($conn){
 
 $query = "SELECT * from  `region` where `regionID` = $_POST[id_user]";
 $result = mysqli_query($conn,$query);
 $mem = array();
 
 while($row = mysqli_fetch_assoc($result)){
     $mem[] = $row;
 }
 
     echo json_encode($mem);
 }



function readDistrictData($conn){

    $query = "SELECT * from  `district` where `districtID` = $_POST[id_user]";
    $result = mysqli_query($conn,$query);
    $mem = array();
    
    while($row = mysqli_fetch_assoc($result)){
        $mem[] = $row;
    }
    
        echo json_encode($mem);
    }


function readVillageData($conn){

    $query = "SELECT * from  `village` where `villageID` = $_POST[id_user]";
    $result = mysqli_query($conn,$query);
    $mem = array();
    
    while($row = mysqli_fetch_assoc($result)){
        $mem[] = $row;
    }
    
        echo json_encode($mem);
    }

function readVehicleData($conn){

    $query = "SELECT * from  `vehicle` where `vehicleID` = $_POST[id_user]";
    $result = mysqli_query($conn,$query);
    $mem = array();
    
    while($row = mysqli_fetch_assoc($result)){
        $mem[] = $row;
    }
    
        echo json_encode($mem);
    }
function readDriverData($conn){

    $query = "SELECT * from  `drivers` where `driverID` = $_POST[id_user]";
    $result = mysqli_query($conn,$query);
    $mem = array();
    
    while($row = mysqli_fetch_assoc($result)){
        $mem[] = $row;
    }
    
        echo json_encode($mem);
    }
function readEMPCataData($conn){

    $query = "SELECT * from  `employeecatagory` where `catagoryID` = $_POST[id_user]";
    $result = mysqli_query($conn,$query);
    $mem = array();
    
    while($row = mysqli_fetch_assoc($result)){
        $mem[] = $row;
    }
    
        echo json_encode($mem);
    }
function readEmployeeData($conn){

    $query = "SELECT * from  `employees` where `employeeID` = $_POST[id_user]";
    $result = mysqli_query($conn,$query);
    $mem = array();
    
    while($row = mysqli_fetch_assoc($result)){
        $mem[] = $row;
    }
    
        echo json_encode($mem);
    }

function approveRequest($conn){

    $query = "UPDATE `customer` SET `customerStatus`='Active' WHERE `customerID` = $_POST[id_user]";
    $result = mysqli_query($conn,$query);
    
}
    



//  Common for all the fuctions
 
 if ($action) {
     $action($conn);
 }else{
     echo json_encode($conn->connect_error);
 }
 ?> 